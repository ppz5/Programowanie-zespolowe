<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$oferty = new Oferty();

if(isset($_POST['id_specjalne'])) {
    if($oferty->usunSpecjalne($_POST['id_specjalne']))
        echo 'ok';
    else
        echo 'blad';
}
?>