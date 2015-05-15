<?php

require_once 'classes/Init.php';
require_once 'classes/Oferty.php';
require_once 'classes/Koszyk.php';
require('classes/fpdf/fpdf.php');
$pdf = new FPDF('P');
$pdf->Open();
$koszyk = new Koszyk();
$o = $koszyk->pobierz();
$oferty = new Oferty();
if ($o) {
    foreach ($o as $n) {
        $id = $n['id_nieruchomosci'];
        $nieruchomosc = $oferty->pobierz($id);
        switch ($nieruchomosc['typ_nieruchomosci']) {
            case 'm':
                $oferty->drukujMieszkanie($pdf, $oferty->pobierzMieszkanie($id), $oferty->pobierzZdjecia($id));
                break;
            case 'd':
                $oferty->drukujDom($pdf, $oferty->pobierzDom($id), $oferty->pobierzZdjecia($id));
                break;
            case 'g':
                $oferty->drukujGrunt($pdf, $oferty->pobierzGrunt($id), $oferty->pobierzZdjecia($id));
                break;
        }
    }
}
$pdf->Output();
exit();
?>