<?php

require_once 'classes/Init.php';
require_once 'classes/Uzytkownicy.php';

$init = new Init();
$smarty = $init->getSmarty();

if (isset($_POST['zaloguj'])) {
    $uzytkownicy = new Uzytkownicy();
    if ($uzytkownicy->zaloguj($_POST['login'], $_POST['haslo']))
        header("Location: admin.php");
    else
        $smarty->assign('msg', 'Wprowadzono zły login lub hasło.');
}

$smarty->display('logowanie.tpl');
?>