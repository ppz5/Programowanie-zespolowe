<?php
require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';
$init = new Init();
$koszyk = new Koszyk();
$smarty = $init->getSmarty();
$smarty->assign('oferty', $koszyk->pobierzListe());
$srodek = $smarty->fetch('koszyk.tpl');
$smarty->assign('srodek',$srodek);
$smarty->assign('inny_styl','koszyk.css');
$smarty->assign('tytul','Koszyk ofert');
$smarty->assign('liczba_ofert',$koszyk->liczbaOfert());
$smarty->display('layout.tpl');
?>