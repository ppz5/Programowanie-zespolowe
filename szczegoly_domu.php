<?php
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';
require_once 'classes/Koszyk.php';
require_once 'classes/Raporty.php';
$init = new Init();
$koszyk = new Koszyk();
$smarty = $init->getSmarty();
$oferty = new Oferty();
$id = (int)$_GET['id'];
$raporty = new Raporty();
$raporty->logujOferte($id, 'oferta');
$smarty->assign('oferta', $oferty->pobierzDom($id));
$zdjecia = $oferty->pobierzZdjecia($id);
if (!empty($zdjecia[0]))
    $smarty->assign('zdjecie1',$zdjecia[0]);
if (!empty($zdjecia[1]))
    $smarty->assign('zdjecie2',$zdjecia[1]);
if (!empty($zdjecia[2]))
    $smarty->assign('zdjecie3',$zdjecia[2]);
if (isset($_GET['k']))
    $smarty->assign('koszyk',1);
$srodek = $smarty->fetch('szczegoly_domu.tpl');
$smarty->assign('srodek',$srodek);
$smarty->assign('inny_styl','szczegoly.css');
$smarty->assign('tytul','Szczegóły domu');
$smarty->assign('liczba_ofert',$koszyk->liczbaOfert());
$smarty->display('layout.tpl');
?>