<?php
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';
require_once 'classes/Koszyk.php';
$init = new Init();
$koszyk = new Koszyk();
$smarty = $init->getSmarty();
$oferty = new Oferty();
$szukaj = array();
if(!empty($_POST)) {
    $szukaj = $_POST;
    $_SESSION['szukaj'] = $szukaj;
}
 else {
     $szukaj = $_SESSION['szukaj'];
}
$smarty->assign('oferty', $oferty->pobierzListeMieszkan($szukaj));
$srodek = $smarty->fetch('wyniki_mieszkania.tpl');
$smarty->assign('srodek',$srodek);
$smarty->assign('inny_styl','wyniki.css');
$smarty->assign('tytul','Lista wyników - mieszkania');
$smarty->assign('liczba_ofert',$koszyk->liczbaOfert());
$smarty->display('layout.tpl');
?>