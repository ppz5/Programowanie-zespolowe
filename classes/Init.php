<?php
error_reporting(E_ERROR);
session_start();

require_once 'Conn.php';
require_once 'Uzytkownicy.php';
require_once 'smarty/Smarty.class.php';

/**
 * Klasa obsługująca najczęściej wykonywane akcje w serwisie.
 * Zawiera metody obsługujące szkielet serwisu.
 *
 */
class Init
{
	/**
	 * Instancja obiektu szablonów Smarty.
	 * @var Smarty
	 */
	private $_smarty;
	
	/**
	 * Getter do obiektu smarty.
	 * 
	 * @return Smarty
	 */
	public function getSmarty()
	{
		return $this->_smarty;
	}
	
	public function __construct()
	{
		// ustaw smarty
		$this->_smarty = new Smarty;
		$this->_smarty->force_compile = true;
		$this->_smarty->debugging = false;
	}
        
        /**
         * Sprawdza, czy użytkownik jest zalogowany.
         * Jeśli nie jest, przekierowuje go do ekranu logowania.
         *
         */
        public function sprawdzLogowanie()
        {
            $uzytkownicy = new Uzytkownicy();
            if (!$uzytkownicy->czyZalogowany()) {
                header("Location: logowanie.php");
            }
        }
}
?>