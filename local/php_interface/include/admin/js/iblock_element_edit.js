const urlParams = new URLSearchParams(window.location.search)


document.addEventListener('DOMContentLoaded', () => {
    if (urlParams.get('IBLOCK_ID') == 6 && typeof Navigation === 'function') {
        try {
            const navigation = new Navigation('[name=DETAIL_TEXT]', '[name=PROP_392__n0__VALUE__TEXT_]');
        } catch (error) {
            console.error('Navigation', error);
        }
    }
})
