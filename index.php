<?php

include "bootstrap/init.php";


if( isset($_GET['delete_folder']) and is_numeric($_GET['delete_folder'])){

    deleteFolder($_GET['delete_folder']);
}

if( isset($_GET['delete_task']) and is_numeric($_GET['delete_task'])){

    deleteTask($_GET['delete_task']);
}




$folders=getFolders();

$tasks=getTasks();


include "tpl/tpl-index.php";