<?php
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
?>
<div class="main">
<?php if(isset($_SESSION['success_msg'])){?>
<div class="alert alert-info"><strong><?php echo $_SESSION['success_msg']; }
unset($_SESSION['success_msg'])?></strong></div>
<?php
$page = !empty($_GET['page']) ? (int)$_GET['page']:1;
$items_per_page=8;
$itc = Comment::all();
$items_total_count = count($itc);
$paginate = new Pagination($page,$items_per_page,$items_total_count);
$limit = $items_per_page;
$offset = $paginate->offset();
$komentari = Join_tables::all_comments($limit,$offset);
foreach ($komentari as $kom){
     ?>
<div class="row">
<div class="col-md-4">
  <div class="link">
  <img src="../images/<?php echo $kom->slika ?>" class="img-thumbnail" alt="">
</div>
</div>
<div class="col-md-7">
 <div class="lista_vesti">
 Comment text: <h3><?php echo $kom->comment_text ?></h3>
 <p>Comment from news: <strong><?php echo $kom->naslov ?></strong></p>
 <p>Comment from user: <strong><?php echo strtoupper($kom->username) ?></strong></p><br /><br />
<a class="btn btn-primary btn-lg active pull-right" href="del_one_comm.php?id=<?php echo $kom->comment_id ?>" role="button">Delete comment</a>
 </div>
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
  $paginate->render_pagination($page="admin_comments.php?page=");
  ?>
  </ul>
</div>
<?php
include_once "inc/footer.php";
?>
</body>
</html>