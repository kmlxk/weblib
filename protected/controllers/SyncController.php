<?php

class SyncController extends Controller {

    public function actionIndex() {
        $ar1 = array(3301 => 1, 3302 => 2);
        $ar2 = array(3301 => 1, 3303 => 2);
        $together = array_intersect_key($ar1, $ar2);
        var_dump($together);
        var_dump(array_diff_key($ar1, $together));
        var_dump(array_diff_key($ar2, $together));
    }


    /**
     * 获取所有文档的hash
     */
    public function actionGetHashList() {
        $models = Doc::model()->findAll(array(
            'select' => 'id, hash',
                ));
        $ret = array();
        foreach ($models as $item) {
            $ret[] = $item->hash;
        }
        echo json_encode($ret);
    }

    /**
     * 更新所有文档的hash
     */
    public function actionUpdateHash() {

        $models = Doc::model()->findAll(array(
            'select' => 'id, title, url, hash, created, updated',
                ));
        foreach ($models as $item) {
            $hash = DocService::getHash($item);
            $item->hash = $hash;
            echo $item->id;
            echo ' : ';
            echo $hash;
            echo ' : ';
            echo $item->save(false, array('hash'));
            echo '<br />';
        }
    }

}