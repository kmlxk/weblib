<?php

function initProxy() {
    $ip = gethostbyname(null);
    if (strpos($ip, '10.98.') == 0) {
        $arContext = array(
            'http' => array(
                'proxy' => 'tcp://127.0.0.1:8000',
                'request_fulluri' => true,
            ),
        );
        $cxContext = stream_context_get_default($arContext);
    }
}
initProxy();

/**
 * GUID是文章记录的唯一编号，几乎不会冲突，同步时以GUID为主，
 * 此外HASH值用于标示文章属性和内容是否有修改，如果修改过也需要更新。
 */
class SyncController extends Controller {

    public function actionIndex() {
        $ar1 = array(3301 => 1, 3302 => 2);
        $ar2 = array(3301 => 1, 3303 => 2);
        $together = array_intersect_key($ar1, $ar2);
        var_dump($together);
        var_dump(array_diff_key($ar1, $together));
        var_dump(array_diff_key($ar2, $together));
        var_dump(guid());
    }

    public function actionSync($url) {
        set_time_limit(1800);
        SyncService::sync($url);
    }

    /**
     * 远程接口：根据GUID获取所有文档
     */
    public function actionGetDocByGuid($guids) {
        $guids = explode(',', $guids);
        $list = SyncService::getDocByGuids($guids);
        echo json_encode(getJsonData($list, true));
    }

    /**
     * 远程接口：获取所有文档的guid/hash
     */
    public function actionGetList() {
        $ret = SyncService::getLocalList();
        echo json_encode($ret);
    }

    /**
     * 远程接口：添加多个文档
     */
    public function actionAddDocs() {
        $json = Yii::app()->request->getParam('json');
        $list = json_decode($json, true);
        foreach ($list as $item) {
            $doc = new Doc();
            $doc->attributes = $item;
            $doc->save();
        }
    }

    /**
     * 更新所有文档的hash，一般不用，用于初始化或重建doc表
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

    /**
     * 更新所有文档的hash，一般不用，用于初始化或重建doc表
     */
    public function actionUpdateGuid() {
        $models = Doc::model()->findAll(array(
            'select' => 'id, title, url, hash, created, updated',
                ));
        foreach ($models as $item) {
            $item->guid = guid();
            echo $item->id;
            echo ' : ';
            echo $item->guid;
            echo ' : ';
            echo $item->save(false, array('guid'));
            echo '<br />';
        }
    }

}