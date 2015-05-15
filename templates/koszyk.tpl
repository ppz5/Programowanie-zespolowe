{literal}
<script type="text/javascript">

function usunZKoszyka(idKoszyka, elem)
{
    $.post(
        'koszyk_ajax.php',
        { id_koszyka : idKoszyka, usun : 1 },
        function(response) {
            if(response == 'ok') {
                $(elem).closest("table").remove();
                
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc - 1);
                if (ilosc==1)
                    $("#brakOfert").html("<div style='height: 200px'>Brak ofert w koszyku.</div>");
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
{/literal}
﻿<h4>Koszyk ofert</h4>
{foreach from=$oferty item=o}
<table cellspacing="0" border="1">
    <tr>
        <td style="width: 200px" rowspan="5"><a href="szczegoly_{if $o.typ_nieruchomosci=='m'}mieszkania{elseif $o.typ_nieruchomosci=='d'}domu{else}gruntu{/if}.php?id={$o.id}&k=1">{if $o.adres}<img src="images/{$o.adres}" style="max-width: 200px" />{else}<img src="brak.JPG" />{/if}</a></td>
        <td class="lewa">Typ nieruchomości:</td>
        <td>{if $o.typ_nieruchomosci=='m'}Mieszkanie{elseif $o.typ_nieruchomosci=='d'}Dom{else}Grunt{/if}</td>
    </tr>
    <tr>
        <td class="lewa">Typ oferty:</td>
        <td>{if $o.typ_oferty=='s'}Sprzedaż{else}Wynajem{/if}</td>
    </tr>
    <tr>
        <td class="lewa">Miasto:</td>
        <td>{$o.miasto}</td>
    </tr>
    <tr>
        <td class="lewa">Cena{if $o.typ_nieruchomosci=='g'} za m<sup>2</sup>{/if}:</td>
        <td>{$o.cena}</td>
    </tr>
    <tr>
        <td colspan="2"><a href="#" onclick="return usunZKoszyka({$o.id_koszyka}, this)">usuń z koszyka</a></td>
    </tr>
</table>
{foreachelse}
<div style="height: 200px">
Brak ofert w koszyku.
</div>
{/foreach}
<div id="brakOfert">
</div>