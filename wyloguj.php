<?php

session_start();

require_once 'classes/Uzytkownicy.php';

$uzytkownicy = new Uzytkownicy();
$uzytkownicy->wyloguj();

header("Location: logowanie.php");
?>