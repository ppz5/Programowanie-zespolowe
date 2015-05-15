<?php
function _t($tekst)
{
    return iconv('UTF-8', 'windows-1250', $tekst);
}

class Oferty
{
	private $_conn;
	
	public function __construct()
	{
		$this->_conn = new Conn();
	}
	
	public function pobierzListeDomow($szukaj = array())
	{
		$sql = "
			SELECT n.id,m.miasto,d.pow_domu,d.pow_dzialki,n.cena,z.adres
			FROM nieruchomosci n
                        JOIN domy d ON n.id=d.id_nieruchomosci
                        JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                        JOIN powiaty p ON n.id_powiatu=p.id
                        JOIN miasta m ON n.id_miasta=m.id
                        ".(empty($szukaj['zdjecie'])?"LEFT ":"")."JOIN zdjecia z ON n.id=z.id_nieruchomosci
			WHERE (z.kolejnosc IS NULL OR z.kolejnosc=1)
		";
		
		if(!empty($szukaj['wojewodztwo']))
			$sql .= "AND w.wojewodztwo LIKE '%" . $this->_conn->escape($szukaj['wojewodztwo']) . "%' ";
		if(!empty($szukaj['powiat']))
			$sql .= "AND p.powiat LIKE '%" . $this->_conn->escape($szukaj['powiat']) . "%' ";
		if(!empty($szukaj['miasto']))
			$sql .= "AND m.miasto LIKE '%" . $this->_conn->escape($szukaj['miasto']) . "%' ";
                if(!empty($szukaj['pow_domu_od']))
                        $sql .= "AND d.pow_domu >= " . $this->_conn->escape($szukaj['pow_domu_od']) . " ";
                if(!empty($szukaj['pow_domu_do']))
                        $sql .= "AND d.pow_domu <= " . $this->_conn->escape($szukaj['pow_domu_do']) . " ";
                if(!empty($szukaj['pow_dzialki_od']))
                        $sql .= "AND d.pow_dzialki >= " . $this->_conn->escape($szukaj['pow_dzialki_od']) . " ";
                if(!empty($szukaj['pow_dzialki_do']))
                        $sql .= "AND d.pow_dzialki <= " . $this->_conn->escape($szukaj['pow_dzialki_do']) . " ";
                if(!empty($szukaj['rok_budowy_od']))
                        $sql .= "AND d.rok >= " . $this->_conn->escape($szukaj['rok_budowy_od']) . " ";
                if(!empty($szukaj['rok_budowy_do']))
                        $sql .= "AND d.rok <= " . $this->_conn->escape($szukaj['rok_budowy_do']) . " ";
                if(!empty($szukaj['cena_od']))
                        $sql .= "AND n.cena >= " . $this->_conn->escape($szukaj['cena_od']) . " ";
                if(!empty($szukaj['cena_do']))
                        $sql .= "AND n.cena <= " . $this->_conn->escape($szukaj['cena_do']) . " ";

		return $this->_conn->fetchAll($sql);
	}
        
