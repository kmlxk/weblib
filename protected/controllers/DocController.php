<?php

class DocController extends Controller {

    public $layout = 'doc';

    public function actionIndex() {
        $dpDoc = new CActiveDataProvider('Doc', array(
                    'criteria' => array(
                        'select' => 'id, title, url, created, updated, author, tags',
                        'condition' => 'status=1',
                        'order' => 'created DESC',
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                ));

        $this->render('index', array('dpDoc'=>$dpDoc));
    }

    public function actionView() {
        $doc = Doc::model()->findByPk($_GET['id']);
        $this->render('view', array('doc' => $doc));
    }

}