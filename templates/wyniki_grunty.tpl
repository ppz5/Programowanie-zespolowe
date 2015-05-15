<h4>Lista gruntów:</h4>
{foreach from=$oferty item=o}
<table cellspacing="0" border="1">
    <tr>
        <td style="width: 200px" rowspan="4"><a href="szczegoly_gruntu.php?id={$o.id}">{if $o.adres}<img src="images/{$o.adres}" style="max-width: 200px" />{else}<img src="brak.JPG" />{/if}</a></td>
        <td class="lewa">Miasto:</td>
        <td>{$o.miasto}</td>
    </tr>
    <tr>
        <td class="lewa">Powierzchnia:</td>
        <td>{$o.pow_dzialki}</td>
    </tr>
    <tr>
        <td class="lewa">Cena za m<sup>2</sup>:</td>
        <td>{$o.cena}</td>
    </tr>
    <tr>
        <td class="lewa">Cena łączna:</td>
        <td>{$o.pow_dzialki*$o.cena}</td>
    </tr>
</table>
<br />
{/foreach}
<table>
    <tr>
        <td style="width: 200px"></td>
        <td style="border: 1px solid black"><a href="wyszukaj_grunt.php">Wróć do wyszukiwania >></a></td>
    </tr>
</table>
<br />