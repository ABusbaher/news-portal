<?php
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
?>
<div class="main">
<?php if(isset($_SESSION['msg'])){?>
<div class="alert alert-danger"><i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<strong><?php echo $_SESSION['msg']; }
unset($_SESSION['msg']); ?></strong></div>
<?php if(isset($_SESSION['success_msg'])){?>
<div class="alert alert-info"><strong><?php echo $_SESSION['success_msg']; }
unset($_SESSION['success_msg'])?></strong></div>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page']:1;
$items_per_page=5;
$itc = User::get_all();
$items_total_count = count($itc);

$paginate = new Pagination($page,$items_per_page,$items_total_count);
$limit = $items_per_page;
$offset = $paginate->offset();
$users = User::getAll($limit,$offset);
foreach ($users as $user){
  ?>
<div class="row">
<div class="col-md-4">

  <div class="link">
  <img class="media-object" src="http://placehold.it/400x300" alt=""><br />
  <?php
  if($user->status == 1){ echo "
  
  <a class='btn btn-primary btn-lg active' href='edit_user.php?id=". $user->user_id . "' role='button'>Set as admin</a>";}
  ?>
  <a class="btn btn-primary btn-lg active pull-right" href="delete_user.php?id=<?php echo $user->user_id ?>" role="button">Delete user</a><br />
  
  </div>
 </div>
 <div class="col-md-7">
 <div class="lista_vesti">

 <h2>Username:
 <?php echo $user->username ?></h2><br /><br />
 <table class="table table-striped table-inverse">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $user->f_name ?></td>
        <td><?php echo $user->l_name ?></td>
        <td><p><?php echo $user->email ?></p></td>
        <td><?php if($user->status == 2){echo "admin"; }else{ echo "user";}?></p></td>
      </tr>
    </tbody>
</table>
 </div>
<a class="btn btn-primary btn-lg active" href="del_user_comm.php?id=<?php echo $user->user_id ?>" role="button">Delete all users comments</a>
</div>
</div>
<hr>
<?php
  }
?>
</div>
<div class="row">
  <ul class="pager">
  <?php
  $paginate->render_pagination($page="users.php?page=");
  ?>
  </ul>
</div>
<?php
include_once "inc/footer.php";
?>
</body>
</html>
