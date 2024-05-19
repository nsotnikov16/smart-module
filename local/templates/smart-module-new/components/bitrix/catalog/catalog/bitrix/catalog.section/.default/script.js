(function () {
    let url = new URL(window.location.href);
    let loadMore = false;

    const getPropsProduct = (element) => {
        const id = element.getAttribute('data-id');
        const propsAtrValue = element.getAttribute('data-get-props');
        const props = propsAtrValue ? JSON.parse(propsAtrValue) : false;
        const infoBlock = element.nextElementSibling
        if (!infoBlock.closest('[data-product-info]')) return
        if (!props) return
        if (!window.catalogSectionAjaxPropsPath) return;
        infoBlock.textContent = 'Загрузка...'
        fetch(window.catalogSectionAjaxPropsPath, {
            method: 'POST',
            body: JSON.stringify({
                props,
                id,
            })
        }).then(res => res.text()).then(res => infoBlock.innerHTML = `<ul class="list-characteristics my-ul">${res}</ul>`)
        element.setAttribute('data-get-props', '');
    }

    document.addEventListener('mouseover', (({ target }) => {
        if (!target.closest('[data-get-props]')) return;
        getPropsProduct(target);
    }))

    document.addEventListener('DOMContentLoaded', () => {
        const productsCount = document.querySelectorAll('.product-item').length;
        const advantagesBlock = document.querySelector('.advantages-events');
        const stockBlock = document.querySelector('.sales-sidebar');

        // скрытие блока преимуществ при 3х и менее элементов (перенос со старого шаблона)
        if (productsCount <= 3) advantagesBlock.classList.add('d-none');
        // скрытие блока акций если нет товаров (перенос со старого шаблона)
        if (!productsCount) stockBlock.classList.add('d-none');
    })

    // Показать еще
    document.addEventListener('click', (({ target }) => {
        if (!target.closest('[data-show-more-catalog]') || loadMore) return
        const productsContainer = document.querySelector('[data-products-container]');
        let page = Number(url.searchParams.get('PAGEN_1'));
        target.textContent = 'Загружаем...';
        if (!page) page = 1;
        url.searchParams.set("PAGEN_1", page + 1);
        window.history.pushState({ path: url.href }, '', url.href);
        loadMore = true;
        $.ajax(url.href + '&ajax=Y', {
            dataType: 'html',
            success: function (html) {
                $('.no-products').remove();
                productsContainer.insertAdjacentHTML('beforeend', html);
                $('.recommended-products-image-slider:not(.slick-initialized)').slick({
                    slidesToShow: 1,
                    fade: true,
                    arrows: false,
                });
            },
            complete: function() {
                loadMore = false;
            }
        })
    }))
})()