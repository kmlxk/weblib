<?php

/**
 * HTTP助手
 */
class HttpHelper {

    /**
     * POST数据
     * @param $url string url
     * @param $data string data
     */
    public static function post($url, $data) {
        $params = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-type:application/x-www-form-urlencoded",
                'content' => http_build_query($data),
                ));
        $response = file_get_contents($url, false, stream_context_create($params));
        return $response;
    }

}

/**
 * 定义统一的json返回格式
 */
function getJsonData($data, $success = true, $message = '') {
    return array(
        'success' => $success,
        'message' => $message,
        'data' => $data,
    );
}

function getJsonMessage($success, $message) {
    return array(
        'success' => $success,
        'message' => $message,
    );
}

function guid($pure = true) {
    if (function_exists('com_create_guid')) {
        $guid = com_create_guid();
        if ($pure) {
            $guid = str_replace(array('{', '}', '-'), "", $guid);
        }
        return $guid;
    } else {
        $charid = strtoupper(md5(uniqid(rand(), true)));
        if ($pure) {
            return $charid;
        }
        $hyphen = chr(45); // "-"
        $uuid = chr(123)// "{"
                . substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12)
                . chr(125); // "}"
        return $uuid;
    }
}

