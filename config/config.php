<?php

$config=array();

 

// zdefinowanie stałej globalne z ścieżką do głównego katalogu

define("MAIN_PATH",$_SESSION['MAIN_PATH']);


// adres url strony

$config['page_url']="http:/anzzilla.linuxpl.info/";


$config['dir']=array();

 

//katalog z obrazkami

$config['dir']['img']=MAIN_PATH."images/";

//katalog z klasami

$config['dir']['class']=MAIN_PATH."class/";

//katalog z bibliotekami

$config['dir']['libs']=MAIN_PATH."libs/";

//katalog z szablonami

$config['dir']['templates']=MAIN_PATH."templates/";

//katalog na szablony skompilowane

$config['dir']['templates_compile']=MAIN_PATH."templates_c/";

 

 

//******************************************************************************************

// DATABSE MySQL â KO)NFIGURACJA MYSQL

//******************************************************************************************

$config['db']=array();

//adres serwera


$config['db']['host']='127.0.0.1';
$config['db']['user']='anzzilla_p5';
$config['db']['password']='1234';
$config['db']['database']='anzzilla_p5';

 

//******************************************************************************************

// EXTENSIONS

//******************************************************************************************

$config['ext']=array();

// ściażki do smartów

$config['ext']['smarty']=array();

$config['ext']['smarty']['class']=$config['dir']['libs'].'smarty/Smarty.class.php';

$config['ext']['smarty']['compile']=$config['dir']['templates_compile'];

$config['ext']['smarty']['templates']=$config['dir']['templates'];

 

 

// konfiguracja php mailera 

$config['ext']['mail']=array();

$config['ext']['mail']['class']=$config['dir']['libs']."phpmailer/class.phpmailer.php";

$config['ext']['mail']['PluginDir']=$config['dir']['libs']."phpmailer/";

$config['ext']['mail']['Mailer']="smtp";

$config['ext']['mail']['Host']='’';

$config['ext']['mail']['Port']= 465;

$config['ext']['mail']['SMTPKeepAlive']=true;

$config['ext']['mail']['SMTPAuth']=true;

$config['ext']['mail']['Username']=" ";

$config['ext']['mail']['Password']= "";

$config['ext']['mail']['CharSet']="UTF-8";

$config['ext']['mail']['ContentType']="text/html";

$config['ext']['mail']['From']=" ";

$config['ext']['mail']['FromName']=" ";
?>
