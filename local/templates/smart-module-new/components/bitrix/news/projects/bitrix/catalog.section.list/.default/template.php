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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>

<? if (!empty($arResult['SECTIONS'])) : ?>
	<div class="col-12">

		<? foreach ($arResult['SECTIONS'] as $arSection) :
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
			<div class="projects-card panel_heading" id="<?= $this->GetEditAreaId($arSection['ID']) ?>">
				<div class="block_title">
					<div class="projects-card__icon">
						<? if ($arSection['UF_PREVIEW_IMG']) : ?>
							<img src="<?= \CFile::GetPath($arSection['UF_PREVIEW_IMG']) ?>" loading="lazy" />
						<? endif; ?>
					</div>
					<div class="h3"><?= $arSection['NAME'] ?></div>
					<a href="#" class="projects-card__link h3"><?= $arSection['NAME'] ?></a>
					<div class="projects-card__images">
						<div class="projects-card__img"><img src="img/projects-img1.jpg" alt="" loading="lazy" /></div>
						<div class="projects-card__img"><img src="img/projects-img1.jpg" alt="" loading="lazy" /></div>
						<div class="projects-card__img"><img src="img/projects-img1.jpg" alt="" loading="lazy" /></div>
					</div>
					<div class="projects-card__btn">
						<svg class="svg-icon svg-icon-plus">
							<use xlink:href="#ASSETS_PATH#/img/sprite.svg#plus"></use>
						</svg>
						<svg class="svg-icon svg-icon-minus">
							<use xlink:href="#ASSETS_PATH#/img/sprite.svg#minus"></use>
						</svg>
					</div>
				</div>
				<div class="block_hover">
					<div class="row">
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img1.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="#ASSETS_PATH#/img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img2.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img3.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img1.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img2.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
							<div class="projects-card-box">
								<img src="img/projects-img3.jpg" alt="" class="projects-card-box__img">
								<div class="projects-card-box__body">
									<div class="projects-card-box__text">
										<a href="project-page.html" class="projects-card-box__title">Блок контейнер для
											станции таксопарка</a>
										<div class="box-text">
											<p>Срок реализации: 14 дней</p>
											<p>Общая площадь: 36 м2</p>
										</div>
									</div>
									<a href="project-page.html" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
										<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
												<use xlink:href="img/sprite.svg#arrow-link"></use>
											</svg></span></a>
								</div>
							</div>
						</div>
						<div class="col-12">
							<a href="#" class="btn btn-grey btn-load-projects">Показать еще</a>
						</div>
					</div>
				</div>
			</div>
		<? endforeach; ?>

	</div>
<? endif; ?>