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
            formBtn.innerHTML = 'Отправляем...<span class="loader loader_submit"></span>';
            formBtn.disabled = true;
            const formData = new FormData(e.target);
            formData.append('action', 'QuestionsForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            
            if (!result.success) {
                messageBlock.innerHTML = `<span style="color: red">${result.error ?? errorDefault}</span>`;
                return;
            }
            
            
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value },
                });
            }
            setTimeout(() => {
                form.reset();
                messageBlock.innerHTML = '<span style="color: green">Ваша заявка принята.</span>';
                formBtn.innerHTML = formBtnStartText;
                redirect('/thank/', 2000);
            }, 3000)
           
            
        })
    } catch (error) {
        console.error(error);
    }
}())

