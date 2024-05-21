<!-- Модальное окно -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="select-city-fo-map">
            <div class="modal-header">
                <div class="back-to-map">Назад к карте</div>
                <div class="modal-title">Выберите свой регион на карте</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-modal-search">
                    <label>
                        <input type="text" placeholder="Быстрый поиск города" name="search" id="map-search">
                    </label>
                    <button type="submit"><svg class="svg-icon svg-icon-search">
                            <use xlink:href="#ASSETS_PATH#/img/sprite.svg#search"></use>
                        </svg></button>
                </form>
                <div id="container"></div>
                <div class="city-block" style="display:none;"></div>
            </div>

        </div>
    </div>
</div>