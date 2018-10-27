<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$strContent=file_get_contents('links-raw');
$arrContent=explode(PHP_EOL,$strContent);

foreach ($arrContent as $strLinha) {
    $strPattern='<https://globoplay.globo.com/v/*/>';
    if(fnmatch($strPattern, $strLinha)){
        $strLinha=str_replace("<",'',$strLinha);
        $strLinha=str_replace(">",'',$strLinha);
        print $strLinha.'<br>';
    }
}
