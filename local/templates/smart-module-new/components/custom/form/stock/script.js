(function () {
    try {
        const form = document.querySelector('[data-form-stock]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;
        const successBlock = form.querySelector('[data-success-stock]');

        const modalError = bootstrap.Modal.getOrCreateInstance('#errorStockModal');
        const modalErrorTitle = modalError._element.querySelector('.modal-title')
        const errorDefault = modalErrorTitle.innerHTML;
        document.body.append(modalError._element);

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.innerHTML = 'Отправляем...<span class="loader loader_submit"></span>';
            formBtn.disabled = true;
            const formData = new FormData(e.target);
            formData.append('action', 'StockForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);

            if (!result.success) {
                modalErrorTitle.innerHTML = result.error ?? errorDefault;
                return modalError.show();
            }
            
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }

            setTimeout(() => {
                form.reset();
                formBtn.innerHTML = formBtnStartText;
                successBlock.textContent = 'Ваша заявка принята.';
                redirect('/thank/', 2000);
            }, 3000)
            
        })
    } catch (error) {
        console.error(error);
    }
}())

