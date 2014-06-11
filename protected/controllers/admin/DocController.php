<?php

class DocController extends Controller {

    public $layout = 'admin';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionTest() {
        $this->render('test');
    }

    public function actionAdd() {
        $this->render('add');
    }

    public function actionSave() {
        $values = $_POST;
        $values['content'] = $_POST['editorValue'];
        unset($values['editorValue']);
        $doc = new Doc();
        $doc->attributes = $values;
        $doc->created = time();
        $doc->updated = time();
        $doc->status = 1;
        $doc->guid = guid();
        $doc->hash = DocService::getHash($doc);
        $doc->save();
        $msg = array('message'=>"文章保存成功", 'icon'=>'success');
        Yii::app()->user->setFlash('message', json_encode($msg));
        $this->redirect(array('admin/doc/add'));
    }

    public function actionDoGrab() {
        $doc = new Doc();
        $doc->title = 'doc1';
        $doc->url = 'http://www.com/doc1';
        $doc->content = 'doc1';
        $doc->save();
        echo 'saved';
    }

    public function actionGrab() {
        $this->render('grab');
    }

    public function actionIndex() {
        $this->render('index');
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