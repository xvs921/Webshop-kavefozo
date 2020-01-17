<?php

	$user_delete = new adatbazis();
	$user_delete->user_delete($_GET["input_id"]);

	
class adatbazis{
	public $servername = "localhost:3306";
	public $username = "root";
	public $password = "";
	public $dbname = "sajatbolt";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;
	
	public function __construct(){ self::kapcsolodas(); }
	public function __destruct(){ self::kapcsolatbontas(); }
	
	public function kapcsolodas(){
		// Create connection
		$this->conn = new mysqli($this->servername, 
						   $this->username, 
						   $this->password, 
						   $this->dbname);
		// Check connection
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}	
	}
	public function user_delete($input_id){
		if($input_id=="") {
			return "<p>Sikertelen törlés! Hiányzó azonosító!</p>";
		}	
		$this->sql = "DELETE FROM `kavefozok`
					  WHERE id = $input_id;";
		if($this->conn->query($this->sql)){
			return "<p>Sikeres törlés!</p>";
		} else {
			return "<p>Sikertelen törlés!</p>";
		}
	}
	public function kapcsolatbontas(){
		$this->conn->close();	
	}
}
?>	