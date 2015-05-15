<?php

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

if(!empty($_GET['id']))
    $id = (int)$_GET['id'];
if(empty($id)) {
    header("Location: admin.php");
    exit();
}

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$uzytkownicy = new Uzytkownicy();
$uzytkownicy->usun($id);
header("Location: admin_uzytkownicy.php");
?>