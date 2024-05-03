<div class="modal modal-v2 fade" id="callbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Обратный звонок</div>
                <div class="modal-description">
                    <p>Оставте заявку и наш оператор свяжется с Вами в течении 2х минут</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-callback" data-callback-form>
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label>
                                <input type="text" placeholder="Ваше имя" name="name">
                            </label>
                        </div>
                        <div class="col-12 mb-20">
                            <label>
                                <input type="text" placeholder="Ваш телефон" name="phone" required="">
                            </label>
                        </div>
                        <div class="col-12 mb-20">
                            <button type="submit" class="btn btn-accent w-100">
                                Отправить
                            </button>
                        </div>
                        <div class="col-12">
                            <label class="label-checkbox">
                                <input type="checkbox" name="check" checked>
                                <span class="label-checkbox__custom"></span>
                                <span class="label-checkbox__text">Согласие на обработку персональных данных</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="modal modal-v2 fade" id="errorCallbackModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Произошла какая-то ошибка! Попробуйте снова</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
        </div>
    </div>
</div>