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
unset($_SESSION['msg'])?></strong></div>
<?php if(isset($_SESSION['success_msg'])){?>
<div class="alert alert-info"><strong><?php echo $_SESSION['success_msg']; }
unset($_SESSION['success_msg'])?></strong></div>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page']:1;
$items_per_page=5;
$itc = Article::all();
$items_total_count = count($itc);
?>
<div class="row">
<div class="col-md-7">
 
 <a href="add_news.php" id="add_news" class="btn btn-primary btn-lg active pull-right" role="button">Add news</a> 
</div>
</div>
<hr />  
<?php
$paginate = new Pagination($page,$items_per_page,$items_total_count);
$limit = $items_per_page;
$offset = $paginate->offset();
$vesti = Article::getAll($limit,$offset);
foreach ($vesti as $vest){
  ?>
<div class="row">
<div class="col-md-4">
  <div class="link">
  <img src="../images/<?php echo $vest->slika ?>" class="img-thumbnail" alt=""><br />
  <a class="btn btn-primary btn-lg active" href="edit_news.php?id=<?php echo $vest->id_vest ?>" role="button">Edit news</a>
  <a class="btn btn-primary btn-lg active pull-right" href="delete_news.php?id=<?php echo $vest->id_vest ?>" role="button">Delete news</a><br />
  
  </div>
 </div>
 <div class="col-md-7">
 <div class="lista_vesti">
 <h2><?php echo $vest->naslov ?></h2>
 <small><i><?php echo $vest->vreme_objave ?></i></small><br /><br />
 <p><?php echo $vest->uvod ?></p>
 </div>
<a class="btn btn-primary btn-lg active" href="del_comm.php?id=<?php echo $vest->id_vest ?>" role="button">Delete all comments for that news</a>
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
  $paginate->render_pagination($page="main.php?page=");
  ?>
  </ul>
</div>
<?php
include_once "inc/footer.php";
?>
</body>
</html>