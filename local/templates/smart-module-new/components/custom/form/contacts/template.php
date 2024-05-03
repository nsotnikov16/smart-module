<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="col-12">
    <div class="contacts-callback">
        <div class="contacts-callback__title">Форма обратной связи:</div>
        <form method="post" class="form-callback form-callback-contacts" data-contacts-form>
            <div class="row">
                <div class="col-12 col-lg-4 mb-10">
                    <label>
                        <input type="text" placeholder="ФИО" name="name">
                    </label>
                    <label>
                        <input type="text" placeholder="Телефон *" name="phone" required>
                    </label>
                    <label>
                        <input type="email" placeholder="Электронный адрес *" name="email" required>
                    </label>
                </div>
                <div class="col-12 col-lg-8 mb-10">
                    <label>
                        <textarea name="message" placeholder="Ваше сообщение: *" required></textarea>
                    </label>
                </div>
                <div class="col-12 col-lg-8 order-lg-1">
                    <label class="label-checkbox">
                        <input type="checkbox" name="agree" checked>
                        <span class="label-checkbox__custom"></span>
                        <span class="label-checkbox__text">Я даю свою согласие на обработку персональных данных и
                            соглашаюсь с условиями и <br>
                            политикой конфиденциальности</span>
                    </label>
                </div>
                <div class="col-12 col-lg-4">
                    <button type="submit" class="btn btn-accent">Отправить сообщение</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="successContacts" tabindex="-1" aria-hidden="true" aria-labelledby="successContacts">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                Спасибо за обращение!<br>
                Мы ответим Вам в ближайшее время.
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorContacts" tabindex="-1" aria-hidden="true" aria-labelledby="errorContacts">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                Произошла какая-то ошибка! Попробуйте еще раз.
            </div>
        </div>
    </div>
</div>