<?php
class Upload_file {
    public static $filename;
    public static $tmp_name;
    public static $type;
    public static $size;
    public $greske = array();
    public static $target_dir = "../images/";
    public static function set_file($file){
        if(!empty($file)){
            self::$filename = basename($file['name']);
            self::$tmp_name = $file['tmp_name'];
            self::$type = $file['type'];
            self::$size = $file['size'];
            return true;
        }else{
            echo "Image not selected";
            return false;
        }
    }
    public static function set_size(){
        if(self::$size < 1000000){
            return true;
        }
    }
    public static function set_extension(){
        $listaExt = array('jpg','jpeg','png','JPG','JPEG','PNG');
            if(self::$type == 'image/jpeg' || 
            self::$type == 'image/jpg' ||
            self::$type == 'image/png'){
                $ext = self::$filename;
                $ext = explode('.',$ext);
                $ext = array_pop($ext);
                return true;
        }
    }
    public static function move(){
        if(move_uploaded_file(self::$tmp_name, self::$target_dir . self::$filename)){
            return true;
        }
    }
}