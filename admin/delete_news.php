<?php
require_once 'init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
if(isset($_GET['id'])){
    $id = (int)$_GET['id'];
    if(!empty($id)){
        $vest = Article::get($id);
        $image_name = $vest->slika;
        $path = "/home/www/novosti.eu.pn/images/";
        $image_path = $path . $image_name;
        Article::remove($id);
        unlink($image_path);
        echo header('Location: main.php');
    }
}
include_once "inc/footer.php";
?>
</body>
</html>