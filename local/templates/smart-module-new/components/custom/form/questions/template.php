<section class="callback-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7 offset-lg-3">
                <h2>Остались вопросы?</h2>
                <div class="box-text">
                    <p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
                </div>
                <form method="post" class="form-callback" data-questions-form>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-20">
                            <label>
                                <input type="text" placeholder="Ваше имя" name="name" required>
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
                                <input type="checkbox" name="check" checked>
                                <span class="label-checkbox__custom"></span>
                                <span class="label-checkbox__text">Даю согласие на обработку <a href="/politika-konfidentsialnosti/" class="d-inline text-decoration color-accent" target="_blank">персональных
                                        данных</a></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="successQuestions" tabindex="-1" aria-hidden="true" aria-labelledby="successQuestions">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                Ваша заявка принята!
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorQuestions" tabindex="-1" aria-hidden="true" aria-labelledby="errorQuestions">
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