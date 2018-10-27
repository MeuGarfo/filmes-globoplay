<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'simple_html_dom.php';

function isUrl($url){
    if(filter_var($url, FILTER_VALIDATE_URL)){
        return $url;
    }else{
        return false;
    }
}

$strLinks=file_get_contents('links');
$arrLinks=explode(PHP_EOL,$strLinks);
$arrFilmes=null;

foreach($arrLinks as $strLink){
    if(isUrl($strLink)){
        $html = file_get_html($strLink);
        foreach($html->find('body') as $filme) {
            $arrMtd['titulo'] = $filme->find('.playkit-video-info__ep-title', 0)->plaintext;
            $arrMtd['classind'] = $filme->find('.playkit-content-rate', 0)->plaintext;
            $arrMtd['ano'] = $filme->find('.playkit-video-info__detail-season', 0)->plaintext;
            $arrMtd['duração'] = $filme->find('.playkit-video-info__duration', 0)->plaintext;
            $arrMtd['descrição'] = $filme->find('.playkit-video-info__ep-description', 0)->plaintext;
            $arrMtd['likes'] = $filme->find('.count', 0)->plaintext;
            $arrMtd['link'] = $strLink;
            $arrFilmes[] = $arrMtd;
        }
    }
}

if(file_exists('filnes.json')){
    unlink('filmes.json');    
}

if(file_put_contents('filmes.json',json_encode($arrFilmes))){
    print 'filmes.json gerado com sucesso!';
}else{
    print 'erro ao salvar';
}
