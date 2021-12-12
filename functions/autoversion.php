<?php
/*
* Genera automaticamente un control de versiones de archivos NO dinamicos. (Pueden ser js, css, etc...)
* De /static/styles.css -> /static/styles.{version}.css
* IMPORTANTE: 
* AÑADIR EN UN ARCHIVO .htaccess
* 
    RewriteEngine On
    RewriteRule ^(.*)\.[\d]{10}\.(css|js)$ $1.$2 [L]
*/
function auto_version($file){
  if(strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
    return $file;

  $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}
