<?php

include  "C:/laragon/www/Task-Manager/bootstrap/init.php";

if(!isAjax()){

    die("this request is invalid.");

}


if(!isset($_POST['action']) || empty($_POST['action'])){

    die("not initial action.");
}

$action=$_POST['action'];

switch ($action) {

    case 'addfolder':

        addFolder($_POST['foldername']);
        
        break;

        case 'addtask':

            addTask($_POST['folderid'],$_POST['title']);
            
            break;
            
            
        case 'updatetask':

            updateTask($_POST['taskid']);
            
            break;   

}