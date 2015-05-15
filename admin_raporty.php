<?php

require_once 'classes/Init.php';
require_once 'classes/Raporty.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$raporty = new Raporty();

$smarty->assign('log_oferty', $raporty->pobierzWejscia('oferta'));
$smarty->assign('log_koszyk', $raporty->pobierzWejscia('koszyk'));
$smarty->assign('zapytania', $raporty->pobierzZapytania());
$smarty->assign('log_oferty_dt', $raporty->pobierzWejsciaDT());
$smarty->assign('log_oferty_g', $raporty->pobierzWejsciaG());
$smarty->assign('srodek', $smarty->fetch('admin_raporty.tpl'));
$smarty->assign('inny_styl','admin_raporty.css');
$smarty->display('admin.tpl');
?>