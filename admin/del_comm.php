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
        Comment::delete($id);
        header('Location: main.php');
    }
}
include_once "inc/footer.php";
?>
</body>
</html>
