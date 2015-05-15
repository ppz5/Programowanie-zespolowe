<?php /* Smarty version 2.6.26, created on 2015-02-19 14:09:01
         compiled from layout.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $this->_tpl_vars['tytul']; ?>
</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/<?php echo $this->_tpl_vars['inny_styl']; ?>
" rel="stylesheet" type="text/css" />
        <link href="css/smoothness/jquery-ui-1.8.6.custom.css" type="text/css" rel="stylesheet" />
        <link href="css/jquery.lightbox-0.5.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.6.custom.min.js"></script>
        <script type="text/javascript" src="js/jquery.lightbox-0.5.min.js"></script>
    </head>
    <body>
        <div id="kontener">
            <div id="logo">
                <a href="index.php"><img src="logo.JPG" /></a>
            </div>
            <ul id="menu_poziome">
                <li><a href="#">O Firmie</a></li>
                <li><a href="#">Nasz zespół</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
            <div id="kontener2">
                <ul id="menu_pionowe">
                    <li><a href="wyszukaj_mieszkanie.php">Mieszkania</a></li>
                    <li><a href="wyszukaj_dom.php">Domy</a></li>
                    <li><a href="wyszukaj_grunt.php">Grunty</a></li>
                    <li><a href="koszyk.php">Koszyk (<span id="liczbaOfert"><?php echo $this->_tpl_vars['liczba_ofert'][0]; ?>
</span>)</a></li>
                    <li><a href="drukuj_oferty.php">Drukuj oferty z koszyka</a></li>
                </ul>
                <div id="srodek">
                    <?php echo $this->_tpl_vars['srodek']; ?>

                </div>
            </div>
        </div>
    </body>
</html>