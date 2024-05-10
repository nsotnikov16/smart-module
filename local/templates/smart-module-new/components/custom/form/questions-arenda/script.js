(function () {
    try {
        const form = document.querySelector('[data-questions-arenda-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;

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

            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }

            redirect('/thank/?message=Ваша заявка принята!', 500);
        })
    } catch (error) {
        console.error(error);
    }
}())

