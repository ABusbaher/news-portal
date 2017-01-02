<?php

class Article extends Entity{
	public static $tableName = 'vest';
	public static $keyColumn = 'id_vest';
    public static $k_Column = 'kategorija_id';
    public static $order_Column = 'vreme_objave';
    public static $prazan_string = 'Nema vesti u ovoj kategoriji';
    public static $msg1 ="News not deleted! Did you first delete all comments for that news?";
    public static $msg2 ="The news successfully deleted";
    public static $greska = "<h4 class='error'>Unexpected error!</h4>";
	/*
	public function render(){
		echo '<div class="block">';
            echo '<h1>' . $this->title . '</h1>';
            echo '<img src="slike/' . $this->thumbnail . '" alt="" class="desno">';
            echo '<p class="intro-text">' . $this->content . '<a href="#">Read&nbsp;more...</a>  </p>';
        echo '</div>';
	}*/
}