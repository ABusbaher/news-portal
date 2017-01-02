<?php
require_once 'init.php';
include_once "inc/head_page.php";
?>
<script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<body>
<?php
include_once "inc/nav.php";
if(isset($_GET['id'])){
      $id = trim($_GET['id']);
      if(!empty($id)){
        $vest = Article::get($id);
    }
}
?>
<div class="main">
<?php
$greske = array();
if(isset($_POST['naslov'],$_POST['uvod'],$_POST['kategorija_id'],$_POST['sadrzaj'])){
    if(!empty($_POST['naslov']) && !empty($_POST['uvod']) && !empty($_POST['sadrzaj'])){
        $naslov = $_POST['naslov'];
        $uvod = $_POST['uvod'];
        $kategorija_id = trim($_POST['kategorija_id']);
        $sadrzaj = $_POST['sadrzaj'];
        Upload_file::set_file($_FILES['slika']);
        if(Upload_file::set_extension()){
            if(Upload_file::set_size()){
                $slika = $_FILES['slika']['name'];
                if(Upload_file::move()){
                    $izm_vest = new Article;
                    $izm_vest->id_vest = $id;
                    $izm_vest->kategorija_id = $kategorija_id;
                    $izm_vest->naslov = $naslov;
                    $izm_vest->uvod = $uvod;
                    $izm_vest->slika = $slika;
                    $izm_vest->sadrzaj = $sadrzaj;
                    echo $izm_vest->update();
                    $_SESSION['success_msg'] = "News successfully updated";
                    echo header('Location: main.php');
                }else{
                    $greske[]="Error in importing image";
                }
            }else{
                $greske[]="Image too big! Image max size 1mb.";
            }
        }else{
            $greske[]="Error!You can upload only images with jpeg,jpg or png extension.";
        }
    }else{
        $greske[]="All fields need to be fill in!";
    }
}
   if(isset($greske)) {
        foreach($greske as $greska) {
        ?>
        <div class="alert alert-danger">
            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $greska; ?>
        </div>
        <?php
        }
    }
?>
<h3>Edit news</h3><br /><br />
<div id="login-form" class="container">
<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="form-login">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="kategorija_id">Category:</label><?php echo strtoupper($vest->kategorija_id); ?>
            <select name="kategorija_id" class="form-control input-sm chat-input" >
                <option value="1">Sport</option>
                <option value="2">Politika</option>
                <option value="3">Zabava</option>
            </select>
            </br></br>
            <label for="naslov">Title:</label>
            <input type="text" name="naslov" value="<?php echo htmlspecialchars($vest->naslov);?>" class="form-control input-sm chat-input"/>
            </br></br>
            <label for="uvod">Introduction:</label>
            <textarea name="uvod" class="form-control input-sm chat-input" rows=8 cols=25><?php echo htmlspecialchars($vest->uvod);?></textarea>
            </br>
            </br>
            <p><strong>Current image:</strong></p>
            <img class="img-responsive" style="max-height: 350px;" src="../images/<?php echo $vest->slika; ?>"><br><br>
            <label for="slika">Change image:</label>
            <input name="slika" type="file"><br />
            </br></br>
            <label for="sadrzaj">Content:</label>
            <textarea name="sadrzaj" class="form-control input-sm chat-input" rows=15 cols=40 ><?php echo htmlspecialchars($vest->sadrzaj);?></textarea>
            </br></br>
            
            <div class="wrapper">
                <button type="submit" class="btn btn-primary btn-md" value="Add new news">Update news</button>
            </div>
        </form>
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