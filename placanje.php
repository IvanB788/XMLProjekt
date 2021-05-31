<!DOCTYPE html>
<html lang="cr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Potvrda plačanja</title>
</head>
<body>
<form action="" method="post">
	<div class="back">
		<table>
			<th colspan="2">
			<p>Just another 10$ Season Pass</p>
			</th>
			<tr>
				<td>
				<label>Ime s kartice</label>
				</td>
				<td>
				<input id="name" name="ime" type="text">
				<td>
			</tr>
			<tr>
				<td>
				<label>Prezime s kartice</label>
				</td>
				<td>
				<input id="surname" name="prezime" type="text">
				<td>
			</tr>
			<tr>
				<td>
				<label>Broj kartice</label>
				</td>
				<td>
				<input id="number" name="broj" type="text">
				<td>
			</tr>
			<tr>
				<td>
				<label>Datum isteka</label>
				</td>
				<td>
				<input id="date" name="datum" type="text">
				<td>
			</tr>
			<tr>
				<td>
				<label>Kontrolni broj</label>
				</td>
				<td>
				<input id="digit" name="digit" type="text">
				<td>
			</tr>

			<tr>
				<td>
				<input name="submit" type="submit" value=" Izvrši plačanje ">
				</td>
			<td>
		</table>
	</div>	
</form>

</body>
</html>
<?php

$ime="";
$prezime="";
$broj="";
$datum="";
$digit="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$placanje=$_POST;

	if (empty($placanje["ime"]))  {
        echo "Provjerite jeste li unjeli sve podatke.";
    }
	else if (empty($placanje["prezime"]))  {
        echo "Provjerite jeste li unjeli sve podatke.";
    }
	else if (empty($placanje["broj"])) {
		echo "Provjerite jeste li unjeli sve podatke.";
	}
	else if (empty($placanje["datum"])) {
		echo "Provjerite jeste li unjeli sve podatke.";
	}
	else if (empty($placanje["digit"])) {
		echo "Provjerite jeste li unjeli sve podatke.";
	}
	else {
		$ime= $placanje["ime"];
		$prezime= $placanje["prezime"];
		$broj= $placanje["broj"];
		$datum= $placanje["datum"];
		$digit= $placanje["digit"];
	
		provjeraPodataka($ime,$prezime,$broj,$datum,$digit);
	}
}


function provjeraPodataka($ime, $prezime, $broj, $datum, $digit) {
	

	$xml=simplexml_load_file("podaci.xml");
	
	
	foreach ($xml->korisnik as $kor) {
		$korime=$kor->ime;
		$korprezime=$kor->prezime;
		$korbroj=$kor->broj;
		$kordatum=$kor->datum;
		$kordigit=$kor->kontrolni_broj;

		if($korime==$ime) {
			echo "Uplata je uspješno izvršena";
			break;
		}
		else if($korprezime==$prezime) {
			echo "Uplata je uspješno izvršena";
			break;
		}
		else if($korbroj==$broj) {
			echo "Uplata je uspješno izvršena";
			break;
		}
		else if($kordatum==$datum) {
			echo "Uplata je uspješno izvršena";
			break;
		}
		else if($kordigit==$digit) {
			echo "Uplata je uspješno izvršena";
			break;
		}
		else{
			echo "Provjerite jesu li podaci točni";
			break;
		}
			
	}

}
?>
