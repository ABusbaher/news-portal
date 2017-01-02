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
}