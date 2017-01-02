<?php
require_once 'core/init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
?>
<div class="main">
<?php
  if(isset($_GET['id']) AND is_numeric($_GET['id']) AND !empty($_GET['id'])){
      $id = trim($_GET['id']);

$page = !empty($_GET['page']) ? (int)$_GET['page']:1;
$items_per_page=5;
$itc = Article::get_by_cat($id);
$items_total_count = count($itc);

$paginate = new Pagination($page,$items_per_page,$items_total_count);
$limit = $items_per_page;
$offset = $paginate->offset();
$vesti = Article::getAll_by_id($id,$limit = 4,$offset);
        foreach ($vesti as $vest){
  ?>
<div class="row">
<div class="col-md-4">      
  <img src="images/<?php echo $vest->slika ?>" class="img-thumbnail" alt=""><a href="single_page.php?id=<?php echo $vest->id_vest; ?>"></a>
 </div>
 <div class="col-md-7">
 <div class="lista_vesti">
 <h2><?php echo $vest->naslov ?></h2>
 <small><i><?php echo $vest->vreme_objave ?></i></small><br /><br />
 <p><?php echo $vest->uvod ?></p>
 <a href="single_page.php?id=<?php echo $vest->id_vest; ?>" class="btn btn-primary btn-lg active pull-right" role="button">Pročitaj više</a>
 </div>
 </div>
</div>
<hr>
<?php
        }
        
      }else{
        header('Location: 404.php');
      }
?>
    <div class="row">
      <ul class="pager">
      <?php
      $paginate->render_pagination($page="page.php?id=" . $_GET['id'] ."&page=");
      ?>
      </ul>
    </div>
</div>
<?php
include_once "inc/footer.php";
?>
</body>
</html>
