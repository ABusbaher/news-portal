<?php
require_once 'core/init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
?>
<div class="main">
<div class="container">
<div class="row row-centered">
  <div class="col-md-12 ">
  <div class="center-block">
  <?php
  if(isset($_GET['id']) AND is_numeric($_GET['id']) AND !empty($_GET['id'])){
      $id = trim($_GET['id']);
      $vest = Article::get($id);
  
  ?>
  <h1><?php echo $vest->naslov; ?></h1>
  <h5><i><?php echo $vest->uvod; ?></i></h5><br/>
  <img class="img-responsive" src="images/<?php echo $vest->slika; ?>"><br/>
  <?php $ispis = $vest->sadrzaj; 
  echo "<p>" . $ispis . "</p><br>";
  ?>
  <div class="desno"> 
  <p><i>2.10.2016 15:02</i></p>
  <?php
  if(isset($_SESSION['user_id'])){ ?>
    <a href="comment.php?id=<?php echo $vest->id_vest; ?>"><img src="images/comment.gif">
    <p>Vidi komentare ovde</p></a>
  <?php }else{
      echo "<h4 style='color:red'>Morate biti ulogovani da biste videli komentare</h4>";
    } ?>
  </div>
  <?php
  }else{
      header('Location: 404.html');
  }
  ?>
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