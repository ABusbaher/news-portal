<?php
require_once 'core/init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
Session::check_login();
?>
 <div class="main">
 <div class="container">
 <div class="row">
 <div class="col-md-10">
  <div class="komentar">
  <h1> Komentari </h1><br /><hr>
  <?php
  if(isset($_GET['id'])){
      $id = trim($_GET['id']);
      if(!empty($id)){
        $komentari = Join_tables::load_comments($id);
  ?>
   <div class="media">
   <?php
    foreach ($komentari as $kom){
    ?>
    <a class="pull-left" href="#">
    <img class="media-object" src="http://placehold.it/100x100" alt=""></a> 
   <div class="media-body">
    <h4 class="media-heading"><?php echo $kom->username ?><small><i><?php echo " " . $kom->comment_time; ?></i></small></h4><br />  
    <p><?php echo $kom->comment_text;?></p>
    <br /><hr>
  </div>

  <?php
  }}}
  ?>
  </div>
  <br /><br />
<?php
if(isset($_POST['comment']) AND isset($_GET['id']) AND isset($_SESSION['user_id'])){
    if(!empty($_POST['comment'])){
      $user_id = (int)$_SESSION['user_id'];
      echo $user_id;
      $vest_id = (int)$_GET['id'];
      echo $vest_id;
      $comm = htmlentities($_POST['comment'], ENT_QUOTES);
      $newComm = new Comment;
      $newComm->user_id = $user_id;
      $newComm->vest_id = $vest_id;
      $newComm->comment_text = $comm;
      echo $newComm->insert();
      echo header("Location:" . $_SERVER['HTTP_REFERER']); 
    }else{
      $poruka="<strong>Morate uneti tekst!</strong>";
    }
}

?>
   <div class="well">
   <?php
   if(isset($poruka)) {
    ?>
      <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $poruka; ?>
      </div>
    <?php
    }
    ?>
    <h4>Ostavite komentar:</h4>
    <form role="form" action="" method="post">
    <div class="form-group">
      <textarea name="comment" class="form-control" rows="3"></textarea>
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php
include_once "inc/footer.php";
?>
</body>
</html>