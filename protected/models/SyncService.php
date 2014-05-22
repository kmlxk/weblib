<?php

class SyncService {
    const LOCAL_NEED = 'LOCAL';
    const REMOTE_NEED = 'REMOTE';

    /**
     * 对比本地和远程的差别
     * @param $remote 远程GUID->hash数组
     * @param $local 本地GUID->hash数组
     * @return [本地需要补充guid, 远程需要补充的guid]
     */
    public static function compare($local, $remote) {
        $together = array_intersect_key($remote, $local);
        $remoteNeed = array_diff_key($local, $together);
        $localNeed = array_diff_key($remote, $together);
        return array(
            self::REMOTE_NEED => $remoteNeed,
            self::LOCAL_NEED => $localNeed,
        );
    }

    /**
     * 获取远程的文档GUID:hash列表
     */
    public static function getRemoteList($baseUrl) {
        $url = $baseUrl . '?r=sync/getlist';
        $json = file_get_contents($url);
        $remote = json_decode($json, true);
        return $remote;
    }

    /**
     * 获取本地的文档GUID:hash列表
     */
    public static function getLocalList() {
        $models = Doc::model()->findAll(array(
            'select' => 'id, hash, guid',
                ));
        $local = array();
        foreach ($models as $item) {
            $local[$item->guid] = $item->hash;
        }
        return $local;
    }

    /**
     * 根据guid数组获取文档
     * @param $guids array GUID数组
     */
    public static function getDocByGuids($guids) {
        $models = Doc::model()->findAllByAttributes(array("guid" => $guids));
        $list = array();
        foreach ($models as $item) {
            $list[] = $item->attributes;
        }
        return $list;
    }

    /**
     * 获取guid数组远程的文档
     * @param $baseUrl string 远程 app URL
     * @param $guids array GUID数组
     */
    public static function getRemoteDocByGuids($baseUrl, $guids) {
        $url = $baseUrl . '?r=sync/GetDocByGuid&guids=' . implode(',', $guids);
        $json = file_get_contents($url);
        $list = json_decode($json, true);
        return $list['data'];
    }

    /**
     * 同步
     * @param $baseUrl string 远程 app URL
     */
    public static function sync($baseUrl) {
        $remote = SyncService::getRemoteList($baseUrl);
        $local = SyncService::getLocalList();
        $ret = SyncService::compare($local, $remote);

// 获取远程服务器中新增的doc，并添加
        $guids = array_keys($ret[self::LOCAL_NEED]);
        $docs = SyncService::getRemoteDocByGuids($baseUrl, $guids);
        foreach ($docs as $item) {
            $doc = new Doc();
            $doc->attributes = $item;
            $doc->save();
        }
// 获取本地服务器中新增的doc，并发送到远程
        $guids = array_keys($ret[self::REMOTE_NEED]);
        $docs = SyncService::getDocByGuids($guids);
        $json = json_encode($docs);
        $url = $baseUrl . '?r=sync/AddDocs';
        HttpHelper::post($url, array('json'=>$json));
    }

}
