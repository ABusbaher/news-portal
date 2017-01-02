<?php

class User extends Entity {
	public static $tableName = 'korisnici';
	public static $keyColumn = 'user_id';
    public static $order_Column = 'user_id';
    public static $col1 = 'username';
    public static $col2 = 'password';
    public static $msg1 = 'Unsuccessful deleting. Did you delete all users comments first?';
    public static $msg2 = 'The user successfully deleted';
    public static $msg3 = 'Nepoznat korisnik';
    public static $msg4 = 'Greška u prijavi';
    public static $poruka = 'Failure to delete!';
    public static $greska = "<h4 class='error'>Greška prilikom registracije</h4>";
	
	public function render(){
		echo "<h2>Name: " . $this->name . "</h2>";
		echo "<h2>Password: " . $this->password . "</h2>";
		echo "<h2>Status: " . $this->status . "</h2>";
	}
}