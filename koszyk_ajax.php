<?php

require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';
require_once 'classes/Raporty.php';

$koszyk = new Koszyk();

if(isset($_POST['dodaj'])) {
    $raporty = new Raporty();
    $raporty->logujOferte($_POST['id_nieruchomosci'], 'koszyk');
    if($koszyk->dodaj($_POST['id_nieruchomosci'], session_id()))
        echo 'ok';
    else
        echo 'blad';
}

if(isset($_POST['usun'])) {
    if($koszyk->usun($_POST['id_koszyka']))
        echo 'ok';
    else
        echo 'blad';
}
?>