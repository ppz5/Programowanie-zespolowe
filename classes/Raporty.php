<?php

require_once "Conn.php";

class Raporty
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Loguje wejście użytkownika w ofertę.
     *
     * @param int $idOferty
     * @param string $typ
     * @return int
     */
    public function logujOferte($idOferty, $typ)
    {
        switch ($typ) {
            case 'oferta':
                $tabela = 'log_oferty';
                break;
            case 'koszyk':
                $tabela = 'log_koszyk';
                break;
            default:
                return false;
        }

        $dane = array(
            'id_nieruchomosci' => $idOferty,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'przegladarka' => $_SERVER['HTTP_USER_AGENT']
        );

        return $this->_conn->insert($tabela, $dane);
    }

    /**
     * Pobiera statystykę.
     * Zwraca listę posortowaną malejąco po liczbie wejść.
     *
     * @param string $typ Jakie dane pobrać
     * @param bool $wybres Czy sformatować dane dla wykresu
     * @return array
     */
    public function pobierzWejscia($typ, $wykres = false)
    {
        switch ($typ) {
            case 'oferta':
                $tabela = 'log_oferty';
                break;
            case 'koszyk':
                $tabela = 'log_koszyk';
                break;
            default:
                return false;
        }

        $sql = "
            SELECT id_nieruchomosci, COUNT(id) AS ile
            FROM $tabela
            GROUP BY id_nieruchomosci
            ORDER BY ile DESC
            ";
        $dane = $this->_conn->fetchAll($sql);

        if ($wykres) {
            $i = 0;
            $temp = array();
            foreach ($dane as $row) {
                $temp['dane'][$i] = (int) $row['ile'];
                $temp['etykiety'][$i] = $row['id_nieruchomosci'];
                $i++;
                if ($i >= 11)
                    break;
            }

            return $temp;
        }

        return $dane;
    }
    
    public function pobierzZapytania($wykres = false)
    {
        $sql = "
            SELECT id_nieruchomosci, COUNT(id) AS ile
            FROM zapytania
            GROUP BY id_nieruchomosci
            ORDER BY ile DESC
            ";
        $dane = $this->_conn->fetchAll($sql);

        if ($wykres) {
            $i = 0;
            $temp = array();
            foreach ($dane as $row) {
                $temp['dane'][$i] = (int) $row['ile'];
                $temp['etykiety'][$i] = $row['id_nieruchomosci'];
                $i++;
                if ($i >= 11)
                    break;
            }

            return $temp;
        }

        return $dane;
    }
    
    public function pobierzWejsciaDT($wykres = false)
    {
        $sql = "
            SELECT DAYNAME(data) AS dt, COUNT(id) AS ile
            FROM log_oferty
            GROUP BY dt
            ORDER BY ile DESC
            ";
        $dane = $this->_conn->fetchAll($sql);

        if ($wykres) {
            $i = 0;
            $temp = array();
            foreach ($dane as $row) {
                $temp['dane'][$i] = (int) $row['ile'];
                $temp['etykiety'][$i] = $row['dt'];
                $i++;
                if ($i >= 11)
                    break;
            }

            return $temp;
        }

        return $dane;
    }
    
    public function pobierzWejsciaG($wykres = false)
    {
        $sql = "
            SELECT HOUR(data) AS g, COUNT(id) AS ile
            FROM log_oferty
            GROUP BY g
            ORDER BY ile DESC
            ";
        $dane = $this->_conn->fetchAll($sql);

        if ($wykres) {
            $i = 0;
            $temp = array();
            foreach ($dane as $row) {
                $temp['dane'][$i] = (int) $row['ile'];
                $temp['etykiety'][$i] = $row['g'];
                $i++;
                if ($i >= 11)
                    break;
            }

            return $temp;
        }

        return $dane;
    }
}
?>