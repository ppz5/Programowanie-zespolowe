
<?php
require_once 'classes/Init.php';
require_once 'classes/Koszyk.php';
$init = new Init();
$koszyk = new Koszyk();
$smarty = $init->getSmarty();
$srodek = $smarty->fetch('upload.tpl');
$smarty->assign('srodek',$srodek);
$smarty->assign('inny_styl','wyszukaj.css');
//$smarty->assign('tytul','Wyszukaj mieszkanie');
//$smarty->assign('liczba_ofert',$koszyk->liczbaOfert());
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (file_exists('oferta1.xml')) {
    $xml = simplexml_load_file('oferta1.xml');
 
    print_r($xml);
} else {
    exit('Failed to open oferta.xml.');
}
$smarty->display('layout.tpl');
?>