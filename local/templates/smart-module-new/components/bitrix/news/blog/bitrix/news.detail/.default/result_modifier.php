<?php

if (!function_exists('editDetailText')) {
    function editDetailText($detailText, $contentImages)
    {
        if (empty($contentImages)) return $detailText;

        foreach ($contentImages as $imgId) {
            $arr = \CFile::GetFileArray($imgId);
            if (!$arr['SRC']) continue;
            $arr['NAME'] = substr($arr['ORIGINAL_NAME'], 0, strrpos($arr['ORIGINAL_NAME'], '.'));

            $replacementImgModal = '
            <figure class="article-image article-image-v2">
				<a class="article-image__img" data-fancybox="gallery" href="' . $arr['SRC'] . '">
					<img src="' . $arr['SRC'] . '" alt="' . $arr['NAME'] . '" loading="lazy" />
				</a>
				<figcaption class="article-image__name">
					<span>' . $arr['NAME'] . '</span>
				</figcaption>
			</figure>
            ';

            $replacementImg = '
            <figure class="article-image">
				<div class="article-image__img">
					<img src="' . $arr['SRC'] . '" alt="' . $arr['NAME'] . '" loading="lazy" />
				</div>
				<figcaption class="article-image__name">
					<span>' . $arr['NAME'] . '</span>
				</figcaption>
			</figure>
            ';

            $detailText = str_replace(
                '[' . $arr['ORIGINAL_NAME'] . ']',
                $replacementImgModal,
                $detailText
            );

            $detailText = str_replace(
                '|' . $arr['ORIGINAL_NAME'] . '|',
                $replacementImg,
                $detailText
            );
        }

        $replacementblockquote = '
        <blockquote class="company-block-advantages-info-wrapper article-block-info">
            <div class="company-block-advantages-info-card">
                <span class="company-border"></span>
                <p>$1</p>
            </div>
        </blockquote>';
        $detailText = preg_replace('/\{(.+?)\}/', $replacementblockquote, $detailText);

        return $detailText;
    }
}

$arFilterPopular = ['IBLOCK_ID' => $arResult['IBLOCK_ID'], '!ID' => $arResult['ID']];
$arSelectPopular = ['ID', 'NAME', 'ACTIVE_FROM', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL'];
$db_popular = CIBlockElement::GetList(['date_active_from' => 'desc'], $arFilterPopular, false, ['nTopCount' => 3], $arSelectPopular);
$populars = [];
while ($popular = $db_popular->Fetch()) :
    $populars[] = [
        'IMG_SRC' => CFile::GetPath($popular['DETAIL_PICTURE']),
        'DATE' => date('d.m.Y', MakeTimeStamp($popular["ACTIVE_FROM"])),
        'NAME' => $popular['NAME'],
        'DETAIL_PAGE_URL' => \CIblock::ReplaceDetailUrl($popular['DETAIL_PAGE_URL'], $popular, true, 'E')
    ];
endwhile;
$arResult['POPULARS'] = $populars;
$arResult['~DETAIL_TEXT'] = editDetailText($arResult['DETAIL_TEXT'], $arResult['PROPERTIES']['CONTENT_IMAGES']['VALUE']);
$this->__component->SetResultCacheKeys(['POPULARS']);
