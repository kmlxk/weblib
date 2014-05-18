<?php

require_once 'htmlextract.class.php';

if (!empty($_POST['butEnter']) && !empty($_POST['url'])) {

    $html = file_get_contents('http://www.th7.cn/Program/php/201303/129348.shtml');

    preg_match_all("charset=(.*?)/is", $html, $matches);
    if (is_array($matches) && is_array($matches[1])) {
        if (strtoupper($matches[1][0]) != "UTF-8") {
            $html = iconv($matches[1][0], "UTF-8//IGNORE", $html);
        }
    }

    $extractText = new HtmlExtract();
    $text = $extractText->getContent($html, true);
    echo $text;
}
?>