        public function pobierzListeMieszkan($szukaj = array())
	{
		$sql = "
			SELECT n.id,m.miasto,mi.pokoje,mi.pow_mieszkania,n.cena,z.adres
			FROM nieruchomosci n
                        JOIN mieszkania mi ON n.id=mi.id_nieruchomosci
                        JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                        JOIN powiaty p ON n.id_powiatu=p.id
                        JOIN miasta m ON n.id_miasta=m.id
                        ".(empty($szukaj['zdjecie'])?"LEFT ":"")."JOIN zdjecia z ON n.id=z.id_nieruchomosci
			WHERE (z.kolejnosc IS NULL OR z.kolejnosc=1)
		";
		
		if(!empty($szukaj['wojewodztwo']))
			$sql .= "AND w.wojewodztwo LIKE '%" . $this->_conn->escape($szukaj['wojewodztwo']) . "%' ";
		if(!empty($szukaj['powiat']))
			$sql .= "AND p.powiat LIKE '%" . $this->_conn->escape($szukaj['powiat']) . "%' ";
		if(!empty($szukaj['miasto']))
			$sql .= "AND m.miasto LIKE '%" . $this->_conn->escape($szukaj['miasto']) . "%' ";
                if(!empty($szukaj['liczba_pokoi_od']))
                        $sql .= "AND mi.pokoje >= " . $this->_conn->escape($szukaj['liczba_pokoi_od']) . " ";
                if(!empty($szukaj['liczba_pokoi_do']))
                        $sql .= "AND mi.pokoje <= " . $this->_conn->escape($szukaj['liczba_pokoi_do']) . " ";
                if(!empty($szukaj['metraz_od']))
                        $sql .= "AND mi.pow_mieszkania >= " . $this->_conn->escape($szukaj['metraz_od']) . " ";
                if(!empty($szukaj['metraz_do']))
                        $sql .= "AND mi.pow_mieszkania <= " . $this->_conn->escape($szukaj['metraz_do']) . " ";
                if(!empty($szukaj['rok_budowy_od']))
                        $sql .= "AND mi.rok >= " . $this->_conn->escape($szukaj['rok_budowy_od']) . " ";
                if(!empty($szukaj['rok_budowy_do']))
                        $sql .= "AND mi.rok <= " . $this->_conn->escape($szukaj['rok_budowy_do']) . " ";
                if(!empty($szukaj['cena_od']))
                        $sql .= "AND n.cena >= " . $this->_conn->escape($szukaj['cena_od']) . " ";
                if(!empty($szukaj['cena_do']))
                        $sql .= "AND n.cena <= " . $this->_conn->escape($szukaj['cena_do']) . " ";

		return $this->_conn->fetchAll($sql);
	}
        
        public function pobierzListeGruntow($szukaj = array())
	{
		$sql = "
			SELECT n.id,m.miasto,g.pow_dzialki,n.cena,z.adres
			FROM nieruchomosci n
                        JOIN grunty g ON n.id=g.id_nieruchomosci
                        JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                        JOIN powiaty p ON n.id_powiatu=p.id
                        JOIN miasta m ON n.id_miasta=m.id
                        ".(empty($szukaj['zdjecie'])?"LEFT ":"")."JOIN zdjecia z ON n.id=z.id_nieruchomosci
			WHERE (z.kolejnosc IS NULL OR z.kolejnosc=1)
		";
		
		if(!empty($szukaj['wojewodztwo']))
			$sql .= "AND w.wojewodztwo LIKE '%" . $this->_conn->escape($szukaj['wojewodztwo']) . "%' ";
		if(!empty($szukaj['powiat']))
			$sql .= "AND p.powiat LIKE '%" . $this->_conn->escape($szukaj['powiat']) . "%' ";
		if(!empty($szukaj['miasto']))
			$sql .= "AND m.miasto LIKE '%" . $this->_conn->escape($szukaj['miasto']) . "%' ";
                if(!empty($szukaj['pow_dzialki_od']))
                        $sql .= "AND g.pow_dzialki >= " . $this->_conn->escape($szukaj['pow_dzialki_od']) . " ";
                if(!empty($szukaj['pow_dzialki_do']))
                        $sql .= "AND g.pow_dzialki <= " . $this->_conn->escape($szukaj['pow_dzialki_do']) . " ";
                if(!empty($szukaj['cena_od']))
                        $sql .= "AND n.cena >= " . $this->_conn->escape($szukaj['cena_od']) . " ";
                if(!empty($szukaj['cena_do']))
                        $sql .= "AND n.cena <= " . $this->_conn->escape($szukaj['cena_do']) . " ";

		return $this->_conn->fetchAll($sql);
	}
        
