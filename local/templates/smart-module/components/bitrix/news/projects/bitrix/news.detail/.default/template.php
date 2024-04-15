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

//echo "<pre>"; print_r($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']); echo "</pre>";
?>
<div class="large-6 medium-6 small-12 columns photogallery">
	<div class="slider-for">

		<?if ($arResult['DETAIL_PICTURE']):?>
            <div class="many-wp-cart">
                <a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" rel="gallery"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" />  <span class="portrait-border "></span></a>
                <?if (count($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE']) > 0):?>
                    <?foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $photo):?>
                        <a href="<?=$photo['SRC']?>" class=""  rel="gallery" style="display: none !important;"><img src="<?=$photo['SRC']?>" alt="" />  <span class="portrait-border "></span></a>
                    <?endforeach?>
                <?endif?>
            </div>
		<?endif?>
		<?if (count($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE']) > 0):?>
            <?$a = 0;?>
			<?foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $photo):?>
                <div class="many-wp-cart">
                    <?$b = 0;?>
                <?foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $photo) {?>
                    <a href="<?=$photo['SRC']?>" class=""  rel="gallery"<?if($a != $b) {?> style="display: none !important;"<?}?>><img src="<?=$photo['SRC']?>" alt="" />  <span class="portrait-border "></span></a>
                    <?$b++;?>
                <?}?>
                    <?if ($arResult['DETAIL_PICTURE']):?>
                        <a href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" class=""  rel="gallery" style="display: none !important;"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" />  <span class="portrait-border "></span></a>
                    <?endif;?>
                </div>
                <?$a++;?>
			<?endforeach?>
		<?endif?>
	</div>
	<div class="slider-nav">
		<?if ($arResult['DETAIL_PICTURE']):
			$image = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width'=> 86, 'height'=> 86), BX_RESIZE_IMAGE_EXACT);
			?>
			<div class="image">
				<span class="image-border"></span>
				<img src="<?=$image['src']?>" alt="" />
			</div>
		<?endif?>
		<?if (count($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE']) > 0):?>
			<?foreach ($arResult['DISPLAY_PROPERTIES']['MORE_PHOTO']['FILE_VALUE'] as $photo):
				$image = CFile::ResizeImageGet($photo, array('width'=> 86, 'height'=> 86), BX_RESIZE_IMAGE_EXACT);
				?>
				<div class="image">
					<span class="image-border"></span>
					<img src="<?=$image['src']?>" alt="" />
				</div>
			<?endforeach?>
		<?endif?>
	</div>
</div>


 <div class="col-xs-12 col-sm-4 k-card-info"> 
                   <div class="card-info-block">
                   		
                        <div class="card-info-block-detail">
                        	<div class="card-info-block-detail-img">
                        		<img src="/local/templates/smart-module/images/carusel-page-icon/clock.svg" alt="">
                            </div>
                            
                            <div class="card-info-block-detail-text">
                            	<p> Сроки реализации:</p>
                                <span><?=$arResult['DISPLAY_PROPERTIES']['SROKI_REALIZACII']['VALUE']; ?></span>                   	
                            </div>
                        </div>
                        
                         <div class="card-info-block-detail">
                        	<div class="card-info-block-detail-img">
                        		<img src="/local/templates/smart-module/images/carusel-page-icon/vector.svg" alt="">
                            </div>
                            
                            <div class="card-info-block-detail-text">
                            	<p> Общая площадь:</p>
                                <span><?=$arResult['DISPLAY_PROPERTIES']['OBCHAYA_PLOTHAT']['VALUE']; ?></span>                   	
                            </div>
                        </div>
                        
                         <div class="card-info-block-detail">
                        	<div class="card-info-block-detail-img">
                        		<img src="/local/templates/smart-module/images/carusel-page-icon/man.svg" alt="">
                            </div>
                            
                            <div class="card-info-block-detail-text">
                            	<p> Заказчик:</p>
                                <span><?=$arResult['DISPLAY_PROPERTIES']['ZAKAZCHIK']['VALUE']; ?></span>                   	
                            </div>
                        </div>
                   			
                          <div class="card-info-block-btn">
                          <a href="#order-popup" class=" buy_button" data-base-price="0">Заказать похожий проект</a>
                          </div>   
                            
                   </div>
                	
                
                
                
                
                </div>




<div class="large-12 medium-12 small-12 columns proekty-slider-text">
	<?=$arResult['PREVIEW_TEXT']?>
	<div class="detail">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
</div>




<div class="clearfix"></div>




<div class="yandex-map">
	<h2>Проект на карте</h2>
	<?=$arResult['DISPLAY_PROPERTIES']['MAP']['DISPLAY_VALUE']?>
</div>
<style>
    .lg-outer {
        z-index: 9999 !important;
    }
    .lg-sub-html {
        display: none !important;
    }
    #lg-download {
        display: none !important;
    }
    .lg-fullscreen {
        display: none !important;
    }
    #lg-actual-size {
        display: none !important;
    }
    #lg-share {
        display: none !important;
    }
    .lg-backdrop {
        z-index: 9998 !important;
        background-color: rgba(0,0,0,.3);
    }
    .lg-thumb-outer.lg-grab {
        display: none !important;
    }
</style>