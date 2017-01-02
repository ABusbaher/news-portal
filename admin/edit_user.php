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
        $user1 = new User;
        $user1->user_id = $id;
        $user1->status = "2";
        echo $user1->update();
        echo header("Location:users.php?uspeh");
    }
}
include_once "inc/footer.php";
?>
</body>
</html>