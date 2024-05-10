<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
?>
<section class="page page-delivery">
	<div class="container">
		<div class="row">
			#BREADCRUMB#
			<div class="col-12">
				<h1 class="text-center mb-75">#H1#</h1>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-12 col-lg-5">
				<div class="delivery-image"><img src="#ASSETS_PATH#/img/delivery-img.png" alt="" loading="lazy" /></div>
			</div>
			<div class="col-12 col-lg-7">
				<div class="delivery-content">
					<div class="box-text">
						<p>Наша компания осуществляет доставку модульных бытовок
							по Санкт-Петербургу и области до пункта назначения.
							Блок-контейнеры перевозятся как в собранном виде, так и в
							демонтированном. При этом не требуется специальное
							сопровождение груза, что <strong class="color-accent">значительно удешевляет
								доставку.</strong></p>

						<p>Мы располагаем собственным автопарком, что позволяет
							осуществлять доставку клиентам <strong class="color-accent">без задержек.</strong></p>

						<p>Для транспортировки задействуются грузовые автомобили с
							установленным краном-манипулятором. Управляет
							погрузкой и разгрузкой <strong class="color-accent">обученный водитель-крановщик.</strong>
							Стандартная грузоподъемность автотранспорта составляет
							5 тонн. При необходимости перевезти одновременно
							несколько бытовок используются транспортные средства с
							полуприцепом или прицепом – в зависимости от объема и
							массы груза.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="recommendation-delivery">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Чтобы максимально сэкономить ваше
					время, мы рекомендуем:</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-lg-4 mb-30">
				<div class="recommendation-delivery-box">
					<div class="recommendation-delivery-box__number">01</div>
					<div class="recommendation-delivery-box__text">
						<div class="box-text">
							<p>Позаботиться об удобном
								подъезде габаритного
								транспорта к месту выгрузки</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4 mb-30">
				<div class="recommendation-delivery-box">
					<div class="recommendation-delivery-box__number">02</div>
					<div class="recommendation-delivery-box__text">
						<div class="box-text">
							<p>Очистить подъездные <br>
								пути от снега и мусора</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4 mb-30">
				<div class="recommendation-delivery-box">
					<div class="recommendation-delivery-box__number">03</div>
					<div class="recommendation-delivery-box__text">
						<div class="box-text">
							<p>Подготовить фундамент или
								основание для монтажа
								модульного здания. Согласно
								нашим рекомендациям.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => '/include/content/order-block.php',
				"EDIT_TEMPLATE" => "standard.php"
			)
		); ?>
	</div>
</section>
<?
$APPLICATION->IncludeComponent(
	"custom:form",
	"questions",
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>