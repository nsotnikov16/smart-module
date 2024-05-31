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
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])) : ?>

	<div class="row">
		<div class="col-12">
			<div class="calculate-wrapper mb-65">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center">Калькулятор стоимости аренды</h2>
						<form method="post" class="form-calculate">
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="row">
										<div class="col-12 mb-20">
											<label>
												<select name="select" class="select-my" data-arenda-select>
													<option value="">Выберите тип бытовки</option>
													<? foreach ($arResult["ITEMS"] as $arItem) : ?>
														<option value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
													<? endforeach; ?>
												</select>
											</label>
										</div>
										<div class="col-12 col-sm-6 mb-20">
											<div class="slider-range-box">
												<div class="slider-range-box__head">
													<p>
														Срок аренды, мес.
													</p>
													<input type="text" name="dec" class="slider-range-box__input dec1" disabled="" data-arenda-months>
												</div>
												<div class="slider-range-box__body">
													<div class="slider-range slider-range1">
													</div>
													<div class="slider-range-values">
														<p>
															0
														</p>
														<p>
															12
														</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 col-sm-6 mb-20">
											<div class="slider-range-box">
												<div class="slider-range-box__head">
													<p>
														Кол-во бытовок
													</p>
													<input type="text" name="dec" class="slider-range-box__input dec2" disabled="" data-arenda-count>
												</div>
												<div class="slider-range-box__body">
													<div class="slider-range slider-range2">
													</div>
													<div class="slider-range-values">
														<p>
															0
														</p>
														<p>
															20
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row align-items-center">
										<div class="col-12 col-lg-5 mb-20">
											<div class="form-calculate__total">
												<p>
													Итого <strong><span data-arenda-itogo></span> руб.</strong>
												</p>
											</div>
										</div>
										<div class="col-12 col-lg-7 mb-20">
											<button type="button" class="btn btn-green btn-calculate-modal" data-arenda-btn>оставить заявку</button>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-calculate__image">
										<img src="#ASSETS_PATH#/img/calculate-image.png" loading="lazy" data-arenda-img>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal modal-v2 fade" id="arendaModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
				</div>
				<div class="modal-body mt-3">
					<div class="modal-title">Оформление заявки</div>
					<form method="post" class="form-callback" data-arenda-form>
						<div class="row">
							<div class="col-12 mb-20">
								<label>
									<input type="text" placeholder="Введите имя" name="name" required="">
								</label>
							</div>
							<div class="col-12 mb-20">
								<label>
									<input type="text" placeholder="Введите номер телефона" name="phone" required="">
								</label>
							</div>
							<div class="col-12 mb-20">
								<div class="consent">
									<p>Заполняя форму вы соглашаетесь с условиями <a href="/politika-konfidentsialnosti/" class="text-decoration d-inline" target="_blank">политики конфиденциальности</a></p>
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

	<script data-skip-moving="true">
		try {
			window.arendaObj = <?= \CUtil::PhpToJSObject($arResult['ITEMS']) ?>;
		} catch (error) {

		}
	</script>
<? endif; ?>