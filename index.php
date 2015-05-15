<?php
require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';
require_once 'classes/Oferty.php';
$init = new Init();
$koszyk = new Koszyk();
$oferty = new Oferty();
$smarty = $init->getSmarty();
$specjalne_d = $oferty->pobierzSpecjalne('d');
if(count($specjalne_d)>0)
    $smarty->assign('specjalne_d1',$specjalne_d[0]);
if(count($specjalne_d)>1)
    $smarty->assign('specjalne_d2',$specjalne_d[1]);
if(count($specjalne_d)>2)
    $smarty->assign('specjalne_d3',$specjalne_d[2]);
$specjalne_m = $oferty->pobierzSpecjalne('m');
if(count($specjalne_m)>0)
    $smarty->assign('specjalne_m1',$specjalne_m[0]);
if(count($specjalne_m)>1)
    $smarty->assign('specjalne_m2',$specjalne_m[1]);
if(count($specjalne_m)>2)
    $smarty->assign('specjalne_m3',$specjalne_m[2]);
$specjalne_g = $oferty->pobierzSpecjalne('g');
if(count($specjalne_g)>0)
    $smarty->assign('specjalne_g1',$specjalne_g[0]);
if(count($specjalne_g)>1)
    $smarty->assign('specjalne_g2',$specjalne_g[1]);
if(count($specjalne_g)>2)
    $smarty->assign('specjalne_g3',$specjalne_g[2]);
$srodek = $smarty->fetch('index.tpl');
$smarty->assign('srodek',$srodek);
$smarty->assign('inny_styl','index.css');
$smarty->assign('tytul','Serwis WWW agencji nieruchomości');
$smarty->assign('liczba_ofert',$koszyk->liczbaOfert());
$smarty->display('layout.tpl');
?>