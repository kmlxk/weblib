<?php

define('DS', DIRECTORY_SEPARATOR);

/**
 * 将\uXXXX这样的转义字符转换回非转义编码
 */
function decodeUnicode($str) {
    $fn = create_function('$matches', 'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");');
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', $fn, $str);
}

/**
 * @param $datestr string 日期，格式2009-11-27
 */
function getTimestamp($datestr) {
    return mktime(0, 0, 0, intval(substr($datestr, 5, 2)), intval(substr($datestr, 8, 2)), intval(substr($datestr, 0, 4)));
}

function getTimeRange($within = 86400, $timestamp = 0) {
    static $timeZoneHour = 0;
    if ($timeZoneHour == 0) {
        //$timeZoneHour = getTimeZoneHour();
    }
    if ($timestamp == 0)
        $timestamp = time();
    $days = floor($timestamp / $within);
    $ret = array(
        'from' => $within * $days - $timeZoneHour,
        'to' => $within * ($days + 1) - $timeZoneHour,
    );
    return $ret;
}

function getTimeZoneHour() {
    $time = time();
    $tstr = date('Y-m-d H:i:s', $time);
    $gmtstr = gmdate('Y-m-d H:i:s', $time);
    return strtotime($tstr) - strtotime($gmtstr);
}

/**
 * 打印变量
 */
function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

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
                'header' => "User-Agent:MyAgent/1.0\r\nContent-type:application/x-www-form-urlencoded",
                'content' => http_build_query($data),
                'timeout' => 60,
                ));
        $response = file_get_contents($url, false, stream_context_create($params));
        return $response;
    }

    /**
     * 模拟表单上传文件
     */
    private function postFile($url, $files, $params) {

        $urlInfo = parse_url($url);
        $host = $urlInfo['host'];
        $port = $urlInfo['port'];
        $query = $urlInfo['path'] . '?' . $urlInfo['query'];
        $fp = fsockopen($host, $port, $errno, $errstr, 30);
        define('CRLF', "\r\n");

        if (!$fp) {
            return false;
        } else {
            define('BOUNDARY', 'pf' . md5(uniqid(microtime())));

            if (is_array($files)) {
                foreach ($files as $filename => $content) {
                    $body = '--' . BOUNDARY . CRLF;
                    $body .= 'Content-Disposition: form-data; name="file"; filename="' . $filename . '"' . CRLF;
                    $body .= 'Content-Type: application/octet-stream' . CRLF . CRLF;
                    $body .= $content . CRLF;
                    $body .= '--' . BOUNDARY . CRLF;
                }
            }

            if (is_array($params)) {
                foreach ($params as $k => $v) {
                    $body .= 'Content-Disposition: form-data; name="{$k}"' . CRLF . CRLF;
                    $body .= $v . CRLF;
                    $body .= '--' . BOUNDARY . CRLF;
                }
            }

            $length = strlen($body);
            $header = 'POST ' . $query . ' HTTP/1.1' . CRLF;
            $header .= 'Host: ' . $host . ':' . $port . CRLF;
            $header .= 'Accept: */*' . CRLF;
            $header .= 'Accept-Encoding: gzip, deflate' . CRLF;
            $header .= 'Content-Type: multipart/form-data; boundary=' . BOUNDARY . CRLF;
            $header .= 'Content-Length: ' . $length . CRLF;
            $header .= 'Connection: Close' . CRLF . CRLF;
            $out = $header . $body;

            fwrite($fp, $out);
            while (!feof($fp)) {
                $return .= fgets($fp, 128);
            }
            fclose($fp);

            // 如果没有返回200状态，将返回信息记录至错误日志
            if (!preg_match('/200 OK/', $return)) {
                return false;
            }

            return true;
        }
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

