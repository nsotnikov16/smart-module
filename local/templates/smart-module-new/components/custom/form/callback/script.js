(function () {
    try {
        const form = document.querySelector('[data-callback-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;

        const modalCallback = bootstrap.Modal.getOrCreateInstance('#callbackModal');
        const modalError = bootstrap.Modal.getOrCreateInstance('#errorCallbackModal');
        const modalErrorTitle = modalError._element.querySelector('.modal-title')
        const errorDefault = modalErrorTitle.innerHTML;
        document.body.append(modalError._element);

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.textContent = 'Отправляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'CallbackForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            modalCallback.hide();
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
            form.reset();
            redirect('/thank/?message=Ваше сообщение успешно отправлено!', 500);
        })
    } catch (error) {
        console.error(error);
    }
}())

