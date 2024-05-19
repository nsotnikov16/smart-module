<?
if (!function_exists('getWebflyCatalogTopText')) {
    function getWebflyCatalogTopText()
    {
        if (!\CModule::IncludeModule('webfly.seocities')) return;
        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_WF_CATALOG_TOP_TEXT");
        $arFilter = array("IBLOCK_CODE" => WF_SEO_IBLOCK, "ACTIVE" => "Y", "NAME" => strtok($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], '?'));

        $res = \CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect)->Fetch();


        return $res['PROPERTY_WF_CATALOG_TOP_TEXT_VALUE'] ? $res['PROPERTY_WF_CATALOG_TOP_TEXT_VALUE']['TEXT'] : '';
    }
}

if (!function_exists('getWebflyCatalogFilterTexts')) {
    function getWebflyCatalogFilterTexts()
    {
        if (!\CModule::IncludeModule('webfly.seocities')) return;
        $filterURL = explode('/', $_SERVER['REDIRECT_URL']);
        $result = [];
        if (in_array('filter', $filterURL)) {
            $arSelectSeoV2 = array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "DETAIL_TEXT");
            $arFilterSeoV2 = array("IBLOCK_ID" => 64, "NAME" => $_SERVER['REDIRECT_URL'], "ACTIVE" => "Y", "PROPERTY_DOMEN" => $_SERVER['SERVER_NAME']);
            $resSeoV2 = CIBlockElement::GetList(array(), $arFilterSeoV2, false, false, $arSelectSeoV2);
            if ($obSeoV2 = $resSeoV2->Fetch()) $result = $obSeoV2;
        }
        return $result;
    }
}

if (!function_exists('getSimilarSections')) {
    function getSimilarSections($sectionId)
    {
        $result = [];
        $arSelect = array('ID', 'NAME', 'SECTION_PAGE_URL', 'UF_SAME', 'UF_IMG_POH_TO_2', 'UF_IMG_POH_TO_1', 'UF_URL_POH_TO_2', 'UF_URL_POH_TO_1', 'UF_TITLE_POH_TO_2', 'UF_TITLE_POH_TO_1', 'UF_SHOWCALC');
        $arFilter = array('IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'ID' => $sectionId);
        $res = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, true, $arSelect);
        while ($ob = $res->GetNext()) {
            if ($ob['UF_SHOWCALC'] == '1') $GLOBALS['showCulc'] = true;
            foreach ($ob as $key => $value) {
                if (!$value) continue;
                if (str_contains($key, '_1')) $result[0][str_replace('_1', '', $key)] = $value;
                if (str_contains($key, '_2')) $result[1][str_replace('_2', '', $key)] = $value;
            }
        }
        ksort($result);
        return $result;
    }
}

if (!function_exists('getSidebarData')) {
    // Перенос со старого шаблона
    function getSidebarData()
    {
        /**
         * Показывать разделы, в которых есть отфильтрованные товары
         */
        global $arrFilter, $arParams;

        // 0. Проверяем, установлен ли фильтр по свойству
        $isFilterIsset = false;
        foreach ($arrFilter as $key => $filterItem) {
            if (strpos($key, "=PROPERTY_") !== FALSE) {
                $isFilterIsset = true;
            }
        }

        $arResultSection = array();
        if (isset($arrFilter["SECTION_ID"]) && $isFilterIsset) {
            // 1. Получим информацию о текущем разделе
            $currentSectionLM = 0;
            $currentSectionRM = 0;
            $currentSectionDL = 0;
            $rsCurrentSection = CIBlockSection::GetByID($arrFilter["SECTION_ID"]);
            if ($arCurrentSection = $rsCurrentSection->GetNext()) {
                $currentSectionLM = $arCurrentSection["LEFT_MARGIN"];
                $currentSectionRM = $arCurrentSection["RIGHT_MARGIN"];
                $currentSectionDL = $arCurrentSection["DEPTH_LEVEL"];
            }


            // 2. Получаем список подразделов текущего раздела
            $childrenDL = $currentSectionDL + 1;
            $childrenSections = array();
            $arOrder = array("LEFT_MARGIN" => "ASC");
            $arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], ">LEFT_MARGIN" => $currentSectionLM, "<RIGHT_MARGIN" => $currentSectionRM, ">DEPTH_LEVEL" => $currentSectionDL);
            $arSelect = array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "DEPTH_LEVEL");
            $rsSectionsResult = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
            while ($arSectionsResult = $rsSectionsResult->GetNext()) {
                $childrenSections[] = $arSectionsResult;
            }

            // 3. Группируем массив по вложенности
            $childrenSectionGroupped = array();
            foreach ($childrenSections as $key => $childrenSectionItem) {
                if ($childrenSectionItem["DEPTH_LEVEL"] == $childrenDL) {
                    $childrenSectionGroupped[$childrenSectionItem["ID"]] = array();
                } else {
                    $childrenSectionGroupped[$childrenSectionItem["IBLOCK_SECTION_ID"]][] = $childrenSectionItem["ID"];
                }
            }


            // 4. Если фильтр установлен - получаем разделы элементов, подходящих под фильтр, группируем по разделам
            $childrenSectionsRealID = array();
            $arOrder = array("SORT" => "ASC");
            $arFilter = $arrFilter;
            $arSelect = array("ID", "IBLOCK_ID", "SECTION_ID");
            $arGroup = array("IBLOCK_SECTION_ID");
            $rsElement = CIBlockElement::GetList($arOrder, $arFilter, $arGroup, false, $arSelect);
            while ($arElementResult = $rsElement->GetNext()) {
                $childrenSectionsRealID[] = $arElementResult["IBLOCK_SECTION_ID"];
            }

            // 5. Получим разделы, в которых есть хоть 1 элемент, подходящий под фильтр
            global $arResultSection;
            $arResultSection = array();
            foreach ($childrenSectionGroupped as $key => $sectionGroup) {

                if (in_array($key, $childrenSectionsRealID)) {
                    $arResultSection[] = $key;
                } else {
                    foreach ($sectionGroup as $sectionID) {
                        if (in_array($sectionID, $childrenSectionsRealID)) {
                            $arResultSection[] = $key;
                            break;
                        }
                    }
                }
            }
        }
    }
}
