<?php

namespace Sprint\Migration;


class Version20240516094110 extends Version
{
    protected $description = "Блог. Генерация содержания";

    protected $moduleVersion = "4.6.1";
    private $iblockId = 6;
    private $fieldFromCode = 'DETAIL_TEXT';
    private $fieldToCode = 'SODERZHANIE';

    public function up()
    {
        \CModule::IncludeModule('iblock');
        $filter = ['IBLOCK_ID' => $this->iblockId];
        $select = ['ID', $this->fieldFromCode, 'PROPERTY_' . $this->fieldToCode];
        $db_res = \CIBlockElement::GetList([], $filter, false, false, $select);
        while ($arr = $db_res->Fetch()) {
            $result = $this->generateHtmlNav($arr);
            if (!$result['HTML']) continue;
            $this->setNavField($arr['ID'], $result['HTML']);
            $newHtmlFrom = $this->getNewHtmlFieldFrom($arr[$this->fieldFromCode]);
            $this->changeFieldFrom($arr['ID'], $newHtmlFrom);
        }
    }

    private function generateHtmlNav(array $arr): array
    {
        $doc = new \DOMDocument('1.0', 'UTF-8');
        $source =  mb_convert_encoding($arr[$this->fieldFromCode], 'HTML-ENTITIES', 'utf-8');
        @$doc->loadHTML($source);

        $h2List = $doc->getElementsByTagName('h2');
        if (empty($h2List)) return [];

        $allTags = iterator_to_array($doc->getElementsByTagName('*'));
        $hList = array_filter($allTags, function ($tag) {
            return $tag->tagName == 'h2' || $tag->tagName == 'h3';
        });

        $hList = array_values($hList);

        $html = '<ol>';
        foreach ($hList as $index => $h) {
            $id = 'title' . $index;

            $next = $hList[$index + 1];
            $prev = $hList[$index - 1];

            $htmlLi = '<li><a href="#' . $id . '">' . $h->nodeValue . '</a>';
            if ($h->tagName === 'h2') {
                if ($prev && ($prev->tagName === 'h3')) $html .= '</ul>';
                $html .= $htmlLi;
                if ($next && ($next->tagName === 'h3')) $html .= '<ul>';
            }

            if ($h->tagName === 'h3') $html .= ($htmlLi . '</li>');

            if ($h->tagName === 'h2') $html .= '</li>';
        }
        $html .= '</ol>';
        return ['HTML' => $html, 'DOC' => $doc];
    }

    private function setNavField($el_id, $html)
    {
        $prop = [];
        $prop[$this->fieldToCode] = array('VALUE' => array('TYPE' => 'HTML', 'TEXT' => $html));
        \CIBlockElement::SetPropertyValuesEx($el_id, $this->iblockId, $prop);
    }

    private function changeFieldFrom($id, string $html)
    {
        $el = new \CIBlockElement;
        $el->Update($id, [$this->fieldFromCode => $html]);
    }

    private function getNewHtmlFieldFrom(string $html): string
    {
        $index = 0;
        // Регулярное выражение для замены id у тегов h2 и h3
        $html_with_ids = preg_replace_callback('/<(h[2-3])([^>]*)>/', function ($matches) use (&$index) {
            $tag = $matches[1];
            $attributes = $matches[2];
            $id = ' id="title' . $index . '"';
            $index++;
            return '<'.$tag.$id.$attributes.'>';
        }, $html);

        return $html_with_ids;
    }

    public function down()
    {
        //your code ...
    }
}
