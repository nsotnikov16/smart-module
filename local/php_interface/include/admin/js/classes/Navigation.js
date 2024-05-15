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
        const hList = Array.from(doc.querySelectorAll('h2, h3'));
        let html = '';
        if (hList.length && hList.some(h => h.tagName == 'H2')) {
            html += '<ol>';
            hList.forEach((h, index) => {
                const id = 'title' + index;
                h.id = id;
                const next = hList[index + 1];
                const prev = hList[index - 1];
                const htmlLi = `<li><a href="#${id}">${h.innerHTML}</a>`;
                if (h.tagName == 'H2') {
                    if (prev?.tagName == 'H3') html += `</ul>`;
                    html += htmlLi;
                    if (next?.tagName == 'H3') html += `<ul>`;
                }

                if (h.tagName == 'H3') html += `${htmlLi}</li>`;

                if (h.tagName == 'H2') html += '</li>';
            })
            html += '</ol>';
            this.elementFrom.value = doc.body.innerHTML;
        }

        return html;
    }

    execute() {
        this.addButton();
    }
}