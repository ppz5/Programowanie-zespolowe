<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{$tytul}</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/{$inny_styl}" rel="stylesheet" type="text/css" />
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
           
            <div id ="span3">
            
                <ul id="JMenu">
                    
                     <li><a href="wyszukaj_mieszkanie.php" class="fNiv active">Moje zlecenia<br/>
                                
                            <ul>
                                <li><a href="premiery.php">Wyszukaj zlecenia</a></li>
                                <li><a href="warto.php">Dodaj zlecenie</a></li>
                               

                            </ul>
                        </li>
                    
                    <li><a href="koszyk.php">Koszyk (<span id="liczbaOfert">{$liczba_ofert[0]}</span>)</a></li>
                    <li><a href="upload.php">Generuj ofertę</a>
                    <ul>
                                <li><a href="drukuj_oferty.php">Drukuj ofertę</a></li>
                            
                               

                            </ul>
                    </li>
                    
                </ul>
             </div> 
             <div id ="span4">
                <div id="srodek">
                    {$srodek}
                </div>
            </div>
            
              
        </div>
    </body>
</html>
