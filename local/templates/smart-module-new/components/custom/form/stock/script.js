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
            formBtn.textContent = 'Отправляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'StockForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            if (!result.success) {
                modalErrorTitle.innerHTML = result.error ?? errorDefault;
                return modalError.show();
            }
            form.reset();
            successBlock.textContent = 'Ваша заявка принята.';
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }
            redirect('/thank/', 500);
        })
    } catch (error) {
        console.error(error);
    }
}())

