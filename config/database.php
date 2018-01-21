<?php
 require "config.php";
	class Database extends DB{
	
		// disconnect to database;
		public function disconnectDatabase(){
			$this->isConn=false;
			$this->db=null;
		}
		public function getRow($query, $params=[]){
			try {
				$dbquery=$this->db->prepare($query);
				$dbquery->execute();
				return $dbquery->fetch();
			} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			}
		}
		// get data form
		public function getRows($query,$params=[]){
			try {
				$dbquery=$this->db->prepare($query);
				$dbquery->execute($params);
				return $dbquery->fetchAll();
			} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			}
		}

		//insert datam in database;
		public function insertRow($query,$params=[]){
			try {
				$dbquery=$this->db->prepare($query);
				$dbquery->execute($params);
				return true;
			} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			}
		}

		// delete data from database;
		public function deleteRow($query,$params=[]){
			try {
				$stmt=$this->db->prepare($query);
				$stmt->execute($params);
				return true;
			} catch (PDOException $e) {
			throw new Exception($e->getMessage());
			}
		}
		// updata data from database;

		public function updateRow($query,$params=[]){
			$this->insertRow($query,$params);
		}
	}


?>