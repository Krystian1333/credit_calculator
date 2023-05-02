<?php

require_once dirname(__FILE__).'/../config.php';

$kwota = $_REQUEST ['kwota'];
$wybor = $_REQUEST ['splata'];
$oprocentowanie;
$odsetki;
$koszt;
$calkowita=$kwota;

if ( ! (isset($kwota))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}
if ($kwota == ""){
	$messages [] = 'Nie podano kwoty';
}
if (empty( $messages )) {
	if (! is_numeric( $kwota )) {
		$messages [] = 'Prosze podać kwote całkowitą';
	}
}
if (empty ( $messages )) { 
	
	$kwota = intval($kwota);
	
	switch ($wybor) {
		case '30d':
			$oprocentowanie = 0;
			$odsetki = 0;
			$koszt = 0;
			$result = $kwota/1;
			$calkowita = $kwota + $koszt;			
			break;
		case '60d' :
			$oprocentowanie = 0;
			$odsetki = 0;
			$koszt = 0;			
			$result = $kwota/2;
			$calkowita = $kwota + $koszt;			
			break;
		case '3m' :
			$oprocentowanie = 0.05*100;
			$odsetki = ($oprocentowanie/100*$kwota)/3;
			$koszt = $odsetki*3;			
			$result = $kwota/3 + $odsetki;
			$calkowita = $kwota + $koszt;
			break;
		case '6m':
			$oprocentowanie = 0.10*100;
			$odsetki = ($oprocentowanie/100*$kwota)/6;
			$koszt = $odsetki*6;			
			$result = $kwota/6 + $odsetki;
			$calkowita = $kwota + $koszt;			
			break;
		case '12m':
			$oprocentowanie = 0.20*100;
			$odsetki = ($oprocentowanie/100*$kwota)/12;
			$koszt = $odsetki*12;			
			$result = $kwota/12 + $odsetki;
			$calkowita = $kwota + $koszt;			
			break;					
		default :
			$oprocentowanie = 0;
			$odsetki = 0;	
			$koszt = 0;			
			$result = $kwota;
			$calkowita = $kwota + $koszt;			
			;
			break;
	}
}
	
	
include 'view.php';
?>