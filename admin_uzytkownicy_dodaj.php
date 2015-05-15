<?php

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';
require_once 'classes/Grupy.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty();
$uzytkownicy = new Uzytkownicy();
$grupy = new Grupy();

if(isset($_POST['zapisz'])) {
    $wynik = $uzytkownicy->zapisz($_POST);
    if($wynik === true) {
	// ok
	header("Location: admin_uzytkownicy_dodaj.php?msg=1");
    } else {
        // bledy
	$smarty->assign('bledy', $wynik);
    }
    $smarty->assign('uzytkownik', $_POST);
}

$smarty->assign('grupy', $grupy->pobierzListe());
$smarty->assign('srodek', $smarty->fetch('admin_uzytkownicy_dodaj.tpl') );
$smarty->assign('inny_styl','admin_uzytkownicy.css');
$smarty->display('admin.tpl');
?>