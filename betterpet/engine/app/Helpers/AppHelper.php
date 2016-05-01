<?php
class AppHelper {
    public static function snippetgreedy($text,$length,$tail) {
        $text = trim($text);
        if(strlen($text) > $length) {
            for($i=0;$text[$length+$i]!=" ";$i++) {
                if(!$text[$length+$i]) {
                    return $text;
                }
            }
            $text = substr($text,0,$length+$i) . $tail;
        }
        return $text;
    }
}
?>