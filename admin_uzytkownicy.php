<?php

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();

$smarty->assign('uzytkownicy', $uzytkownicy->pobierzListe());
$smarty->assign('srodek', $smarty->fetch('admin_uzytkownicy.tpl'));
$smarty->assign('inny_styl','admin_uzytkownicy.css');
$smarty->display('admin.tpl');
?>