        public function pobierzDom($id)
        {
            $sql = "
                    SELECT *, n.id AS id_oferty
                    FROM nieruchomosci n
                    JOIN domy d ON n.id=d.id_nieruchomosci
                    JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                    JOIN powiaty p ON n.id_powiatu=p.id
                    JOIN miasta m ON n.id_miasta=m.id
                    LEFT JOIN koszyk_ofert k ON n.id = k.id_nieruchomosci AND k.id_sesji = '" . session_id() . "'
                    WHERE n.id=".$id;

            return $this->_conn->fetchRow($sql);
        }
        
        public function pobierzMieszkanie($id)
        {
            $sql = "
                    SELECT *, n.id AS id_oferty
                    FROM nieruchomosci n
                    JOIN mieszkania mi ON n.id=mi.id_nieruchomosci
                    JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                    JOIN powiaty p ON n.id_powiatu=p.id
                    JOIN miasta m ON n.id_miasta=m.id
                    LEFT JOIN koszyk_ofert k ON n.id = k.id_nieruchomosci AND k.id_sesji = '" . session_id() . "'
                    WHERE n.id=".$id;

            return $this->_conn->fetchRow($sql);
        }
        
        public function pobierzGrunt($id)
        {
            $sql = "
                    SELECT *, n.id AS id_oferty
                    FROM nieruchomosci n
                    JOIN grunty g ON n.id=g.id_nieruchomosci
                    JOIN wojewodztwa w ON n.id_wojewodztwa=w.id
                    JOIN powiaty p ON n.id_powiatu=p.id
                    JOIN miasta m ON n.id_miasta=m.id
                    LEFT JOIN koszyk_ofert k ON n.id = k.id_nieruchomosci AND k.id_sesji = '" . session_id() . "'
                    WHERE n.id=".$id;

            return $this->_conn->fetchRow($sql);
        }
        
        public function pobierzZdjecia($id)
        {
            $sql = "
                    SELECT *
                    FROM zdjecia z
                    WHERE z.id_nieruchomosci=".$id."
                    ORDER BY z.kolejnosc
            ";
            return $this->_conn->fetchAll($sql);
        }
        
        public function pobierz($id)
        {
            $sql = "SELECT * FROM nieruchomosci WHERE id = '" . $this->_conn->escape($id) . "'";

            return $this->_conn->fetchRow($sql);
        }
        
