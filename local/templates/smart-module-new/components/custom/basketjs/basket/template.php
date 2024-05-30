<!-- Модалка для корзины -->
<div class="mod-basket active" id="mod_basket" data-basket>
    <a href="javascript:void(0)" class="mod-basket__icon d-none" data-basket-count>0</a>
    <div class="mod-basket__wrapper">
        <div class="mod-basket__title">
            Корзина
        </div>
        <div class="mod-basket__list" data-basket-list>
        </div>
        <div class="mod-basket__bottom">
            <div class="mod-basket__sum">
                Итого: <span><span data-basket-sum>0</span> руб</span>
            </div>
            <div class="mod-basket__btnleft">
                <a href="javascript:void(0)" class="mod-basket__oform js-fancy" data-bs-toggle="modal" data-bs-target="#orderModal" data-basket-order-btn>
                    оформить заказ
                </a>
            </div>
            <div class="mod-basket__btnright">
                <a href="javascript:void(0)" class="mod-basket__back" data-basket-close>
                    Продолжить подбор
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Модалка для корзины END -->