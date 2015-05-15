<?php

class Koszyk {

    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Dodaje ofertę do koszyka.
     *
     * @param int $idOferty
     * @param string $idSesji
     * @return int
     */
    public function dodaj($idOferty, $idSesji)
    {
        $dodaj = array(
            'id_nieruchomosci' => $idOferty,
            'id_sesji' => $idSesji
        );

        return $this->_conn->insert('koszyk_ofert', $dodaj);
    }

    /**
     * Usuwa ofertę z koszyka.
     *
     * @param int $idKoszyka
     * @return bool
     */
    public function usun($idKoszyka)
    {
        return $this->_conn->delete('koszyk_ofert', 'id', $idKoszyka);
    }

    /**
     * Pobiera listę ofert w koszyku.
     * 
     * @return array
     */
    public function pobierzListe()
    {
        $sql = "
                SELECT n.*, m.miasto, z.adres, k.id AS id_koszyka
                FROM nieruchomosci n
                JOIN miasta m ON n.id_miasta = m.id
                JOIN koszyk_ofert k ON n.id = k.id_nieruchomosci
                LEFT JOIN zdjecia z ON n.id = z.id_nieruchomosci
                WHERE (z.kolejnosc IS NULL OR z.kolejnosc = 1) AND k.id_sesji = '" . session_id() . "'
                ORDER BY k.id
		";

        return $this->_conn->fetchAll($sql);
    }
    
    public function pobierz()
    {
        $sql = "SELECT * FROM koszyk_ofert WHERE id_sesji = '" . session_id() . "' ORDER BY id";
        
        return $this->_conn->fetchAll($sql);
    }

    public function liczbaOfert()
    {
        $sql = "SELECT count(*) FROM koszyk_ofert WHERE id_sesji = '".session_id()."'";
        return $this->_conn->fetchRow($sql);
    }
}
?>