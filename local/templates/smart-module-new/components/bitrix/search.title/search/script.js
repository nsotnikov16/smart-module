document.addEventListener('DOMContentLoaded', () => {
    const copy = document.querySelector('[data-search-copy]');
    const copyInput = copy.querySelector('input');
    const copyTransferInput = copy.querySelector('[data-transfer-input]');
    const paste = document.querySelector('[data-search-paste]');
    paste.innerHTML = copy.innerHTML;
    paste.querySelector('input').remove();

    const pasteTransferInput = paste.querySelector('[data-transfer-input]');
    window.addEventListener('scroll', () => {
        const headerFixed = document.querySelector('.header-fixed');
        if (!headerFixed) return;
        if (headerFixed.classList.contains('active')) {
            pasteTransferInput.append(copyInput);
        } else {
            copyTransferInput.append(copyInput);
        }
    })

    // Кастомизируем скрипт компонента без копирования компонента в папку local/components
    try {
        const clone = window.searchObj.ShowResult;
        window.searchObj.ShowResult = function (result) {
            clone.call(this, result);
            const resultContainers = document.querySelectorAll('[data-search-result]');
            if (!resultContainers.length || !result) return;
            resultContainers.forEach(item => item.innerHTML = result);
        }
    } catch (e) {

    }
});

