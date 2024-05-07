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
            form.reset();
            success.classList.remove('d-none');
            main.classList.add('d-none');
        })
    } catch (error) {
    }
})();

