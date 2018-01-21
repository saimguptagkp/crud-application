<?php 
	class DB
	{
		public $isConn;
		public $db;

		public function __construct($host="localhost",$db="crud_app",$user="root",$ps="mysql",$options=[])
		{
		// public function __construct($host="proyotechcom.ipagemysql.com",
		// 	$db="mm_db",$user="mm_admin,$ps="mm_admin123",$options=[])
		// {
			$this->isConn=true;
				try {
					$this->db=new PDO("mysql:host={$host};dbname={$db};charset=utf8",$user,$ps);
					$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
					  // echo "Connected successfully"; 

				} catch (PDOException $e){
					throw new Exception($e->getMessage());
				}
		}
		
	}
?>