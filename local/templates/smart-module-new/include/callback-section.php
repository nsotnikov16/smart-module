<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<section class="callback-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 offset-lg-3">
                <h2>Остались вопросы?</h2>
                <div class="box-text">
                    <p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
                </div>
                <form method="post" class="form-callback">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-20">
                            <label>
                                <input type="text" placeholder="Ваше имя" name="name">
                            </label>
                        </div>
                        <div class="col-12 col-lg-6 mb-20">
                            <label>
                                <input type="text" placeholder="Ваш телефон" name="phone" required>
                            </label>
                        </div>
                        <div class="col-12 col-lg-6 mb-20">
                            <button type="submit" class="btn btn-green text-transform w-100">Отправить</button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label class="label-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span class="label-checkbox__custom"></span>
                                <span class="label-checkbox__text">Даю согласие на обработку <a href="#"
                                                                                                class="d-inline text-decoration color-accent"
                                                                                                target="_blank">персональных
												данных</a></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
