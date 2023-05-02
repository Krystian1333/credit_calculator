<?php require_once dirname(__FILE__).'/../config.php';?>
<!DOCTYPE HTML>
<head>
	<html lang="pl">
		<meta charset="UTF-8" />
		<meta name="description" content="kalkulator kredytowy" />
		<meta name="keywords" content="loan, credit, loan calc, money, kredyt, kalkulator kredytowy, pieniądze" />
		<meta name="author" content="Krystian Górski" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>credit calc</title>
</head>

<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
<label for="id_kwota">Podaj kwote</label>
	<input id="id_kwota" type="text" name="kwota" value="<?php print($kwota); ?>"/>
	</br>
<label for="id_splata">Czas spłaty</label>
	<select name="splata">
		<option value="30d">30 dni</option>
		<option value="60d">60 dni</option>
		<option value="3m">3 miesiące</option>
		<option value="6m">6 miesięcy</option>
		<option value="12m">12 miesięcy</option>
	</select>
	</br>
<input type="submit" value="oblicz" />
</form>

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #2DDAB1; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #2DDAB1; width:300px;">
<?php echo 'oprocentowanie wynosi '.$oprocentowanie.' %';?> </br>
<?php echo 'miesięczne odsetki wynoszą '.$odsetki;?> </br>
<?php echo 'miesięczna rata wynosi '.$result;?> </br>
<?php echo 'całkowity koszty pożyczki wynosi '.$koszt;?> </br>
<?php echo 'całkowita kwota do oddania '.$calkowita;?> </br>
</div>
<?php } ?>

</body>

</html>