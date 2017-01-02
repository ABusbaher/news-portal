<?php

class Comment extends Entity{
	public static $tableName = 'komentari';
	public static $keyColumn = 'comment_id';
	public static $k_Column = 'vest_id';
	public static $c_Column = 'user_id';
    public static $order_Column = 'comment_time';
    public static $prazan_string = 'Nema komentara za ovu vest';
    public static $poruka = 'Comments already empty';
    public static $greska = 'Neuspešno postavljanje komentara';
    public static $msg1 = 'Error in deleting comment!';
    public static $msg2 = 'Comment successfully deleted';
	/*
	public function render(){
		echo "<h3>ID: " . $this->comment_id . "</h3>";
		echo "<h3>User_id: " . $this->user_id . "</h3>";
		echo "<h3>Article_id: " . $this->article_id . "</h3>";
		echo "<h3>Content: " . $this->content . "</h3>";
		echo "<h3>Time: " . $this->time . "</h3>";
	}
	*/
}