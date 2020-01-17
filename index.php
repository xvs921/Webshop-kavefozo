<!DOCTYPE html>
<html>
<body onload="kavefozok()">


		Add meg a termék nevét: <br />
		<input type="text" id="input_nev"><br />
		Add meg az árát: <br />
		<input type="number" id="input_ar"><br />
		Add meg a gyártási időt: <br />
		<input type="date" id="input_gyartas_ideje"><br />		
		Add meg a daráló funkciót: <br />	
		<select id="input_daralo">
			<option value='1'>Van</option>
			<option value='0' selected>Nincs</option>
		</select><br />	
		<input type="hidden" id="action" value="cmd_insert_kavefozo">
		<button onclick="adatfelvetel()">Felvétel</button>

	
<div id="muvelet"></div>
<div id="tartalom"></div>
<h2>Felhasználók</h2>
<button type="button" onclick="kavefozok()">Frissítés</button>


<script>
function adatfelvetel(){
	input_nev = document.getElementById("input_nev").value;
	input_ar = document.getElementById("input_ar").value;
	input_gyartas_ideje = document.getElementById("input_gyartas_ideje").value;
	input_daralo = document.getElementById("input_daralo").value;
	felvetel_url="";
	felvetel_url+="?input_nev="+input_nev;
	felvetel_url+="&input_ar="+input_ar;
	felvetel_url+="&input_gyartas_ideje="+input_gyartas_ideje;
	felvetel_url+="&input_daralo="+input_daralo;
	console.log(felvetel_url);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("muvelet").innerHTML =
      this.responseText;
	  kavefozok();
    }
  };
  xhttp.open("GET", "insert_kavefozo.php"+felvetel_url, true);
  xhttp.send();	
}
function kavefozok() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tartalom").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "select_kavefozo.php", true);
  xhttp.send();
}
function torles(id)
{
	torol_url="";
	torol_url+="?input_id="+id;
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("muvelet").innerHTML =
      this.responseText;
		kavefozok();
    }
  	};
  	xhttp.open("GET", "delete_user.php"+torol_url, true);
  	xhttp.send();
}
function daralobe(id)
{
	torol_url="";
	torol_url+="?input_id="+id;
  	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("muvelet").innerHTML =
      this.responseText;
		kavefozok();
    }
  	};
  	xhttp.open("GET", "update_kavefozo.php"+torol_url, true);
  	xhttp.send();
}
</script>

</body>
</html>