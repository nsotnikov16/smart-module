<div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body d-none" data-order-success>
                Спасибо за заказ! <br>
                Мы свяжемся с Вами в ближайшее время.
            </div>
            <div class="modal-body" data-order-main>
                <div class="modal-title">Оформление заказа</div>
                <form method="post" class="form-callback" data-order-form>
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label>
                                <input type="text" placeholder="Введите номер телефона" name="phone" required="">
                            </label>
                        </div>
                        <div class="col-12 mb-20">
                            <div class="consent">
                                <p>Заполняя форму вы соглашаетесь с условиями <a href="#POLICY_URL#" class="text-decoration d-inline" target="_blank">политики конфиденциальности</a></p>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-accent w-100">
                                Оформить заказ
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Произошла какая-то ошибка! Попробуйте снова</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
        </div>
    </div>
</div>