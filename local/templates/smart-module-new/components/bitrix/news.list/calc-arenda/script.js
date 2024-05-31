(function () {
    try {
        const arendaInfo = JSON.parse(JSON.stringify(window.arendaObj));
        delete window.arendaObj;

        class Arenda {
            constructor() {
                this.select = document.querySelector('[data-arenda-select]');
                this.months = document.querySelector('[data-arenda-months]');
                this.count = document.querySelector('[data-arenda-count]');
                this.itogo = document.querySelector('[data-arenda-itogo]');
                this.btn = document.querySelector('[data-arenda-btn]');
                this.btnTextDefault = this.btn.textContent;
                this.form = document.querySelector('[data-arenda-form]');
                this.img = document.querySelector('[data-arenda-img]');
                this.imgSrcDefault = this.img.getAttribute('src');
                this.modal = bootstrap.Modal.getOrCreateInstance('#arendaModal');

                document.body.append(this.modal._element);
                this.setEventListeners();
                this.recalculate();
            }

            setEventListeners() {
                this.select.addEventListener('change', () => {
                    this.changeImg();
                    this.recalculate();
                });

                this.form.addEventListener('submit', this.submit.bind(this));
                this.btn.addEventListener('click', (e) => {
                    if (this.recalculate() == 0)  return alert('Для оформления заявки выберите тип, срок и количество');
                    this.modal.show();
                })
            }

            recalculate() {
                const id = this.select.value;
                const item = arendaInfo.find(el => el.ID == id);
                if (!item) {
                    this.itogo.textContent = 0;
                    return 0;
                }
                
                const value = this.getItogo(item.PROPERTIES.PRICE.VALUE);
                this.itogo.textContent = value;
                return value;
            }

            getItogo(price) {
                price = Number(price);
                const count = Number(this.count.value);
                const months = Number(this.months.value);

                return price * count * months;
            }

            changeImg() {
                const id = this.select.value;
                const item = arendaInfo.find(el => el.ID == id);
                this.img.setAttribute('src', item?.PREVIEW_PICTURE?.SRC ?? this.imgSrcDefault);
            }

            getResult() {
                let text = '';
                const item = arendaInfo.find(el => el.ID == this.select.value);
                if (!item) return text;
                text = `Калькулятор аренды:\nТип: ${item.NAME}\nСрок: ${this.months.value} (мес)\nКол-во: ${this.count.value}\nЦена (мес): ${item.PROPERTIES.PRICE.VALUE} руб.\nИтого: ${this.getItogo(item.PROPERTIES.PRICE.VALUE)} руб.`;
                return text;
            }

            async submit(e) {
                e.preventDefault();
                if (!e.target.checkValidity()) return;
                try {
                    const formData = new FormData(this.form);
                    formData.append('action', 'CalcArenda::send');
                    formData.append('calc', this.getResult());
                    
                    this.btn.textContent = 'Отправляем...';
                    const result = await request('POST', window.app.AJAX_URL, formData);
                    this.btn.textContent = this.btnTextDefault;
                    if (!result.success) {
                        return alert(result.error ?? 'Произошла какая-то ошибка! Попробуйте еще раз!');
                    }

                    if (typeof NeirosEventSend === 'function') {
                        NeirosEventSend('send-event', {
                            type: 'form',
                            data: { name: this.form.name.value, phone: this.form.phone.value },
                        });
                    }
                    this.form.reset();

                    redirect('/thank/?message=Ваша заявка принята!', 500);
                } catch (error) {

                }
            }
        }

        const arenda = new Arenda();

        // Взято из вёрстки
        document.addEventListener('DOMContentLoaded', () => {
            $(".slider-range1").slider({
                min: 0,
                max: 12,
                value: 1,
                animate: "fast",
                range: "min",
                slide: function (event, ui) {
                    $(".dec1").val(ui.value);
                    arenda.recalculate();
                }
            });

            $(".dec1").val($(".slider-range1").slider("values", 0));

            $(".slider-range2").slider({
                min: 0,
                max: 20,
                value: 1,
                animate: "fast",
                range: "min",
                slide: function (event, ui) {
                    $(".dec2").val(ui.value);
                    arenda.recalculate();
                }
            });

            $(".dec2").val($(".slider-range2").slider("values", 0));
        })

    } catch (error) {

    }

})()