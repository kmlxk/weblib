<?php

require_once 'simple_html_dom.php';

/**
 * 正文提取类
 * @author wangzhongibn
 * 2010-02-20
 */
class HtmlExtract {

    private $innerHTML;

    /**
     * 获取HTML代码
     * @return string
     */
    public function getInnerHTML() {
        return $this->innerHTML;
    }

    /**
     * 设置HTML代码
     * @param $stringORurl
     * @return string
     */
    private function setInnerHTML($stringORurl) {
        if (preg_match("/^http(s)?:\\\\([\w-]+\.)/", $stringORurl)) {
            $this->innerHTML = call_user_func_array('file_get_contents', $stringORurl);
        } else {
            $this->innerHTML = $stringORurl;
        }

        // HTML 纠错
        if (function_exists("tidy_repair_string")) {
            $this->innerHTML = tidy_repair_string(trim($this->innerHTML), array('indent' => TRUE, 'output-xhtml' => true, 'wrap' => 0), 'utf8');
            $tidy = tidy_parse_string($this->innerHTML, array('indent' => TRUE, 'output-xhtml' => true, 'wrap' => 0), 'utf8');
            $html = tidy_get_html($tidy);
            $this->innerHTML = $html->value;
        }
    }

    /**
     * 从网页源码中获取正文
     * @param $stringORurl 内容或URL
     * @return string
     */
    public function getContent($stringORurl, $isFilter=true, $func='') {
        $this->setInnerHTML($stringORurl);
        $text = null;
        if (!empty($func)) {
            $text = call_user_func_array($func, array($this->innerHTML));
        } else {
            $texts = $this->getTags($this->innerHTML);
            $this->filterMin($texts);
            usort($texts, 'compareScale');
            $text = $texts[count($texts) - 1];
        }

        if ($isFilter) {
            $text = $this->filter($text);
        }
        return $text;
    }

    /**
     * 过滤内容少的标签
     * @param $texts 数组
     * @param $num 数据量
     */
    private function filterMin(&$texts, $num=200) {
        $i = 0;
        foreach ($texts as $text) {
            $number = preg_match_all("/[\x7f-\xff]/", $text, $matches);
            if (($number / 2) < $num) {
                unset($texts[$i]);
            }
            $i++;
        }
    }

    /**
     * 过滤
     * @param $text
     * @return string
     */
    private function filter(&$text) {
        $rules = array();
        array_push($rules, "/<script[^>]*?>.*?<\\script>/is");
        array_push($rules, "/<style[^>]*?>.*?<\\style>/is");
        array_push($rules, "/<\\?(?!img|p|br|strong|font|table|tr|td|th|h1|h2|h3|h4|h5|h6|h7|title|embed|\/img|\/p|\/br|\/strong|\/font|\/table|\/tr|\/td|\/th|\/h1|\/h2|\/h3|\/h4|\/h5|\/h6|\/h7\/title|\/embed)[^>]*>/iUs");
        return preg_replace($rules, '', $text);
    }

    /**
     * 获取网页源码中的标签列表.
     * @param $string
     * @param $tag
     * @return array
     */
    public function getTags($string, $tag='div') {
        $html = null;
        $texts = array();
        $rules = array('@<!--(.+?)-->@is');

        $html = str_get_html($string);
        $divs = $html->find($tag);
        //echo count($divs);  
        foreach ($divs as $div) {
            $text = preg_replace($rules, "", $div->innertext);
            array_push($texts, $text);
        }
        return $texts;
    }

}

/**
 * 计算汉字比例
 * @param $x
 * @param $y
 * @return unknown_type
 */
function compareScale($x, $y) {
    if (empty($x)) {
        if (empty($y)) {
            return 0;
        } else {
            return -1;
        }
    } else {
        if (empty($y)) {
            return 1;
        } else {
            $regex = "/[\x7f-\xff]/";
            $rules = "/<a[^>]*?>.*?<\\a>/is";
            $x = strip_tags(preg_replace($rules, "", $x));
            $y = strip_tags(preg_replace($rules, "", $y));

            //echo "X==".$x."<br /><br />";
            //echo "Y==".$y."<br /><br />";

            $xCount = floatval(preg_match_all($regex, $x, $matches)) / floatval(strlen($x));
            $yCount = floatval(preg_match_all($regex, $y, $matches)) / floatval(strlen($y));

            $val = floatCompare($xCount, $yCount);
            if ($val != 0) {
                return $val;
            } else {
                return stringCompare($x, $y);
            }
        }
    }
}

/**
 * float 对象比较
 * @param $x
 * @param $y
 * @return unknown_type
 */
function floatCompare($x, $y) {
    if ($x < $y)
        return -1;
    if ($x > $y)
        return 1;
    if ($x == $y)
        return 0;
    if (is_numeric($x))
        return (is_numeric($y) ? 0 : -1);
    else
        return 1;
}

/**
 * string 对象比较
 * @param $x
 * @param $y
 * @return unknown_type
 */
function stringCompare($x, $y) {
    if (empty($x)) {
        if (empty($y)) {
            return 0;
        }
        return -1;
    }
    if (empty($y)) {
        return 1;
    }
}
