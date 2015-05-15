<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$oferty = new Oferty();

if(isset($_POST['dodaj'])) {
    $oferty->dodajSpecjalne($_POST['id_oferty']);
    header("Location: admin_ustawienia_dodaj.php?typ=".$_GET['typ']."&msg=1");
}

$smarty->assign('ids',$oferty->pobierzIds($_GET['typ']));
switch ($_GET['typ'])
{
    case 'd':
        $smarty->assign('nieruchomosc','domu');
        break;
    case 'm':
        $smarty->assign('nieruchomosc','mieszkania');
        break;
    case 'g':
        $smarty->assign('nieruchomosc','gruntu');
        break;
}
$smarty->assign('srodek', $smarty->fetch('admin_ustawienia_dodaj.tpl'));
$smarty->assign('inny_styl','admin_ustawienia.css');
$smarty->display('admin.tpl');
?>