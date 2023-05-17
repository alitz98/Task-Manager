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
    <div class="userPanel"><i class="fa fa-chevron-down"></i><span class="username">John Doe </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
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
          <li class="active"> <i class="fa fa-home"></i>All</li>

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
        <div class="title">Manage Tasks</div>
        <div class="functions">
          <div class="button active">Add New Task</div>
          <div class="button">Completed</div>
          <div class="button inverz"><i class="fa fa-trash-o"></i></div>
        </div>
      </div>
      <div class="content">
        <div class="list">
          <div class="title">Today</div>
          <ul>
            <li class="checked"><i class="fa fa-check-square-o"></i><span>Update team page</span>
              <div class="info">
                <div class="button green">In progress</div><span>Complete by 25/04/2014</span>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>Design a new logo</span>
              <div class="info">
                <div class="button">Pending</div><span>Complete by 10/04/2014</span>
              </div>
            </li>
            <li><i class="fa fa-square-o"></i><span>Find a front end developer</span>
              <div class="info"></div>
            </li>
          </ul>
        </div>
        <div class="list">
          <div class="title">Tomorrow</div>
          <ul>
            <li><i class="fa fa-square-o"></i><span>Find front end developer</span>
              <div class="info"></div>
            </li>
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
