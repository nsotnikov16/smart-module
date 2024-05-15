const urlParams = new URLSearchParams(window.location.search)


document.addEventListener('DOMContentLoaded', () => {
    if (urlParams.get('IBLOCK_ID') == 6 && typeof Navigation === 'function') {
        try {
            new Navigation('[name=DETAIL_TEXT]', 'textarea[name*=PROP_392]');
        } catch (error) {
            console.error('Navigation', error);
        }
    }
})
