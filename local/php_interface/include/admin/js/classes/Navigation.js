class Navigation {
    constructor(selectorFrom, selectorTo) {
        this.selectorFrom = selectorFrom;
        this.selectorTo = selectorTo;

        this.elementFrom = document.querySelector(this.selectorFrom);
        this.elementTo = document.querySelector(this.selectorTo);

        if (!this.elementFrom || !this.elementTo) throw new Error('Указаны некорректные селекторы');
        this.execute();
    }

    addButton() {
        const button = document.createElement('input');
        button.type = 'button';
        button.classList.add('button');
        button.value = 'Сформировать навигацию';
        button.addEventListener('click', this.handlerButton.bind(this));
        this.elementFrom.insertAdjacentElement('afterend', button);
    }

    handlerButton() {
        this.elementTo.value = this.getHTML();
    }

    getHTML() {
        const parser = new DOMParser();
        const doc = parser.parseFromString(this.elementFrom.value, 'text/html');
        const h2List = doc.querySelectorAll('h2');
        const h3List = doc.querySelectorAll('h3');
        let html = '<ol>';
        if (h2List.length) {
            h2List.forEach(h2 => {
                html += `<li><a href="#">${h2.innerHTML}</a>`;

                html += '</li>';
            })
        }
        html += '</ol>';
        return html;
    }

    execute() {
        this.addButton();
    }
}