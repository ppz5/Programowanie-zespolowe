<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$oferty = new Oferty();

if(isset($_POST['zapytanie'])) {
    if($oferty->wyslijZapytanie($_POST))
        echo 'ok';
    else
        echo 'blad';
}

if(isset($_POST['oferta'])) {
    if($oferty->wyslijOferte($_POST))
        echo 'ok';
    else
        echo 'blad';
}
?>