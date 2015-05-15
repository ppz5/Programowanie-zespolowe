<?php /* Smarty version 2.6.26, created on 2015-02-18 22:42:38
         compiled from wyszukaj_dom.tpl */ ?>
<form action="wyniki_domy.php" method="post">
    <table cellspacing="0">
        <tr>
            <td colspan="2">Wyszukaj dom:</td>
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
            <td class="lewa">Powierzchnia domu</td>
            <td>od <input type="text" name="pow_domu_od" size="4" /> do <input type="text" name="pow_domu_do" size="4" /></td>
        </tr>
        <tr>
            <td class="lewa">Powierzchnia działki</td>
            <td>od <input type="text" name="pow_dzialki_od" size="4" /> do <input type="text" name="pow_dzialki_do" size="4" /></td>
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