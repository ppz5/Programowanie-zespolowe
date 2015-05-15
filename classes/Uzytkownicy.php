<?php

require_once "Conn.php";

class Uzytkownicy
{
    /**
     * Id użytkownika
     * @var int
     */
    protected $_id = null;

    /**
     * Id grupy użytkownika.
     * @var int
     */
    protected $_idGrupy = null;

    /**
     * Dane użytkownika
     * @var array
     */
    protected $_dane;
    
    private $_conn;

    public function __construct()
    {
        // pobierz z sesji id zalogowanego użytkownika i wstaw do pola klasy
        if (!empty($_SESSION['id_uzytkownika']) && !empty($_SESSION['id_grupy'])) {
            $this->_id = (int) $_SESSION['id_uzytkownika'];
            $this->_idGrupy = (int) $_SESSION['id_grupy'];
        }

        $this->_conn = new Conn();
    }

    /**
     * Loguje do serwisu użytkownika o podanym loginie i haśle.
     * Wstawia id zalogowanego użytkownika do sesji.
     *
     * @param $login string
     * @param $haslo string
     * @return bool True, jeśli logowanie powiodło się
     */
    public function zaloguj($login, $haslo)
    {
        $sql = "SELECT * FROM uzytkownicy WHERE login = '" . $this->_conn->escape($login) . "' AND haslo = MD5('" . $this->_conn->escape($haslo) . "')";

        if ($row = $this->_conn->fetchRow($sql)) {
            $_SESSION['id_uzytkownika'] = $row['id'];
            $_SESSION['id_grupy'] = $row['id_grupy'];
            $this->_id = $row['id'];
            $this->_idGrupy = $row['id_grupy'];

            return true;
        } else {
            return false;
        }
    }

    /**
     * Wylogowuje użytkownika.
     *
     */
    public function wyloguj()
    {
        $_SESSION['id_uzytkownika'] = null;
        $_SESSION['id_grupy'] = null;
        session_destroy();
    }

    /**
     * Sprawdza, czy użytkownik jest zalogowany.
     *
     * @return bool True, jeśli jest
     */
    public function czyZalogowany()
    {
        if (is_null($this->_id))
            return false;
        else
            return true;
    }

    /**
     * Pobiera listę użytkowników.
     * 
     * @return array
     */
    public function pobierzListe()
    {
        $sql = "
            SELECT u.*, g.nazwa AS grupa
            FROM uzytkownicy u JOIN grupy g ON u.id_grupy = g.id
            ";

        return $this->_conn->fetchAll($sql);
    }

    /**
     * Pobiera dane pojedyńczego użytkownika.
     * 
     * @param int $id
     * @return array
     */
    public function pobierz($id)
    {
        $sql = "SELECT * FROM uzytkownicy WHERE id = '" . $this->_conn->escape($id) . "'";

        return $this->_conn->fetchRow($sql);
    }

    /**
     * Dodaje/edytuje dane użytkownika
     *
     * @param array $dane
     * @param int $id (optional) id użytkownika do edycji (jeśli nie ma, rekord jest dodawany)
     * @return array|bool Tablica z błędami lub true, jeśli wszystko jest ok
     */
    public function zapisz($dane, $id = null)
    {
        $bledy = array();

        if (empty($dane['imie']))
            $bledy['imie'] = 'puste';
        if (empty($dane['nazwisko']))
            $bledy['nazwisko'] = 'puste';
        if (empty($dane['login']))
            $bledy['login'] = 'puste';
        if (!empty($dane['haslo']) && strlen($dane['haslo']) < 3)
            $bledy['haslo'] = 'format';
        elseif (is_null($id) && empty($dane['haslo']))
            $bledy['haslo'] = 'puste'; // haslo tylko wymagane przy dodawaniu

        if (count($bledy) == 0) {
            // ok, można zapisywać
            unset($dane['zapisz']);
            if (!empty($dane['haslo']))
                $dane['haslo'] = md5($dane['haslo']);
            else
                unset($dane['haslo']);
            if (is_null($id))
                $this->_conn->insert('uzytkownicy', $dane);
            else
                $this->_conn->update('uzytkownicy', $dane, "id = '" . $this->_conn->escape($id) . "'");

            return true;
        } else {
            return $bledy;
        }
    }
    
    public function usun($id)
    {
        $this->_conn->delete('uzytkownicy', 'id', $id);
    }
}
?>