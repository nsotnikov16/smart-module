(function () {
    try {
        const form = document.querySelector('[data-contacts-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;
        const modalError = bootstrap.Modal.getOrCreateInstance('#errorContacts');
        document.body.append(modalError._element);

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!e.target.checkValidity()) return;
            formBtn.textContent = 'Отправляем...';
            const formData = new FormData(e.target);
            formData.append('action', 'ContactsForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);
            formBtn.textContent = formBtnStartText;
            if (!result.success) return modalError.show();
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value, email: form.email.value },
                });
            }
            form.reset();
            redirect('/thank/?message=' + `Спасибо за обращение!<br>Мы ответим Вам в ближайшее время.`, 500);
        })
    } catch (error) {
        console.error(error);
    }
}())

