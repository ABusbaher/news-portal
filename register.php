<?php
require_once 'core/init.php';
include_once "inc/head_page.php";
?>
<body>
<?php
include_once "inc/nav.php";

if(isset($_POST['username'],$_POST['password'],$_POST['passwordA'],$_POST['first_name'],$_POST['last_name'],$_POST['email'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $passwordA = trim($_POST['passwordA']);
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        if(!empty($username) && !empty($password) && !empty($passwordA) && !empty($first_name) && !empty($last_name) && !empty($email)){
            if($password !== $passwordA) {
                $error[] = "<strong>Lozinke se ne poklapaju</strong>";
            }else if(Username::already_exist($username)){
                $error[] = "<strong>Korisničko ime već postoji,izaberite drugo</strong>";
            }else if(Email::already_exist($email)){
                $error[] = "<strong>Email već postoji u bazi,izaberite drugi</strong>";
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 $error[] = "<strong>E-mail adresa nije validna</strong>";
            }else{
            $mdPassword = md5($password);
            $newUser = new User;
            $newUser->username = $username;
            $newUser->password = $mdPassword;
            $newUser->f_name = $first_name;
            $newUser->l_name = $last_name;
            $newUser->email = $email;
            echo $newUser->insert();
            echo header("Location:login.php?success");
            }
        }else{
             $error[] = "<strong>Sva polja moraju biti popunjena</strong>";
        }
     }
?>
<div id="login-form" class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="form-login">
            <h4>Registracija</h4>
            <?php
            if(isset($error)) {
                foreach($error as $error) {
                     ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
                }
            }
            ?>
            <form action="" method="post">
            <label for="username">Korisnicko ime:</label>
            <input type="text" name="username" value="<?php if(isset($error)){echo $username;}?>" class="form-control input-sm chat-input"/>
            </br>
            <label for="password">Lozinka:</label>
            <input type="password" name="password" class="form-control input-sm chat-input"/>
            </br>
            <label for="passwordA">Ponovi lozinku:</label>
            <input type="password" name="passwordA" class="form-control input-sm chat-input" />
            </br>
            <label for="first_name">Ime:</label>
            <input type="text" name="first_name" value="<?php if(isset($error)){echo $first_name;}?>" class="form-control input-sm chat-input" />
            </br>
            <label for="last_name">Prezime:</label>
            <input type="text" name="last_name" value="<?php if(isset($error)){echo $last_name;}?>" class="form-control input-sm chat-input" />
            </br>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php if(isset($error)){echo $email;}?>" class="form-control input-sm chat-input" />
            </br>
            <div class="wrapper">
            <button type="submit" class="btn btn-primary btn-md" value="Registrujte se">Registrujte se</button>
            </div>
            </form>
             <div class="login-a">
                <br /><a href="login.php">Vec imate nalog prijavite se ovde</a>
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