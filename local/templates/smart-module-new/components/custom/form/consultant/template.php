<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>

<div class="manager-callback">
	<div class="manager-callback-wrapper">
		<div class="manager-callback-photo">
			<span class="company-border"></span>
			<img src="#ASSETS_PATH#/img/call-m1.png" alt="Максим Вячеславович" class="img-default" loading="lazy" />
			<img src="#ASSETS_PATH#/img/call-m2.png" alt="Максим Вячеславович" class="img-hover" loading="lazy" />
		</div>
		<div class="manager-callback-name">
			<div class="manager-name">Максим Вячеславович</div>
			<div class="manager-position">Консультант-менеджер</div>
		</div>
	</div>
	<div class="manager-callback-content">
		<p data-message-consultant-form></p>
		<div class="manager-callback__title">
			Есть вопросы? Оставьте заявку и мы свяжемся с Вами!
		</div>
		<form method="post" class="form-callback" data-form-consultant>
			<div class="row">
				<div class="col-12 col-lg-6 mb-20">
					<label>
						<input type="text" placeholder="ФИО" name="name" />
					</label>
				</div>
				<div class="col-12 col-lg-6 mb-20">
					<label>
						<input type="text" placeholder="Ваш телефон" name="phone" required="" />
					</label>
				</div>
				<div class="col-12 col-lg-6 mb-20">
					<button type="submit" class="btn btn-green text-transform w-100">
						Отправить
					</button>
				</div>
				<div class="col-12 col-lg-6">
					<label class="label-checkbox">
						<input type="checkbox" name="check" checked="" />
						<span class="label-checkbox__custom"></span>
						<span class="label-checkbox__text">Даю согласие на обработку
							<a href="/politika-konfidentsialnosti/" class="d-inline text-decoration color-accent" target="_blank">персональных
								данных</a></span>
					</label>
				</div>
			</div>
		</form>
	</div>
</div>