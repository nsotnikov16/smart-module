(function () {
    try {
        const modal = bootstrap.Modal.getOrCreateInstance('#orderModal');
        const modalError = bootstrap.Modal.getOrCreateInstance('#errorOrderModal');
        const success = modal._element.querySelector('[data-order-success]');
        const main = modal._element.querySelector('[data-order-main]');

        const form = document.querySelector('[data-order-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;

        document.body.append(modal._element);
        document.body.append(modalError._element);

        const cloneHide = modal.hide;
        modal.hide = function () {
            cloneHide.call(this);
            setTimeout(() => {
                success.classList.add('d-none');
                main.classList.remove('d-none');
            }, 200);
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.textContent = 'Оформляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'OrderForm::send');
            formData.append('url', window.location.href);
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            if (!result.success) return modalError.show();
            success.classList.remove('d-none');
            main.classList.add('d-none');
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { phone: form.phone.value },
                });
            }
            form.reset();
        })
    } catch (error) {
    }
})();

const createInput = (name) => {
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = name;
    return input;
}

function clickProduct(element, objOrder) {
    const price = element ? element.getAttribute('data-base-price') : objOrder.price;
    const form = document.querySelector('[data-order-form]');
    let inputPrice = form.querySelector('[name="price"]');
    let inputUrl = form.querySelector('[name="url"]');
    let inputAddPrice = form.querySelector('[name="add_price"]');
    let inputAddServices = form.querySelector('[name="add_services"]');

    if (!inputPrice) {
        inputPrice = createInput('price');
        form.append(inputPrice);
    }

    if (!inputAddPrice) {
        inputAddPrice = createInput('add_price');
        form.append(inputAddPrice);
    }

    if (!inputAddServices) {
        inputAddServices = createInput('add_services');
        form.append(inputAddServices);
    }

    if (!inputUrl) {
        inputUrl = createInput('url');
        form.append(inputUrl);
    }

    [inputPrice, inputUrl, inputAddPrice, inputAddServices].forEach(input => input.value = ''); // сброс значений

    inputPrice.value = price;
    if (objOrder.addPrice) inputAddPrice.value = objOrder.addPrice;
    if (objOrder.addServices) inputAddServices.value = objOrder.addServices;
    inputUrl.value = window.location.href;
}