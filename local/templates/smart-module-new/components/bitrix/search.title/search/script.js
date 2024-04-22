document.addEventListener('DOMContentLoaded', () => {
    const copy = document.querySelector('[data-search-copy]');
    const paste = document.querySelector('[data-search-paste]');
    paste.innerHTML = copy.innerHTML;

    // Кастомизируем скрипт компонента без копирования компонента в папку local/components
    try {
        const cloneFunc = new Function(`return ${window.searchObj.ShowResult.toString().replace('function(t)', 'function(t,e)')}`);
        window.searchObj.ShowResult = function (result) {
            cloneFunc().call(this, result, this);
            const resultContainers = document.querySelectorAll('[data-search-result]');
            if (!resultContainers.length || !result) return;
            resultContainers.forEach(item => item.innerHTML = result);
        }
    } catch (e) {

    }
});

