(function () {
    try {
        const form = document.querySelector('[data-callback-form]');
        const modalContent = form.closest('.modal-content');
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
            formBtn.disabled = true;
            formBtn.innerHTML = 'Отправляем...<span class="loader loader_submit"></span>';
            const formData = new FormData(e.target);
            formData.append('action', 'CallbackForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            
            // modalCallback.hide();
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
                formBtn.innerHTML = formBtnStartText;
                form.reset();
                modalContent.innerHTML = '<div class="modal-title">Заявка отправлена</div>';
                redirect('/thank/?message=Ваше сообщение успешно отправлено!', 2000);
            }, 3000)

           
        })
    } catch (error) {
        console.error(error);
    }
}())

