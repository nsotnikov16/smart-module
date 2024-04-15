<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<section class="box section-calculate">
    <?if($arParams['HIDE_TITLE']!='Y'):?>
  	   <h2>Калькулятор расчета стоимости</h2>
    <?endif;?>
  	<form method="post" class="form-calculate">
  		<?foreach($arResult['PROPERTIES'] as $prop):?>
  			<input type="hidden" name="<?=$prop['CODE']?>" value="<?=$prop['VALUE']?>">
  		<?endforeach;?>
    	<div class="form-group">
      		<h3>Выбор материала:</h3>
          <?
          $z=1;
          $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_COEF");
          $arFilter = Array("IBLOCK_ID"=>65, "ACTIVE"=>"Y");
          $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
          while($ob = $res->GetNextElement())
          {
            $arFields = $ob->GetFields();?>
           
            <div class="p-popup__check manager__check">
              <input type="radio" id="checkid<?=$arFields['ID']?>" name="material"<?if($z==1):?> checked="checked"<?endif;?> value="<?=$arFields['PROPERTY_COEF_VALUE']?>" data-name="<?=$arFields['NAME']?>">
              <label for="checkid<?=$arFields['ID']?>">
                <span class="check-wrapper">
                    <span class="check-text"><?=$arFields['NAME']?>
                      <span class="tooltip-wrapper">
                          <span class="tooltip-wrapper__icon">?</span>
                          <span class="tooltip-wrapper__text"><?=$arFields['PREVIEW_TEXT']?></span>
                      </span>
                    </span>
                    <span class="check-img"><img src="<?=CFile::GetPath($arFields['PREVIEW_PICTURE'])?>" alt="<?=$arFields['NAME']?>"></span>
                </span>
              </label>
            </div>
          <?
          $z++;
          }
          ?>

    	</div>

    	<div class="form-group">
      		<h3>Вариант исполнения:</h3>
      		<div class="p-popup__check manager__check">
        		<input type="radio" id="checkid5" name="variant-ispoln" checked="checked" value="1" data-name="Стандарт">
        		<label for="checkid5">
          			<span class="check-wrapper">
            			<span class="check-text">Стандарт
           				</span>
          			</span>
        		</label>
      		</div>
      		<div class="p-popup__check manager__check">
        		<input type="radio" id="checkid6" name="variant-ispoln" value="1.85" data-name="Север">
        		<label for="checkid6">
        			<span class="check-wrapper">
          				<span class="check-text">Север
          				</span>
        			</span>
        		</label>
      		</div>

      		<div class="form-group-100">
      			<input type="hidden" name="kolvo-blokov" value="6">
        		<h3>Количество блоков: <span class="range-val">6</span></h3>

        		<div class="range-item"></div>
      		</div>
    	</div>

    	<a href="javascript:void(0);" onclick="$(this).closest('form').submit();" class="btn-modal promo_confirmation">Рассчитать</a>

	    <div class="modal-result-calc" id="result-calc">

	    </div>
  	</form>
</section>


<div class="p-popup" id="calc-fb" style="display: none;">
  <div class="p-popup__wrapper" id="ok-form">
    <div class="p-popup__title">
      Обратный звонок
    </div>
    <p class="p-popup__description">
      Оставте заявку и наш оператор свяжется с Вами в течении 2х минут
    </p>
    <form action="" method="POST" id="calcFB" novalidate name="fb-calc">
      <p id="calc-messageform"></p>

      <input type="hidden" name="calc-material" value="">
      <input type="hidden" name="calc-variant-ispoln" value="">
      <input type="hidden" name="calc-kolvo-blokov" value="">
      <input type="hidden" name="calc-stoimost" value="">
      <input type="hidden" name="calc-vmestimost2" value="">
      <input type="hidden" name="calc-vmestimost1" value="">
      <input type="hidden" name="calc-srok" value="">
      <input type="hidden" name="calc-ploshad" value="">

      <input type="text" class="p-popup__input" name="name" placeholder="Ваше Имя">
      <input type="text" class="p-popup__input" name="phone" placeholder="Ваш телефон">
      <input type="submit" class="p-popup__btn" value="Отправить">
      <div class="p-popup__check">
        <input required type="checkbox" id="checkid-calc" name="check" checked="checked">
        <label for="checkid-calc">
          Согласие на обработку персональных данных
        </label>
      </div>
    </form>
  </div>
</div>

<!--скрипт и подключение ползунка-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

