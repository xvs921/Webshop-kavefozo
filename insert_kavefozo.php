<?php

$user_insert = new adatbazis();
echo $user_insert->user_insert($_GET["input_nev"],
						  $_GET["input_ar"],
						  $_GET["input_gyartas_ideje"],
						  $_GET["input_daralo"]
						  );

	
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
	public function user_insert($input_nev,
								$input_ar,
								$input_gyartas_ideje,
								$input_daralo){
		if($input_nev=="") {
			return "<p>Sikertelen adatfelvétel! Hiányzó név!</p>";
		}	
		if($input_ar=="") {
			return "<p>Sikertelen adatfelvétel! Hiányzó ár!</p>";
		}	
		$this->sql = "INSERT INTO
						`kavefozok`
						(
							`nev`, 
							`ar`, 
							`gyartas_ideje`, 
							`daralo` 
						)
						VALUES
						(
							'$input_nev',
							'$input_ar',
							'$input_gyartas_ideje',
							'$input_daralo'
						)
						";
		if($this->conn->query($this->sql)){
			return "<p>Sikeres adatfelvétel!</p>";
		} else {
			return "<p>Sikertelen adatfelvétel!</p>";
		}
	}
	public function kapcsolatbontas(){
		$this->conn->close();	
	}
}
?>	