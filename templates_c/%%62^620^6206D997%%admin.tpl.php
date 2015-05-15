<?php /* Smarty version 2.6.26, created on 2015-02-19 14:36:11
         compiled from admin.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Panel administracyjny</title>
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
                <a href="admin.php"><img src="logo.JPG" /></a><h1 style="display: inline">PANEL ADMINISTRACYJNY</h1>
            </div>
            <ul id="menu_poziome">
                <li><a href="#">O Firmie</a></li>
                <li><a href="#">Nasz zespół</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
            <div id="kontener2">
                <ul id="menu_pionowe">
                    <li><a href="admin_uzytkownicy.php">Użytkownicy</a></li>
                    <li><a href="admin_grupy.php">Grupy</a></li>
                    <li><a href="admin_ustawienia.php">Ustawienia</a></li>
                    <li><a href="admin_raporty.php">Raporty</a></li>
                    <li><a href="wyloguj.php">Wyloguj</a></li>
                </ul>
                <div id="srodek">
                    <?php echo $this->_tpl_vars['srodek']; ?>

                </div>
            </div>
        </div>
    </body>
</html>