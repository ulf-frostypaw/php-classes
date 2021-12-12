<?php
function compression(){ // Limpia HTML por comprimir
    function minifier($code) {
        $search = array(
            '/\>[^\S ]+/s', // Remove whitespaces after tags
            '/[^\S ]+\</s', // Remove whitespaces before tags
            '/(\s)+/s', // Remove multiple whitespace sequences
            '/<!--(.|\s)*?-->/' // Removes comments
        );
        $replace = array('>', '<', '\\1');
        $code = preg_replace($search, $replace, $code);
        return $code;
    }
    ob_start("minifier");
}

function end_compression(){ // End
  ob_end_flush();
}
