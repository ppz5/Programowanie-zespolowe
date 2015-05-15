<?php
require_once 'classes/Init.php';
require_once 'classes/Oferty.php';
require('classes/fpdf/fpdf.php');
$pdf = new FPDF('P');
$pdf->Open();
$oferty = new Oferty();
$nieruchomosc = $oferty->pobierz($_GET['id']);
switch ($nieruchomosc['typ_nieruchomosci'])
{
    case 'm':
        $oferty->drukujMieszkanie($pdf,$oferty->pobierzMieszkanie($_GET['id']),$oferty->pobierzZdjecia($_GET['id']));
        break;
    case 'd':
        $oferty->drukujDom($pdf,$oferty->pobierzDom($_GET['id']),$oferty->pobierzZdjecia($_GET['id']));
        break;
    case 'g':
        $oferty->drukujGrunt($pdf,$oferty->pobierzGrunt($_GET['id']),$oferty->pobierzZdjecia($_GET['id']));
        break;
}
$pdf->Output();
exit();
?>