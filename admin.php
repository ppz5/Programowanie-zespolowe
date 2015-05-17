<?php

require_once 'classes/Init.php';

$init = new Init();
$init->sprawdzLogowanie(); // sprawdź, czy użytkownik jest zalogowany

$smarty = $init->getSmarty(); // pobierz obiekt Smarty
$smarty->display('admin.tpl'); // wyświetl template "admin.tpl"
?>
