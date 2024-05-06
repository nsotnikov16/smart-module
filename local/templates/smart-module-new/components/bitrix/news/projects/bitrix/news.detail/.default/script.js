(function () {
    try {
        const modal = bootstrap.Modal.getOrCreateInstance('#orderModal');
        if (modal) document.body.append(modal._element);
        const projectMap = document.querySelector('[data-project-map]');
        const sectionPage = document.querySelector('section.page');
        if (projectMap && sectionPage) sectionPage.insertAdjacentElement('afterend', projectMap);

        const table = document.querySelector('[data-preview-table] table');
        if (table) {
            const musor = table.querySelectorAll('td');
            musor.forEach(m => !/[а-яА-ЯЁё]/.test(m.innerHTML) ? m.remove() : '');
            table.className = 'table table-project-description';
        }

    } catch (error) {
    }
})();

