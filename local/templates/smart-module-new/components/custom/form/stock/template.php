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
global $today;
$this->setFrameMode(true); ?>

<? if ($arResult['ID']) : ?>
	<div class="sales-sidebar">
		<div class="sales-sidebar__title">
			<?= $arResult["PROPERTY_TITLE_VALUE"] ?>
		</div>
		<div class="timer_block">
			<? if (strtotime(date('d.m.Y H:i:s')) < strtotime($today)) : ?>
				<? include __DIR__ . '/script.php'; ?>
			<? else : ?>
				Акция окончена.
			<? endif; ?>
		</div>

		<form method="POST" class="form-sales" data-form-stock>
			<input type="hidden" name="akcid" value="<?= $arResult["ID"] ?>">
			<input type="hidden" name="akcname" value="<?= $arResult["NAME"] ?>">
			<label>
				<input type="text" name="phone" placeholder="+7 (___) ___-__-__" required />
			</label>

			<button class="btn btn-green text-transform" type="submit">
				<?= $arResult["PROPERTY_TEXTBUTTON_VALUE"] ?>
			</button>

			<label class="label-checkbox">
				<input type="checkbox" name="check" checked="checked" />
				<span class="label-checkbox__custom"></span>
				<span class="label-checkbox__text">Согласие на обработку
					<a href="#POLICY_URL#" class="d-inline text-decoration color-accent" target="_blank">персональных
						данных</a></span>
			</label>
			<p data-success-stock></p>
		</form>
	</div>

	<div class="modal fade" id="errorStockModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<div class="modal-title">Произошла какая-то ошибка! Попробуйте снова</div>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>