<?php

	$user_select = new adatbazis();
	$user_select->user_select();
	
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
	public function user_select($order_by = " order by id asc"){
		$this->sql = "SELECT 
					`id`, 
					`nev`, 
					`ar`, 
					`gyartas_ideje`, 
					`daralo` 
				FROM 
					`kavefozok` $order_by
				";
		$this->result = $this->conn->query($this->sql);

		if ($this->result->num_rows > 0) {
			echo "<table>";
			echo "<tr>";
					echo "<th>Név</th>";
					echo "<th>Ár</th>";
					echo "<th>Gyártási idő</th>";
					echo "<th>Törlés</th>";
					echo "<th>Daráló</th>";
			echo "</tr>";
			while($this->row = $this->result->fetch_assoc()) {
				echo "<tr>";
					echo "<td>";
						echo $this->row["nev"];
					echo "</td>";
					echo "<td>";
						echo $this->row["ar"];
					echo "</td>";
					echo "<td>";
						echo $this->row["gyartas_ideje"];
					echo "</td>";
					echo "<td>";
						echo "<button onclick=\"torles(".$this->row["id"].")\">Törlés</button>";				
					echo "</td>";
					echo "<td>";
						if($this->row["daralo"]==1){
							echo "<button onclick=\"daraloki(".$this->row["id"].")\">Van</button>";
						}
						else
						{
							echo "<button onclick=\"daralobe(".$this->row["id"].")\">Nincs</button>";
						}
					echo "</td>";			
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}		
	}
	public function kapcsolatbontas(){
		$this->conn->close();	
	}
}
?>	