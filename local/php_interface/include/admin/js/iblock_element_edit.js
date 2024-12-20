const urlParams = new URLSearchParams(window.location.search)
const iblockId = urlParams.get('IBLOCK_ID');

function logicTabChecking() {
    try {
        const tabs = document.querySelectorAll('.adm-detail-tab')
        let tabChecking = false;
        tabs.forEach((item, index) => {
            if (index == tabs.length - 1) {
                item.classList.remove('adm-detail-tab-last')
                const copy = item.cloneNode(true);
                copy.setAttribute('title', '');
                copy.id = 'tab_cont_checking';
                copy.classList.add('adm-detail-tab-last')
                copy.textContent = 'Проверка'
                copy.setAttribute('onclick', `form_element_${iblockId}.SelectTab('checking');`)
                item.insertAdjacentElement('afterend', copy)
                tabChecking = copy;
            }
        })

        const contentWrap = document.querySelector('.adm-detail-content-wrap')
        const btnsWrap = contentWrap.querySelector('.adm-detail-content-btns-wrap')
        btnsWrap.insertAdjacentHTML('beforebegin', `
        <div class="adm-detail-content" id="checking" style="display: none;">
            <div class="adm-detail-title">Проверка</div>
            <div class="adm-detail-content-item-block">
            </div>
        </div>
        `);

        const checking = document.querySelector('#checking');
        const checkingContent = checking.querySelector('.adm-detail-content-item-block');
        const detailText = document.querySelector('[name="DETAIL_TEXT"]');
        
        window[`form_element_${iblockId}`].aTabs.push({
            DIV: 'checking',
            CONTENT: checking,
            CONTENT_BLOCK: checkingContent,
            EDIT_TABLE: { style: {} },
            _ACTIVE: false
        });

        tabChecking.addEventListener('click', () => {
            checkingContent.innerHTML = 'Загрузка...'
            fetch(`/local/ajax/keyslinks.php?ELEMENT_ID=${urlParams.get('ID')}`).then(res => res.text()).then(res => {
                
                checkingContent.innerHTML = res;
                const checkLinks = checkingContent.querySelectorAll('.check-link');
                if (checkLinks.length) {
                    checkLinks.forEach(item => {
                        console.log(item.textContent.trim())
                        if (detailText.value.includes(item.textContent.trim())) item.style.borderColor = 'green';
                    })
                }
            })
        })
    } catch (error) {
        console.log(error)
    }
}


document.addEventListener('DOMContentLoaded', () => {
    if (urlParams.get('IBLOCK_ID') == 6 && typeof Navigation === 'function') {
        try {
            new Navigation('[name=DETAIL_TEXT]', 'textarea[name*=PROP_392]');
        } catch (error) {
            console.error('Navigation', error);
        }
    }

    if (iblockId == 6) logicTabChecking();
})
