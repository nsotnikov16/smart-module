(function () {
    class BasketJS {
        constructor() {
            this.plusBtns = document.querySelectorAll('.product-component-row [data-plus]');
            this.minusBtns = document.querySelectorAll('.product-component-row [data-minus]');
            this.addToCardBtns = document.querySelectorAll('.product-component-row [data-add-to-card]');
            this.countInputs = document.querySelectorAll('.product-component-row [data-count]')
            this.basket = document.querySelector('[data-basket]');
            this.basketList = this.basket.querySelector('[data-basket-list]');
            this.basketCount = this.basket.querySelector('[data-basket-count]');
            this.basketSum = this.basket.querySelector('[data-basket-sum]');
            this.basketOrderBtn = this.basket.querySelector('[data-basket-order-btn]');
            this.basketCloseBtn = this.basket.querySelector('[data-basket-close-btn]');
            this.setEventListeners();
        }

        setEventListeners() {
            this.plusBtns.forEach(btn => btn.addEventListener('click', () => this.handlerPlusBtn(btn)));
            this.minusBtns.forEach(btn => btn.addEventListener('click', () => this.handlerMinusBtn(btn)));
            this.addToCardBtns.forEach(btn => btn.addEventListener('click', () => this.handlerPlusBtn(btn)));
            this.countInputs.forEach(input => input.addEventListener('change', () => this.handlerChangeInput(input)));
            this.basketOrderBtn.addEventListener('click', this.handlerOrderBtn.bind(this));
        }

        handlerOrderBtn() {
            let addPrice = 0;
            let price = 0;
            let addServices = '';
            const basketItems = this.basketList.querySelectorAll('[data-item]');
            if (!basketItems.length) return alert('В корзине пусто :(');
            basketItems.forEach(item => {
                const itemInfo = this.findItem(item);
                addPrice += itemInfo.price;
                price += itemInfo.price * itemInfo.count;
                addServices += `${itemInfo.name} - ${itemInfo.count} шт. (${itemInfo.price} р. за шт);\n`;
            })
            if (typeof clickProduct != 'function') return alert('Код ошибки: FUNCTION_UNDEFINED');
            const obj = { price, addPrice, addServices }
            clickProduct(false, obj);
        }

        handlerPlusBtn(btn) {
            const { name, price, id } = this.getProductInfo(btn);
            if (!id) return;
            const newObj = { name, price, id };
            this.increaseQuantityItemById({ id, count: 1 }, newObj);
        }

        handlerMinusBtn(btn) {
            const { id } = this.getProductInfo(btn);
            if (!id) return;
            this.reduceQuantityItemById({ id, count: 1 });
        }

        handlerChangeInput(input) {
            const { name, price, id } = this.getProductInfo(input);
            if (!id) return;
            this.changeQuantityItemById({ id, count: input.value }, { name, price, id });
        }

        getProductInfo(element) {
            const parent = element.closest('[data-services-element-id]');
            if (!parent) return;
            let priceItem = parent.querySelector('[data-price]');
            let price = priceItem.textContent.replace(/\D/g, "");
            return {
                element: parent,
                id: parent.getAttribute('data-services-element-id'),
                name: parent.querySelector('[data-name]').textContent,
                price
            }
        }

        changeQuantityItemById({ id, count }, newObj = {}) {
            let item = this.findItem(id);
            if (!item.item) item = this.createItem(newObj);
            if (count <= 0) {
                item.serviceElementCount.value = 0;
                item.item.remove();
            } else {
                item.countElement.value = count;
                item.priceElement.textContent = count * item.price;
                item.serviceElementCount.value = item.countElement.value;
            }

            this.recalculate();
        }

        reduceQuantityItemById({ id, count }) {
            let item = this.findItem(id);

            if ((item.count - count) <= 0) {
                item.item.remove();
                item.serviceElementCount.value = 0;
            } else {
                item.countElement.value = item.count - count;
                item.priceElement.textContent = (item.count - count) * item.price;
                item.serviceElementCount.value = item.countElement.value;
            }

            this.recalculate();
        }

        increaseQuantityItemById({ id, count }, newObj = {}) {
            let item = this.findItem(id);
            if (!item.item) item = this.createItem(newObj);
            item.countElement.value = item.count + count;
            item.priceElement.textContent = (item.count + count) * item.price;
            item.serviceElementCount.value = item.countElement.value;
            this.recalculate();
        }

        recalculate() {
            const items = this.basketList.querySelectorAll('[data-item]');

            this.basketCount.textContent = items.length;
            if (!items.length) {
                this.basketSum.textContent = 0;
                this.basketCount.classList.add('d-none');
                this.basket.style.right = '';
                return;
            }

            let basketSum = 0;
            items.forEach(item => {
                const { price, count } = this.findItem(item);
                basketSum += (price * count);
            })

            this.basketSum.textContent = basketSum;
            this.basketCount.classList.remove('d-none');
        }

        findItem(idOrElement) {
            let item = false;

            if (typeof idOrElement == 'object') {
                item = idOrElement;
            } else {
                item = this.basketList.querySelector(`#basketItem${idOrElement}`);
            }

            if (!item) return {};
            const serviceElement = document.querySelector(`[data-services-element-id="${item.id.replace('basketItem', '')}"]`);
            const serviceElementCount = serviceElement.querySelector('[data-count]');
            const priceElement = item.querySelector('[data-default-price]');
            const price = Number(priceElement.getAttribute('data-default-price'));
            const countElement = item.querySelector('[data-count]');
            const count = Number(countElement.value);
            const name = item.querySelector('[data-name]').textContent;
            return { item, name, priceElement, price, countElement, count, serviceElement, serviceElementCount };
        }

        createItem({ name, price, id }) {
            const div = document.createElement('div');
            div.className = 'services-box mod-basket__item';
            div.id = 'basketItem' + id;
            div.setAttribute('data-item', '');
            price = price.replace(/\D/g, "");
            div.innerHTML = `
            <div class="services-description" data-name>${name}</div>
            <div class="services-price">
                <p class="services-title_price">Стоимость</p>
                <span class="count-price" data-default-price="${price}"><span data-price>${price}</span> руб.</span>
            </div>
            <div class="amount">
                <span class="down" data-minus>-</span>
                <input type="text" value="0" data-count>
                <span class="up" data-plus>+</span>
            </div>
            <div class="mod-basket__deletewp">
                <a href="javascript:void(0)" class="mod-basket__delete" data-remove>
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>`;

            const minus = div.querySelector('[data-minus]');
            const plus = div.querySelector('[data-plus]');
            const countInput = div.querySelector('[data-count]');
            minus.addEventListener('click', () => this.reduceQuantityItemById({ id, count: 1 }));
            plus.addEventListener('click', () => this.increaseQuantityItemById({ id, count: 1 }));
            countInput.addEventListener('change', () => this.changeQuantityItemById({ id, count: countInput.value }))

            this.basketList.append(div);
            return this.findItem(div);
        }
    }

    try {
        new BasketJS();
    } catch (error) {

    }

})()
