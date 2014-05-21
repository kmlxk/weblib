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
    public static function getRemoteList($remoteBase) {
        $url = $remoteBase . '?r=sync/getlist';
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
     * 同步
     */
    public static function sync($remoteBase) {
        $remote = SyncService::getRemoteList($remoteBase);
        $local = SyncService::getLocalList();
        $ret = SyncService::compare($local, $remote);
        $remoteNeed =  $ret[self::REMOTE_NEED];
        $localNeed =  $ret[self::LOCAL_NEED];
        $guids = array();
        foreach ($localNeed as $guid=>$hash) {
            $guids[] = $guid;
        }
        $url = $remoteBase . '?r=sync/GetDocByGuid&guids='.implode(',', $guids);
        $json = file_get_contents($url);
        $item = json_decode($json, true);
        var_dump($item);
        
    }

}