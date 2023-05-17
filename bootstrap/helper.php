<?php

defined('BASE_PATH') or die("permision denided.");

function assets(string $path):string{

    return URI_BASE."assets/css/".$path;
    
}

function isAjax(){

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ){

        return true;
    }

    return false;

}