        public function drukujDom($pdf,$dane,$zdjecia)
        {
            $pdf->AddPage();

            $pdf->AddFont('arial_ce','','arial_ce.php');
            $pdf->AddFont('arial_ce','I','arial_ce_i.php');
            $pdf->AddFont('arial_ce','B','arial_ce_b.php');
            $pdf->AddFont('arial_ce','BI','arial_ce_bi.php');

            $pdf->SetFillColor(119, 151, 239);
            $pdf->SetXY(0, 0);
            $pdf->SetFont('arial_ce', 'B', 18);
            $pdf->Cell(210, 10, "Oferta $dane[id_oferty]", 0, 1, 'C', true);

            if (!$zdjecia)
            {
                $pdf->Ln(5);
                $pdf->Image("brak.JPG", null, null, 60);
            }
            foreach ($zdjecia as $z)
            {
                $pdf->Ln(5);
                $pdf->Image("images/$z[adres]", null, null, 60);
            }
            
            $x = $pdf->GetX() + 80;
            $y = 15;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Typ oferty:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['typ_oferty']=='s'?_t("sprzedaż"):"wynajem"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Typ nieruchomości:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "dom", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Województwo:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['wojewodztwo']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Powiat:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['powiat']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Miasto:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['miasto']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Ulica:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['ulica']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Nr budynku:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['nr_budynku'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Cena", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t("$dane[cena] zł"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Liczba pokoi:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['pokoje'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Powierzchnia domu:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "$dane[pow_domu] m2", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Powierzchnia działki:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "$dane[pow_dzialki] m2", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Rok budowy:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['rok'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Liczba pięter:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['liczba_pieter'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Winda:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['winda']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Materiał:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['material']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Stan budynku:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['stan_budynku'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Garaż:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['garaz']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Telefon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['telefon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Internet:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['internet']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "TV:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tv']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Domofon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['domofon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Tereny:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tereny']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Plac zabaw:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['plac_zabaw']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Obiekty sportowe:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['sport']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Kino:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['kino']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Basen:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['basen']=='t'?"jest":"nie ma"), 0, 2, 'L');
        }
        
        public function drukujMieszkanie($pdf,$dane,$zdjecia)
        {
            $pdf->AddPage();

            $pdf->AddFont('arial_ce','','arial_ce.php');
            $pdf->AddFont('arial_ce','I','arial_ce_i.php');
            $pdf->AddFont('arial_ce','B','arial_ce_b.php');
            $pdf->AddFont('arial_ce','BI','arial_ce_bi.php');

            $pdf->SetFillColor(119, 151, 239);
            $pdf->SetXY(0, 0);
            $pdf->SetFont('arial_ce', 'B', 18);
            $pdf->Cell(210, 10, "Oferta $dane[id_oferty]", 0, 1, 'C', true);

            if (!$zdjecia)
            {
                $pdf->Ln(5);
                $pdf->Image("brak.JPG", null, null, 60);
            }
            foreach ($zdjecia as $z)
            {
                $pdf->Ln(5);
                $pdf->Image("images/$z[adres]", null, null, 60);
            }
            
            $x = $pdf->GetX() + 80;
            $y = 15;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Typ oferty:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['typ_oferty']=='s'?_t("sprzedaż"):"wynajem"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 23;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Typ nieruchomości:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "dom", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 31;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Województwo:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['wojewodztwo']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 39;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Powiat:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['powiat']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 47;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Miasto:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['miasto']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 55;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Ulica:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['ulica']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 63;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Nr budynku:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['nr_budynku'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 71;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Nr lokalu:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['nr_lokalu'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 79;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Cena", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t("$dane[cena] zł"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 87;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Liczba pokoi:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['pokoje'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 95;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Powierzchnia mieszkania:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "$dane[pow_mieszkania] m2", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 103;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Rok budowy:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['rok'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 111;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Piętro:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['pietro'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 119;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Liczba pięter:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['liczba_pieter'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 127;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Winda:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['winda']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 135;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Materiał:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['material']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 143;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Stan lokalu:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['stan_lokalu'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 151;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Stan budynku:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['stan_budynku'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 159;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Garaż:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['garaz']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 167;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Osiedle:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['osiedle']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 175;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Telefon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['telefon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 183;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Internet:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['internet']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 191;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "TV:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tv']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 199;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Domofon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['domofon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 207;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Tereny:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tereny']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 215;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Plac zabaw:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['plac_zabaw']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 223;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Obiekty sportowe:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['sport']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 231;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Kino:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['kino']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $y = 239;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Basen:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['basen']=='t'?"jest":"nie ma"), 0, 2, 'L');
        }
        
        public function drukujGrunt($pdf,$dane,$zdjecia)
        {
            $pdf->AddPage();

            $pdf->AddFont('arial_ce','','arial_ce.php');
            $pdf->AddFont('arial_ce','I','arial_ce_i.php');
            $pdf->AddFont('arial_ce','B','arial_ce_b.php');
            $pdf->AddFont('arial_ce','BI','arial_ce_bi.php');

            $pdf->SetFillColor(119, 151, 239);
            $pdf->SetXY(0, 0);
            $pdf->SetFont('arial_ce', 'B', 18);
            $pdf->Cell(210, 10, "Oferta $dane[id_oferty]", 0, 1, 'C', true);

            if (!$zdjecia)
            {
                $pdf->Ln(5);
                $pdf->Image("brak.JPG", null, null, 60);
            }
            foreach ($zdjecia as $z)
            {
                $pdf->Ln(5);
                $pdf->Image("images/$z[adres]", null, null, 60);
            }
            
            $x = $pdf->GetX() + 80;
            $y = 15;
            $pdf->SetXY($x, $y);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Typ oferty:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['typ_oferty']=='s'?_t("sprzedaż"):"wynajem"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Typ nieruchomości:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "dom", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Województwo:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['wojewodztwo']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Powiat:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['powiat']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Miasto:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['miasto']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Ulica:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t($dane['ulica']), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Nr budynku:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, $dane['nr_budynku'], 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Cena", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, _t("$dane[cena] zł/m2"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, _t("Powierzchnia działki:"), 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, "$dane[pow_dzialki] m2", 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Telefon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['telefon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Internet:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['internet']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "TV:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tv']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Domofon:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['domofon']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Tereny:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['tereny']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Plac zabaw:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['plac_zabaw']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Obiekty sportowe:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['sport']=='t'?_t("są"):"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Kino:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['kino']=='t'?"jest":"nie ma"), 0, 2, 'L');
            
            $x = $pdf->GetX() - 60;
            $pdf->SetX($x);
            $pdf->SetFont('arial_ce', '', 14);
            $pdf->Cell(60, 10, "Basen:", 0, 0, 'L');
            $pdf->SetFont('arial_ce', 'B', 14);
            $pdf->Cell(50, 10, ($dane['basen']=='t'?"jest":"nie ma"), 0, 2, 'L');
        }
        
        public function wyslijZapytanie($dane)
        {
            require_once('classes/phpmailer/class.phpmailer.php');
            
            $dodaj = array(
            'id_nieruchomosci' => $dane['id'],
            'imie_nazwisko' => $dane['imie_nazwisko'],
            'email' => $dane['email'],
            'tresc' => $dane['tresc']
            );

            $this->_conn->insert('zapytania', $dodaj);

            $mail = new PHPMailer();
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();
            $mail->Host = "ssl://smtp.wit.edu.pl";
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = "borkowsa";
            $mail->Password = "l2o0b0o4";
            $mail->AddAddress('borkowsa@wit.edu.pl', 'Odbiorca');
            $mail->SetFrom('borkowsa@wit.edu.pl', 'Nadawca');
            $mail->Subject = 'Zapytanie ze strony';
            $mail->MsgHTML("
                <h1>Zapytanie ze strony do oferty nr $dane[id]</h1>
                <table>
                    <tr><td>Imię i nazwisko</td><td>$dane[imie_nazwisko]</td></tr>
                    <tr><td>Email</td><td>$dane[email]</td></tr>
                    <tr><td>Treść</td><td>$dane[tresc]</td></tr>
                </table>
            ");

            return $mail->Send();
        }
        
        public function wyslijOferte($dane)
        {
            require_once('classes/phpmailer/class.phpmailer.php');
            require('classes/fpdf/fpdf.php');
            $pdf = new FPDF('P');
            $pdf->Open();
            
            $nieruchomosc = $this->pobierz($dane['id']);
            switch ($nieruchomosc['typ_nieruchomosci'])
            {
                case 'm':
                    $this->drukujMieszkanie($pdf,$daneOferty=$this->pobierzMieszkanie($dane['id']),$this->pobierzZdjecia($dane['id']));
                    $typ_nieruchomosci='Mieszkanie';
                    break;
                case 'd':
                    $this->drukujDom($pdf,$daneOferty=$this->pobierzDom($dane['id']),$this->pobierzZdjecia($dane['id']));
                    $typ_nieruchomosci='Dom';
                    break;
                case 'g':
                    $this->drukujGrunt($pdf,$daneOferty=$this->pobierzGrunt($dane['id']),$this->pobierzZdjecia($dane['id']));
                    $typ_nieruchomosci='Grunt';
                    break;
            }

            $mail = new PHPMailer();
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();
            $mail->Host = "ssl://smtp.wit.edu.pl";
            $mail->SMTPAuth = true;
            $mail->Port = 465;
            $mail->Username = "borkowsa";
            $mail->Password = "l2o0b0o4";
            $mail->AddAddress($dane['email'], 'Odbiorca');
            $mail->SetFrom('borkowsa@wit.edu.pl', 'Nadawca');
            $mail->Subject = "Oferta nr $dane[id]";
            $mail->MsgHTML("
                <h1>Podstawowe dane dot. oferty:</h1>
                <table>
                    <tr><td>Typ oferty</td><td>".($daneOferty['typ_oferty']='s'?"Sprzedaż":"Wynajem")."</td></tr>
                    <tr><td>Typ nieruchomości</td><td>$typ_nieruchomosci</td></tr>
                    <tr><td>Województwo</td><td>$daneOferty[wojewodztwo]</td></tr>
                    <tr><td>Powiat</td><td>$daneOferty[powiat]</td></tr>
                    <tr><td>Miasto</td><td>$daneOferty[miasto]</td></tr>
                    <tr><td>Ulica</td><td>$daneOferty[ulica]</td></tr>
                    <tr><td>Nr budynku</td><td>$daneOferty[nr_budynku]</td></tr>"
                    .($daneOferty['typ_nieruchomosci']=='m'?"<tr><td>Nr lokalu</td><td>$daneOferty[nr_lokalu]</td></tr>":"").
                    "<tr><td>Cena</td><td>$daneOferty[cena]</td></tr>
                </table>
            ");
            $mail->AddStringAttachment($pdf->Output('','S'),'oferta.pdf','base64','application/pdf');

            return $mail->Send();
        }
        
        /**
         * Pobiera oferty specjalne dla określonego typu nieruchomości.
         *
         * @param string $typ
         * @return array
         */
        public function pobierzSpecjalne($typ)
        {
            $sql = "
                SELECT n.*, s.id as id_specjalne, z.adres
                FROM nieruchomosci n JOIN specjalne s ON n.id = s.id_oferty
                LEFT JOIN zdjecia z ON n.id=z.id_nieruchomosci
                WHERE (z.kolejnosc IS NULL OR z.kolejnosc=1)
                AND n.typ_nieruchomosci = '" . $this->_conn->escape($typ) . "'
                ORDER BY s.kolejnosc
            ";

            return $this->_conn->fetchAll($sql);
        }

        /**
         * Zapisuje kolejność ofert.
         *
         * @param array $oferty Id ofert zapisane w odpowiedniej kolejności
         */
        public function specjalneZapiszKolejnosc($oferty)
        {
            $i = 1;

            foreach($oferty as $o) {
                $this->_conn->update('specjalne', array('kolejnosc' => $i), "id = '" . $this->_conn->escape($o) . "'");
                $i++;
            }
        }

        /**
         * Usuwa ofertę specjalną.
         *
         * @param int $id
         * @return bool
         */
        public function usunSpecjalne($id)
        {
            return $this->_conn->delete('specjalne', 'id', $id);
        }
        
        public function pobierzIds($typ)
        {
            $sql = "SELECT n.id
                    FROM nieruchomosci n LEFT JOIN specjalne s ON n.id=s.id_oferty
                    WHERE typ_nieruchomosci = '" . $this->_conn->escape($typ) . "'
                    AND s.id IS NULL";
            
            return $this->_conn->fetchAll($sql);
        }
        
        public function dodajSpecjalne($id)
        {
            $sql = "SELECT typ_nieruchomosci
                    FROM nieruchomosci
                    WHERE id = " . $this->_conn->escape($id);
            $temp=$this->_conn->fetchRow($sql);
            $typ = $temp['typ_nieruchomosci'];
            $sql = "SELECT max(kolejnosc) AS max_k
                    FROM specjalne s JOIN nieruchomosci n ON s.id_oferty=n.id
                    WHERE typ_nieruchomosci='" . $typ . "'";
            $temp=$this->_conn->fetchRow($sql);
            $kolejnosc = $temp['max_k']+1;
            $data = array('id_oferty' => $id, 'kolejnosc' => $kolejnosc);
            $this->_conn->insert('specjalne', $data);
        }
}
?>