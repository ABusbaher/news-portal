<?php
require_once 'core/init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";
?>
<div id="login-form" class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
            <?php
            if(isset($_POST['username'], $_POST['password'])){
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                if(!empty($username) && !empty($password)){
                    $mdPassword = md5($password);
                    $user = User::log_in($username,$mdPassword);
                }else{
                    $greska = "Morate uneti i korisničko ime i lozinku";
                }
            }

            if(isset($greska)) {
                     ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<strong> <?php echo $greska; ?>
                     </strong></div>
                     <?php
            }
            if(isset($_GET['success'])){
                 ?>
                 <div class="alert alert-info">
                      <h4><i class="glyphicon glyphicon-log-in"></i> &nbsp;Uspešna registracija!</h4>
                      <p>Prijavite se ovde sa Vašim korisničkim imenom</p>
                 </div>
                 <?php
            }
            ?>
            <h4>Dobrodošli nazad</h4>
            <form action="" method="post">
            <label for="username">Korisnicko ime:</label>
            <input type="text" name="username" value="<?php if(isset($greska)){echo $username;}?>" class="form-control input-sm chat-input"/>
            </br>
            <label for="password">Lozinka:</label>
            <input type="password" name="password" class="form-control input-sm chat-input"/></br>
            <button type="submit" class="btn btn-primary btn-md" value="prijavi se">Prijavi se</button>
            </form>
            </div>
             <div class="login-a">
                <br /><a href="register.php">Nemate nalog registrujte se ovde</a>
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