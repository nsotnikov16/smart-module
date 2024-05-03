(function () {
    try {
        const form = document.querySelector('[data-questions-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;

        const modalSuccess = bootstrap.Modal.getOrCreateInstance('#successQuestions');
        document.body.append(modalSuccess._element);

        const modalError = bootstrap.Modal.getOrCreateInstance('#errorQuestions');
        const modalErrorBody = modalError._element.querySelector('.modal-body')
        const errorDefault = modalErrorBody.innerHTML;
        document.body.append(modalError._element);

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.textContent = 'Отправляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'QuestionsForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            if (!result.success) {
                modalErrorBody.innerHTML = result.error ?? errorDefault;
                return modalError.show();
            }
            form.reset();
            modalSuccess.show();

            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }
        })
    } catch (error) {
        console.error(error);
    }
}())

