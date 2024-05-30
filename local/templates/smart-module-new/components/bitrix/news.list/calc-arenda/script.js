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
                this.img = document.querySelector('[data-arenda-img]');
                this.imgSrcDefault = this.img.getAttribute('src');
                this.setEventListeners();
                this.recalculate();
            }

            setEventListeners() {
                this.select.addEventListener('change', () => {
                    this.changeImg();
                    this.recalculate();
                });
            }

            recalculate() {
                const id = this.select.value;
                const item = arendaInfo.find(el => el.ID == id);
                if (!item) {
                    this.itogo.textContent = 0;
                    return;
                }
                const price = Number(item.PROPERTIES.PRICE.VALUE);
                const count = Number(this.count.value);
                const months = Number(this.months.value);
                
                const value = price * count * months;
                return this.itogo.textContent = value;
            }

            changeImg() {
                const id = this.select.value;
                const item = arendaInfo.find(el => el.ID == id);
                this.img.setAttribute('src', item?.PREVIEW_PICTURE?.SRC ?? this.imgSrcDefault);
            }
        }

        const arenda =new Arenda();

        document.addEventListener('DOMContentLoaded', () => {
            $(".slider-range1").slider({
                min: 0,
                max: 12,
                value: 8,
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
                value: 6,
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
        console.log(error)
    }

})()