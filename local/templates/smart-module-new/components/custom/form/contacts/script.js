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
            formBtn.innerHTML = 'Отправляем...<span class="loader loader_submit"></span>';
            formBtn.disabled = true;
            const formData = new FormData(e.target);
            formData.append('action', 'ContactsForm::send');
            const result = await request('POST', window.app.AJAX_URL, formData);

            if (!result.success) return modalError.show();
            if (typeof NeirosEventSend === 'function') {
                NeirosEventSend('send-event', {
                    type: 'form',
                    data: { name: form.name.value, phone: form.phone.value, email: form.email.value },
                });
            }

            setTimeout(() => {
                form.reset();
                formBtn.innerHTML = formBtnStartText;
                redirect('/thank/?message=' + `Спасибо за обращение!<br>Мы ответим Вам в ближайшее время.`);
            }, 5000)
        })
    } catch (error) {
        console.error(error);
    }
}())

