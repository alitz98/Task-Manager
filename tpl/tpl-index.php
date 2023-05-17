<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>task-manager</title>
  <link rel="stylesheet" href="<?=assets('style.css') ?>">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><a href="?logout" class="fa fa-sign-out"></a><span class="username">John Doe </span></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Folders</div>
        <ul class="list">
        <a href="?all-folders"><li class="active"> <i class="fa fa-home"></i>All</li></a>

          <?php foreach($folders as $folder): ?>
         
  <a href="?folder_id=<?=$folder->id ?>" >
    <li class="<?= (isset($_GET['folder-id']) and $_GET['folder-id']== $folder->id) ? 'active':'' ?>"> <i class="fa fa-envelope"></i><?=$folder->name ?>
        <a href="?delete_folder=<?=$folder->id ?>" style="float: right;font-size: 15px;">x</a>
    </li>
  </a>  

          <?php endforeach; ?>
        </ul>


        <input id="inputvalue" type="text" name="add-folders">
        <button id="button">+</button>




      </div>
    </div>
    <div class="view">
      <div class="viewHeader">


        <input id="add-task" type="text">
       
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>

          <?php foreach($tasks as $task): ?>


            <li class="<?=$task->is_done ? "checked" : '' ?>">
            <i id="doneswitch" data-taskid="<?=$task->id ?>"  class="fa <?=$task->is_done ? 'fa-check-square-o' : 'fa-square-o' ?> "></i><span><?=$task->title ?></span>
              <div class="info">
                <span><?=$task->created_at ?></span>
                <a href="?delete_task=<?=$task->id ?>" style="color: red;" onclick="confirm('are you sure?')">x</a>
              </div>
             
            </li>

            <?php endforeach; ?>
            
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

$(document).ready(function () {

  $('#doneswitch').click(function (e) { 
    e.preventDefault();

  var doneswitch=$('#doneswitch').attr('data-taskid');

      $.ajax({
        method:"post",
        url: "process/ajax.php",
        data: {action:"updatetask",taskid:doneswitch},
        success: function (response) {
          
          location.reload();
        }
      });
    
  });







  $('#add-task').on('keypress',function(e) {

    var inputtask=$('#add-task').val();


    if(e.which == 13) {

      $.ajax({

          method: "post",
          url: "process/ajax.php",
          data: {action:"addtask",folderid:<?=$_GET['folder_id'] ?>,title:inputtask},

          success: function (response) {

            location.reload();
          }
            });
        
    }
});


  
  $('#button').click(function (e) { 
    e.preventDefault();

   var input= $('#inputvalue').val();

    $.ajax({

      method: "post",
      url: "process/ajax.php",
      data: {action:"addfolder",foldername:input},
      
      success: function (response) {

        var id=response;

        $('<a href="?folder_id='+id+'" > <li> <i class="fa fa-envelope"></i>' + input + '<a href="?delete_folder='+id+'" style="float: right;font-size: 15px;">x</a></li> </a>').appendTo("ul.list");      
        
      }
    });
    
  });




});
</script>

</body>
</html>