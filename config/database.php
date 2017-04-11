<?php 
/**
* 
*/
date_default_timezone_set('Asia/Ho_Chi_Minh');
class Database{
	private $__conn;
	private $__flag = FALSE;
	private $__lastId = 0;
	private $__data = array();
	function __construct(){
		if ($this->__conn == null) {
			$this->__conn = $this->__connection();
		}
		else
		{
			$this->__connection();
		}
	}

	private function __connection(){
		if (!$this->__conn) {
			try {
				$this->__conn =  new PDO("mysql:host=localhost;dbname=shoping;charset=utf8","root","");
				return $this->__conn;
			} catch (Exception $e) {
				print $e->getMessage();
				die();
			}
		}
	}

	private function __disconnection(){
		if ($this->__conn) {
			$this->__conn = null;
		}
	}

	public function add($table,$data){
		$fieldKey = "";
		$fieldVal = "";
		foreach ($data as $key => $val) {
			$fieldKey .= (empty($fieldKey)) ? $key : ",".$key;
			$fieldVal .= (empty($fieldVal)) ? ":{$key}" : ", :{$key}";
		}
		$sql = "INSERT INTO {$table}({$fieldKey}) VALUES ({$fieldVal})";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($data as $k => &$val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				$this->__flag = TRUE;
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__flag;
	}
	public function addBySql($sql){
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				$this->__flag = TRUE;
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__flag;
	}
	public function addInsetId($table,$data){
		$fieldKey = "";
		$fieldVal = "";
		foreach ($data as $key => $val) {
			$fieldKey .= (empty($fieldKey)) ? $key : ",".$key;
			$fieldVal .= (empty($fieldVal)) ? ":{$key}" : ", :{$key}";
		}
		$sql = "INSERT INTO {$table}({$fieldKey}) VALUES ({$fieldVal})";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($data as $k => &$val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				$this->__lastId = $this->__conn->lastInsertId();
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__lastId;
	}

	public function update($table,$data,$where){
		$fieldVal = "";
		$fieldId = "";
		foreach ($data as $key => $val) {
			$fieldVal .= (empty($fieldVal)) ? "{$key} = :{$key}" : ", {$key} = :{$key}";
		}
		foreach ($where as $k => $val) {
			$fieldId = "{$k} = :{$k}";
		}
		$sql = "UPDATE {$table} SET {$fieldVal} WHERE {$fieldId}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($where as $k1 => &$val1) {
				$stmt->bindParam(":{$k1}",$val1,PDO::PARAM_STR);
			}
			foreach ($data as $k2 => &$val2) {
				$stmt->bindParam(":{$k2}",$val2,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				$this->__flag = TRUE;
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__flag;
	}

	public function delete($table,$where){
		$fieldId = "";
		foreach ($where as $k => $val) {
			$fieldId = "{$k} = :{$k}";
		}
		$sql = "DELETE FROM {$table} WHERE {$fieldId}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($where as $k => &$val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_INT);
			}
			if ($stmt->execute()) {
				$this->__flag = TRUE;
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__flag;
	}

	public function getAllData($table){
		$sql = "SELECT * FROM {$table}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}
	public function getAllDataWhere($table,$where){
		$field = "";
		foreach ($where as $k => $val) {
			$field .= empty($field) ? "{$k} = :{$k}" : " AND {$k} = :{$k}";
		}
		$sql = "SELECT * FROM {$table} WHERE {$field}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($where as $k => &$val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}
	public function getAllDataById($table,$id = array(), $where){
		$fieldId = "";
		foreach ($id as $k => $val) {
			$fieldId .= "{$k} = :{$k}";
		}
		$join = "";
		foreach ($where as $k => $val) {
			$join2 = strstr($k,'.');
			$join3 = str_replace($join2, "", $k);
			$join .= " JOIN {$join3} ON {$k} = {$val}";
		}
		$sql = "SELECT * FROM {$table} {$join} WHERE {$fieldId}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($id as $k => &$val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}

	public function getAllDataBySearch($table,$likeWhere = array(), $joinWhere = array(), $where = array()){
		$fieldKey = "";
		foreach ($likeWhere as $k => $val) {
			$fieldKey .= (empty($fieldKey)) ? "{$k} LIKE :{$k}" : " AND {$k} LIKE :{$k}" ;
		}
		$join = "";
		foreach ($joinWhere as $k => $val) {
			$join2 = strstr($k,'.');
			$join3 = str_replace($join2, "", $k);
			$join .= " JOIN {$join3} ON {$k} = {$val}";
		}
		$field = "";
		foreach ($where as $k => $val) {
			$field2 = strstr($k,'.');
			$field3 = str_replace($field2, "", $k);
			$field .= (empty($fieldKey)) ? "{$k} = :{$field3}" : " AND {$k} = :{$field3}";
		}
		// echo $field;die;
		$sql = "SELECT * FROM {$table} {$join} WHERE {$fieldKey} {$field}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($likeWhere as $k => &$val) {
				$key = '%'.$val.'%';
				$stmt->bindParam(":{$k}",$key,PDO::PARAM_STR);
			}
			foreach ($where as $k => &$val) {
				$field2 = strstr($k,'.');
				$field3 = str_replace($field2, "", $k);
				$stmt->bindParam(":{$field3}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}

	public function getAllDataBy($table,$where){
		$join = "";
		foreach ($where as $k => $val) {
			$join2 = strstr($k,'.');
			$join3 = str_replace($join2, "", $k);
			$join .= " JOIN {$join3} ON {$k} = {$val}";
		}
		$sql = "SELECT * FROM {$table} {$join}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}


	public function getDataByUsername($table,$where){
		$fieldUserName = "";
		foreach ($where as $k => $val) {
			$fieldUserName = "{$k} = :{$k}";
		}

		$sql = "SELECT * FROM {$table} WHERE {$fieldUserName}";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			foreach ($where as $k => $val) {
				$stmt->bindParam(":{$k}",$val,PDO::PARAM_STR);
			}
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__flag = TRUE;
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__flag;
	}

	public function getAllDataMilkByPage($table,$where = [], $limit, $start)
	{
		if ($this->__conn == null) {
			$this->__conn = $this->__connection();
		}
		$join = "";
		if (empty($where)) {
			$join = "";
		}
		else
		{
			foreach ($where as $k => $val) {
				$join2 = strstr($k,'.');
				$join3 = str_replace($join2, "", $k);
				$join .= " JOIN {$join3} ON {$k} = {$val}";
			}
		}
		$sql = "SELECT * FROM {$table} {$join} LIMIT :start,:limitdata";
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			$stmt->bindParam("start", $start, PDO::PARAM_INT);
			$stmt->bindParam("limitdata", $limit, PDO::PARAM_INT);
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}

	public function getAllBySql($sql)
	{
		if ($this->__conn == null) {
			$this->__conn = $this->__connection();
		}
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}
	public function getBySql($sql)
	{
		if ($this->__conn == null) {
			$this->__conn = $this->__connection();
		}
		$stmt = $this->__conn->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount() > 0) {
					$this->__data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$this->__disconnection();
		return $this->__data;
	}
}

 ?>