<?php
/*
* Limita palabras
*/
function limit_words($str, $limit, $end = '...'){
    if (str_word_count($str, 0) > $limit) {
        $words = str_word_count($str, 2);
        $pos = array_keys($words);
        $str = substr($str, 0, $pos[$limit]) . $end;
    }
    return $str;
}
