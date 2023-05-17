<?php


defined('BASE_PATH') or die("permision denided.");




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

#libs for tasks


function getTasks(){

    global $pdo;

    $folderid=$_GET['folder_id'] ?? null;
    $foldercondition='';

    if(isset($folderid) and is_numeric($folderid)){
        
        $foldercondition=" where folder_id=$folderid";
    }

    $sql="SELECT * FROM tasks $foldercondition";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

}


function deleteTask($task_id){

    global $pdo;
    $sql="DELETE FROM tasks WHERE id = $task_id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount();
}


function addTask($folderid,$title){

    global $pdo;
    $user_id=getUserid();
    $sql="INSERT INTO `tasks` (`title`, `user_id`,`folder_id`) VALUES (:title ,:user_id , :folder_id);";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['title'=>$title,'user_id'=>$user_id, 'folder_id'=>$folderid]);
    $stmt->rowCount();
}


function updateTask($taskid){

    global $pdo;
    $sql="UPDATE tasks SET `is_done`=1-`is_done` WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['id'=>$taskid]);
    return $stmt->rowCount();
}