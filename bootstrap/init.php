<?php

session_start();

include "config.php";

try {

    $pdo=new PDO("mysql:dbname={$database_config->dbname};host={$database_config->host}",$database_config->user,$database_config->pass);
    
} catch (PDOException $e ) {
    
    echo "connection failed". $e->getMessage();
}




include "C:/laragon/www/Task-Manager/bootstrap/constant.php";
include  BASE_PATH."/bootstrap/helper.php";
include  BASE_PATH."/libs/auth-lib.php";
include  BASE_PATH."/libs/task-lib.php";
