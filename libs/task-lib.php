<?php


defined('BASE_PATH') or die("permision denided.");


function getUserid(){

    return 1;
}

function getFolders(){
    global $pdo;
    $sql="SELECT * FROM folders";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function deleteFolder(int $folder_id){

    global $pdo;
    $sql="DELETE FROM folders WHERE id = $folder_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}


function addFolder(string $folder_name){

    global $pdo;
    $user_id=getUserid();
    $sql="INSERT INTO `folders` (`name`, `user_id`) VALUES (:name,:user_id);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['name'=>$folder_name,'user_id'=>$user_id]);

    $id = $pdo->lastInsertId();
    $statement = $pdo->prepare("select * from folders where id = :id");
    $statement->execute(array(':id' => $id));
    $inserted_folder = $statement->fetch();
    echo $inserted_folder['id'] ;
}