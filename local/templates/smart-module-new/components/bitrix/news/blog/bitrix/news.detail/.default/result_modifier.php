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
            <figure class="figure">
                <a data-fancybox="gallery" href="' . $arr['SRC'] . '">
                    <img alt="' . $arr['NAME'] . '" class="img-responsive sert-img" src="' . $arr['SRC'] . '" loading="lazy" draggable="false">
                </a>
                <figcaption>' . $arr['NAME'] . '</figcaption>
            </figure>';

            $replacementImg = '
            <figure class="figure">
                <span class="window-box window-box-no-head">
                    <span class="window-box__body">
                        <img alt="' . $arr['NAME'] . '" class="img-responsive sert-img" src="' . $arr['SRC'] . '" loading="lazy" draggable="false">
                    </span>
                </span>
                <figcaption>' . $arr['NAME'] . '</figcaption>
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

        $replacementblockquote = '<blockquote class="blockquote"><p>$1</p></blockquote>';
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
