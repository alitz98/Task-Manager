<?php

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