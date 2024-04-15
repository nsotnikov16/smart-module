<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(!empty($arResult["CATEGORIES"])):?>
	<?//$this->SetViewTarget('searchnew');?>
	<div class="box">
		<div class="result_block" style="display: block;">
			<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
				<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
					<?
					$res = CIBlockElement::GetByID($arItem["ITEM_ID"]);
					if($ar_res = $res->GetNext()){
					  $pic = $ar_res['PREVIEW_PICTURE'];
					}
					$arPhotoSmall = CFile::ResizeImageGet(
					   $pic, 
					   array(
					      'width'=>64,
					      'height'=>30
					   ), 
					   BX_RESIZE_IMAGE_PROPORTIONAL,
					   Array(
					      "name" => "sharpen", 
					      "precision" => 0
					   )
					);
					?>
					<?if($arItem["TYPE"]!="all" && $arItem["ITEM_ID"]>0):?>
						<?//=$arItem["ITEM_ID"]?>
						<div class="search_result">
							<a href="<?echo $arItem["URL"]?>">
								<?//if($arPhotoSmall!=""):?>
									<img src="<?=$arPhotoSmall["src"]?>" alt="" class="result_image">
								<?//endif;?>
								<p class="result_name"><?echo $arItem["NAME"]?></p>
							</a>
						</div>
					<?endif;?>
				<?
				endforeach;?>
			<?endforeach;?>
		</div>
	</div>
	<?//$this->EndViewTarget();?> 


	<?/*

	<table class="title-search-result">
		<?foreach($arResult["CATEGORIES"] as $category_id => $arCategory):?>
			<tr>
				<th class="title-search-separator">&nbsp;</th>
				<td class="title-search-separator">&nbsp;</td>
			</tr>
			<?foreach($arCategory["ITEMS"] as $i => $arItem):?>
			<tr>
				<?if($i == 0):?>
					<th>&nbsp;<?echo $arCategory["TITLE"]?></th>
				<?else:?>
					<th>&nbsp;</th>
				<?endif?>

				<?if($category_id === "all"):?>
					<td class="title-search-all"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></a></td>
				<?elseif(isset($arItem["ICON"])):?>
					<td class="title-search-item"><a href="<?echo $arItem["URL"]?>"><img src="<?echo $arItem["ICON"]?>"><?echo $arItem["NAME"]?></a></td>
				<?else:?>
					<td class="title-search-more"><a href="<?echo $arItem["URL"]?>"><?echo $arItem["NAME"]?></a></td>
				<?endif;?>
			</tr>
			<?endforeach;?>
		<?endforeach;?>
		<tr>
			<th class="title-search-separator">&nbsp;</th>
			<td class="title-search-separator">&nbsp;</td>
		</tr>
	</table><div class="title-search-fader"></div>*/?>
<?endif;
?>