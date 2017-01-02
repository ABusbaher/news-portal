<?php
class Session{
    private $signed_in = false;
    private static $_sessionStarted = false;
    public $user = array();
    public $user_id;
    public $username;
    public $message;
    public static function start(){
        if(self::$_sessionStarted == false){
            session_start();
            self::$_sessionStarted == true;
        }
    }
    public static function login($user){
        if($user){
            $user_id = $_SESSION['user_id'] = $user['user_id'];
            $username = $_SESSION['username'] = $user['username'];
            $status = $_SESSION['status'] = $user['status'];
            $signed_in = true;
        }
    }
    
    public static function logout(){
        session_start();
        session_destroy();
        echo header('Location:login.php');
    }
    public static function check_login(){
        if(!isset($_SESSION['user_id'])){
            echo header("Location:index.php");
        }
    }
    public static function is_admin(){
        if(isset($_SESSION['status']) AND $_SESSION['status'] == 2){
           header("Location:admin/main.php");
        }
    }
    public static function not_admin(){
        if(!isset($_SESSION['status']) OR $_SESSION['status'] != 2){
            header("Location:../index.php");
        }
    }
    public static function check_the_login_nav($str){
      if(isset($_SESSION['username'])){
        echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi ' .strtoupper($_SESSION['username']) . '</a></li>';
        echo '<li><a href=' . $str . '><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
      }else{
        echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
        echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }
    }
}
