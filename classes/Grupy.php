<?php

class Grupy
{
    private $_conn;

    public function __construct()
    {
        $this->_conn = new Conn();
    }

    /**
     * Pobiera listę grup.
     * 
     * @return array
     */
    public function pobierzListe()
    {
        $sql = "SELECT * FROM grupy";

        return $this->_conn->fetchAll($sql);
    }
}
?>