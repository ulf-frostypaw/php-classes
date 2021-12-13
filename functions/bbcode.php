<?php
function bbcode($str){
    //Convertimos los caracteres HTML en sus entidades para mostrarlas literalmente
    $str = htmlentities($str);
    // La matriz de expresiones regulares con las que se busca el BBCode
    $patterns = array(
        '#\[b\](.*?)\[/b\]#is', // Negrita ([b]texto[/b]
        '#\[i\](.*?)\[/i\]#is', // Cursiva ([i]texto[/i]
        '#\[u\](.*?)\[/u\]#is', // Subrayado ([u]texto[/u])
        '#\[s\](.*?)\[/s\]#is', // Tachado ([s]texto[/s])
        '#\[quote\](.*?)\[/quote\]#is', // Cita ([quote]texto[/quote])
        '#\[code\]\[/code\]#is', // Código inline texto
        '#\[size=([1-9]|1[0-9]|20)\](.*?)\[/size\]#is', // Tamaño de fuente 1-20px [size=20]texto[/size])
        '#\[color=\#?([A-F0-9]{3}|[A-F0-9]{6})\](.*?)\[/color\]#is', // Color de fuente ([color=#00F]texto[/color])
        '#\[url=((?:ftp|https?)://.*?)\](.*?)\[/url\]#i', // Enlace con texto de anclaje ([url=http://url]texto[/url])
        '#\[url\]((?:ftp|https?)://.*?)\[/url\]#i', // Enlace ([url]http://url[/url])
        '#\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]#i' // Imagen ([img]http://url_de_imagen[/img])
   );
    // Cadenas correspondientes con las que se reemplazan las coincidencias encontradas
    $toReplace = array(
        '<strong>$1</strong>',
        '<em>$1</em>',
        '<span style="text-decoration: underline;">$1</span>',
        '<span style="text-decoration: line-through;">$1</span>',
        '<blockquote>$1</blockquote>',
        '<pre>$1</'.'pre>',
        '<span style="font-size: $1px;">$2</span>',
        '<span style="color: #$1;">$2</span>',
        '<a href="$1">$2</a>',
        '<a href="$1">$1</a>',
        '<img src="$1" alt="" />'
    );
    // Realizar la conversión BBCode - HTML
    $str = preg_replace($patterns, $toReplace, $str);
    // Convertir linebras a <br />
    $str = nl2br($str, true);
    return $str;
}
