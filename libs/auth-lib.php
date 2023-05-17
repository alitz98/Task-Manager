<?php

function isLoggedIn(){

    return isset($_SESSION['login']) ? true :false;

}

function logedOut(){

    unset($_SESSION['login']);

}

function register($params){

    global $pdo;

    $pass_hash=password_hash( $params['password'],PASSWORD_BCRYPT) ;
    
    $sql="INSERT INTO `users` (`name`, `email`,`password`) VALUES (:name ,:email , :password);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['name'=>$params['username'],'email'=>$params['email'], 'password'=>$pass_hash]);
 
   return $stmt->rowCount() ? true :false;

}

function getUserByEmail($email){

    global $pdo;
    $sql="SELECT * FROM users WHERE email=:email";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['email'=>$email]);
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);
    return $result[0] ?? null;
}


function login($email,$pass){

    $user=getUserByEmail($email);

    if(is_null($user)){

        return false;
    }

    if(password_verify($pass,$user->password)){
         $_SESSION['login']=$user;
        return true;
    }
    return false;
    
}