<?php
class Connect {
	private static $conn = null;
	private function __construct(){}
	public static function getInstance(){
		if(is_null(self::$conn))
			self::$conn = new PDO("mysql:host=" . Config::get('DB/host') . ";dbname=" . Config::get('DB/db_name'), Config::get('DB/user'), Config::get('DB/password'));
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);self::$conn->query('SET NAMES utf8');
            self::$conn->query('SET CHARACTER SET utf8');

		return self::$conn;
	}
    public static function setCharsetEncoding() {
        if (is_null(self::$conn)) {
            self::conn();
        }
        self::$instance->exec(
            "SET NAMES 'utf8';
            SET character_set_connection=utf8;
            SET character_set_client=utf8;
            SET character_set_results=utf8");
    }
}