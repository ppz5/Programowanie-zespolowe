<?php /* Smarty version 2.6.26, created on 2015-02-19 14:08:56
         compiled from wyszukaj_mieszkanie.tpl */ ?>
<form action="wyniki_mieszkania.php" method="post">
    <table cellspacing="0">
        <tr>
            <td colspan="2">Wyszukaj mieszkanie:</td>
        </tr>
        <tr>
            <td class="lewa">Województwo</td>
            <td><input type="text" name="wojewodztwo" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa">Powiat</td>
            <td><input type="text" name="powiat" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa" style="border-bottom: 1px solid black">Miasto</td>
            <td style="border-bottom: 1px solid black"><input type="text" name="miasto" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa">Liczba pokoi</td>
            <td>od <input type="text" name="liczba_pokoi_od" size="4" /> do <input type="text" name="liczba_pokoi_do" size="4" /></td>
        </tr>
        <tr>
            <td class="lewa">Metraż</td>
            <td>od <input type="text" name="metraz_od" size="4" /> do <input type="text" name="metraz_do" size="4" /></td>
        </tr>
        <tr>
            <td class="lewa" style="border-bottom: 1px solid black">Rok budowy</td>
            <td style="border-bottom: 1px solid black">od <input type="text" name="rok_budowy_od" size="4" /> do <input type="text" name="rok_budowy_do" size="4" /></td>
        </tr>
        <tr>
            <td class="lewa" style="border-bottom: 1px solid black">Cena</td>
            <td style="border-bottom: 1px solid black">od <input type="text" name="cena_od" size="4" /> do <input type="text" name="cena_do" size="4" /></td>
        </tr>
        <tr>
            <td class="lewa">Tylko ze zdjęciem</td>
            <td><input type="checkbox" name="zdjecie" value="tak" /> <input type="submit" name="pokaz" value="Pokaż >>" /></td>
        </tr>
    </table>
</form>