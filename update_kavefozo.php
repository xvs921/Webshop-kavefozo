<?php

	$user_daralo_van = new adatbazis();
	$user_daralo_van->$user_daralo_van($_GET["input_id"]);

	
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
	public function user_daralo_van($input_id){
		if($input_id=="") {
			return "<p>Sikertelen törlés! Hiányzó azonosító!</p>";
		}	
		$this->sql = "UPDATE `kavefozok` SET daralo=1
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