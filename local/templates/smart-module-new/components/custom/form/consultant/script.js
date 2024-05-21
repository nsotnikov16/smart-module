(function () {
    try {
        const form = document.querySelector('[data-form-consultant]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;
        const messageBlock = document.querySelector('[data-message-consultant-form]');
        const errorDefault = 'Произошла какая-то ошибка, попробуйте снова';

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.textContent = 'Отправляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'QuestionsForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            if (!result.success) {
                messageBlock.innerHTML = `<span style="color: red">${result.error ?? errorDefault}</span>`;
                return;
            }
            
            messageBlock.innerHTML = '<span style="color: green">Ваша заявка принята.</span>';
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }
            form.reset();
            redirect('/thank/', 500);
        })
    } catch (error) {
        console.error(error);
    }
}())

