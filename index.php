<?php

include "bootstrap/init.php";


if( isset($_GET['delete_folder']) and is_numeric($_GET['delete_folder'])){

    deleteFolder($_GET['delete_folder']);
}




$folders=getFolders();


include "tpl/tpl-index.php";