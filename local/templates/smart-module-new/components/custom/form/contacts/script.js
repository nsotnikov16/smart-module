(function () {
    try {
        const form = document.querySelector('[data-contacts-form]');
        const formBtn = form.querySelector('[type="submit"]');
        const formBtnStartText = formBtn.textContent;

        const modalSuccess = bootstrap.Modal.getOrCreateInstance('#successContacts');
        document.body.append(modalSuccess._element);

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
            form.reset();
            modalSuccess.show();
        })
    } catch (error) {
        console.error(error);
    }
}())

