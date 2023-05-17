<?php

include "bootstrap/init.php";


if($_SERVER['REQUEST_METHOD']== 'POST'){

    $action=$_GET['action'];
    $params=$_POST;

    if($action=='register'){

       $result=register($params);

       if($result){

        echo "you are register";
       }else{

        echo "not register";
       }

    }else if($action=='login'){

       $resultLogin=login($params['email'],$params['password']);

       if($resultLogin){

        header("Location:http://task-manager.test/");
        die();

       }else{

        echo "not match information";
       }


    }




}








include "tpl/tpl-auth.php";