<?php

class DocService {

    public static function getHash($doc) {
        $data = $doc->created . '|' . $doc->updated . '|' . $doc->title . '|' . $doc->url;
        //$hash = hexdec(hash('adler32', $data));
        $hash = md5($data);
        return $hash;
    }

}

?>
