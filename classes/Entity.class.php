<?php
abstract class Entity {
	public static function get($id){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$className = get_called_class();
		$res = $db->query("SELECT * FROM {$tableName} WHERE {$keyColumn} =" . $id);
		$res = $res->fetchObject($className);
		return $res;
	}
	public static function get_by_cat($id){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$k_Column = static::$k_Column;
		$className = get_called_class();
		$res = $db->query("SELECT * FROM {$tableName} WHERE {$k_Column} =" . $id);
		$arr = array();
		while($r = $res->fetchObject($className)){
			$arr[] = $r;
		}
		return $arr;
	}
	public static function all(){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$className = get_called_class();
		$res = $db->query("SELECT * FROM {$tableName}");
		$arr = array();
		while($r = $res->fetchObject($className)){
			$arr[] = $r;
		}
		return $arr;
	}
	public static function count_all(){
		$db = Connect::getInstance();
		$keyColumn = static::$keyColumn;
		$tableName = static::$tableName;
		$className = get_called_class();
		$res = $db->query("SELECT COUNT({$keyColumn}) FROM {$tableName}");
		$res = $res->fetchObject($className);
		return $res;
	}
	public static function already_exist($param){
		$db = Connect::getInstance();
		$param_column = static::$param_column;
		$className = get_called_class();
		$query = $db->prepare("SELECT user_id FROM korisnici WHERE {$param_column}=?");
    	$query->bindValue(1, $param);
    	$query->execute();
    	
    	if($query->rowCount() > 0){
       		return true;
    	}else{
        	return false;
    	}
	}
	public static function get_order($id,$limit = 5){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$k_Column = static::$k_Column;
		$order_Column = static::$order_Column;
		$prazan_string = static::$prazan_string;
		$className = get_called_class();
		$res = $db->query("SELECT * FROM {$tableName} WHERE {$k_Column} =" . $id . " ORDER BY {$order_Column} DESC LIMIT " . $limit);
		if($res->rowCount() == 0){
			echo '<h3>' . $prazan_string . '</h3>';
			$arr = array();
			return $arr;
		}else{			
			$arr = array();
			while($r = $res->fetchObject($className)){
			$arr[] = $r;
			}
			return $arr;
		}
	}
	public static function get_all(){
		$tableName = static::$tableName;
		$className = get_called_class();
		$db = Connect::getInstance();
		$res = $db->query("SELECT * FROM {$tableName}");
		$arr = array();
		while($r = $res->fetchObject($className)){
			$arr[] = $r;
		}
		return $arr;
	}
	public static function getAll($limit = 5,$offset){
		$tableName = static::$tableName;
		$order_Column = static::$order_Column;
		$className = get_called_class();
		$db = Connect::getInstance();
		$res = $db->query("SELECT * FROM {$tableName} ORDER BY {$order_Column} DESC LIMIT " . $limit . " OFFSET " . $offset);
		$arr = array();
		while($r = $res->fetchObject($className)){
			$arr[] = $r;
		}
		return $arr;
	}
	public static function getAll_by_id($id,$limit = 5,$offset){
		$tableName = static::$tableName;
		$order_Column = static::$order_Column;
		$k_Column = static::$k_Column;
		$className = get_called_class();
		$db = Connect::getInstance();
		$res = $db->query("SELECT * FROM {$tableName} WHERE {$k_Column} =" . $id . " ORDER BY {$order_Column} DESC LIMIT " . $limit . " OFFSET " . $offset);
		$arr = array();
		while($r = $res->fetchObject($className)){
			$arr[] = $r;
		}
		return $arr;
	}
	public static function remove($id){
		$db = Connect::getInstance();
		$className = get_called_class();
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$msg1 = static::$msg1;
		$msg2 = static::$msg2;
		$res = $db->prepare("DELETE FROM {$tableName} WHERE {$keyColumn}=?");
		$res->bindValue(1, $id);
		$res->execute();
		if($res->rowCount() != 1){
			$_SESSION['msg']=$msg1;
		}else{
			$_SESSION['success_msg']=$msg2;
		}
	}
	public static function delete($id){
		$db = Connect::getInstance();
		$className = get_called_class();
		$tableName = static::$tableName;
		$k_Column = static::$k_Column;
		$res = $db->prepare("DELETE FROM {$tableName} WHERE {$k_Column}=?");
		$res->bindValue(1, $id);
		$res->execute();
		if($res->rowCount() == 0){
			$_SESSION['msg']="Comments already deleted";
		}else{
			$d = $res->fetch(PDO::FETCH_ASSOC);
			$_SESSION['success_msg']="Comments successfully deleted";
		}
	}
	public static function delete_by_user($id){
		$db = Connect::getInstance();
		$className = get_called_class();
		$tableName = static::$tableName;
		$c_Column = static::$c_Column;
		$res = $db->prepare("DELETE FROM {$tableName} WHERE {$c_Column}=?");
		$res->bindValue(1, $id);
		$res->execute();
		if($res->rowCount() == 0){
			$_SESSION['msg']="Comments already deleted";
		}else{
			$_SESSION['success_msg']="Comments successfully deleted";
		}
	}
	public static function log_in($param1,$param2){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$col1 = static::$col1;
		$col2 = static::$col2;
		$msg3 = static::$msg3;
		$msg4 = static::$msg4;
		$stmtUserCheck = $db->prepare("SELECT * FROM {$tableName} WHERE {$col1}=? AND {$col2} = ?");
		$stmtUserCheck->bindValue(1, $param1);
		$stmtUserCheck->bindValue(2, $param2);
		$stmtUserCheck->execute();
		if($stmtUserCheck->rowCount() > 1){
			echo $msg4;
		}else if($stmtUserCheck->rowCount() == 0){
			echo ' <div class="alert alert-danger">
                 <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<strong>' . $msg3 . 
                  '</strong></div>';
		}else{
		$user = $stmtUserCheck->fetch(PDO::FETCH_ASSOC);
        $log = Session::login($user);
        echo header("Location:index.php");
		}
	}

	public function insert(){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$greska = static::$greska;
		$q = "INSERT INTO {$tableName} (";
		$columns = array();
		$values = array();
		foreach($this as $key=>$value){
			$columns[] = $key;
			$values[] = $value;
		}
		foreach($columns as $c){
			$q .= "`" . $c . "`, ";
		}
		$q = trim($q, ', ');
		$q .= ") VALUES (";
		foreach($values as $v){
			$q .= "?, ";
		}
		$q = trim($q, ', ');
		$q .= ')';
		$stmt = $db->prepare($q);
		$n = 1;
		foreach($values as $value){
			$stmt->bindValue($n, $value);
			$n++;
		}
		$stmt->execute();
		if($stmt->rowCount() != 1){
			echo $greska;
		}
	}
	
	public function update(){
		$db = Connect::getInstance();
		$tableName = static::$tableName;
		$keyColumn = static::$keyColumn;
		$q = "UPDATE {$tableName} SET ";
		$values = array();
		foreach($this as $key=>$value){
			if($key == $keyColumn) continue;
			$values[] = $value;
			$q .= "{$key} = ?, ";
		}
		$q = trim($q, ', ');
		$q .= " WHERE {$keyColumn} = ?";
		$stmt = $db->prepare($q);
		$n = 1;
		foreach($values as $value){
			$stmt->bindValue($n, $value);
			$n++;
		}
		$stmt->bindValue($n, $this->$keyColumn);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			return 'Uspesno editovanje u bazi.';
		}else{
			return 'Neuspesno editovanje u bazi.';
		}
	}
}