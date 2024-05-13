<?


if (!function_exists('strip_HTML_tags')) {

    function strip_HTML_tags($html)
    {

        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));

        $clean_text = '';
        foreach ($dom->getElementsByTagName('*') as $node) {
            $clean_text .= $node->nodeValue;
        }
        return $clean_text;
    }
}
