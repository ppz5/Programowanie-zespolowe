<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Panel administracyjny</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link href="css/logowanie.css" rel="stylesheet" type="text/css" />
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
            <div id="srodek">
                {if $msg}
                    <p class="warning">{$msg}</p>
                {/if}
		<form method="post" action="">
                    <table style="width: 500px">
                        <tr>
                            <td>Login</td>
                            <td><input type="text" name="login"/></td>
                        </tr>
                        <tr>
                            <td>Hasło</td>
                            <td><input type="password" name="haslo"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="zaloguj" value="Zaloguj"/>
                            </td>
                        </tr>
                    </table>
		</form>
            </div>
        </div>
    </body>
</html>