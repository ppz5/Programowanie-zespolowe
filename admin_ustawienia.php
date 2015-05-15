<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_POST['zapisz'])) {
    if(!empty($_POST['domy']))
        $oferty->specjalneZapiszKolejnosc($_POST['domy']);
    if(!empty($_POST['mieszkania']))
        $oferty->specjalneZapiszKolejnosc($_POST['mieszkania']);
    if(!empty($_POST['grunty']))
        $oferty->specjalneZapiszKolejnosc($_POST['grunty']);

    header("Location: admin_ustawienia.php?msg=1");
    exit();
}

$smarty->assign('specjalne_d', $oferty->pobierzSpecjalne('d'));
$smarty->assign('specjalne_m', $oferty->pobierzSpecjalne('m'));
$smarty->assign('specjalne_g', $oferty->pobierzSpecjalne('g'));

$smarty->assign('srodek', $smarty->fetch('admin_ustawienia.tpl'));
$smarty->assign('inny_styl','admin_ustawienia.css');
$smarty->display('admin.tpl');
?>