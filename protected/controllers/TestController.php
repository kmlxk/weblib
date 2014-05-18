<?php

Yii::import('application.vendor.*');

class TestController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionHTMLExtractor() {

        require_once 'htmlextractor/htmlextractor.php';

        header("Content-type: text/html; charset=utf-8");
        
        $url = 'http://www.th7.cn/Program/php/201303/129348.shtml';
        $text = HTMLExtractor::getUrlMainContent($url, 200, 1);
        $text = HTMLExtractor::convertToUTF8($text);
        if (!$text)
            $text = "抓取失败...可能目标页不规范或者正文太短";

        echo ($text);
    }

    public function actionHtmlExtract() {

        require_once 'htmlextract/htmlextract.class.php';

        header("Content-type: text/html; charset=utf-8");

        //$html = file_get_contents('http://www.th7.cn/Program/php/201303/129348.shtml');
        //file_put_contents('tmp.html', $html);
        $html = file_get_contents('tmp.html');

        preg_match_all('/charset=(.*?)[\'"]/is', $html, $matches);
        if (is_array($matches) && is_array($matches[1])) {
            if (strtoupper($matches[1][0]) != "UTF-8") {
                $html = iconv($matches[1][0], "UTF-8//IGNORE", $html);
            }
        }

        $extractText = new HtmlExtract();
        $text = $extractText->getContent($html, true);
        echo $text;
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}