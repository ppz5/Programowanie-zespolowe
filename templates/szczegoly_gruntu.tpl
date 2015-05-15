{literal}
<script type="text/javascript">
$(function() {
    $("#azdjecie").lightBox();

    $("#dialog-zapytanie").dialog({
        autoOpen: false,
        height: 300,
        width: 400,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferta_ajax.php", {
                        zapytanie : 1,
                        id : $("#id_oferty").val(),
                        imie_nazwisko : $("#imie_nazwisko").val(),
                        email : $("#email").val(),
                        tresc : $("#tresc").val()
                    }, function(response) {
                        if(response == 'ok') {
                            $("#dialog-zapytanie").dialog("close");
                            alert("Dziękujemy za wysłanie zapytania");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog('close');
            }
        }
    });

   $("#aZapytanie").click(function() {
       $("#dialog-zapytanie").dialog("open");
       return false;
   });
   $("#dialog-oferta").dialog({
        autoOpen: false,
        height: 150,
        width: 300,
        modal: true,
        buttons: {
            "Wyślij": function() {
                $.post("oferta_ajax.php", {
                        oferta : 1,
                        id : $("#id_oferty").val(),
                        email : $("#email2").val()
                    }, function(response) {
                        if(response == 'ok') {
                            $("#dialog-oferta").dialog("close");
                            alert("Oferta została wysłana na podany adres email.");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog('close');
            }
        }
    });

   $("#aOferta").click(function() {
       $("#dialog-oferta").dialog("open");
       return false;
   });
});
function dodajDoKoszyka(idOferty, elem)
{
    $.post(
        'koszyk_ajax.php',
        { id_nieruchomosci : idOferty, dodaj : 1 },
        function(response) {
            if(response == 'ok') {
                $(elem).replaceWith("<span>dodane!</span>");
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc + 1);
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
{/literal}
<h4>Grunt - szczegóły oferty</h4>
<table cellspacing="0" border="1" style="float: left; width: 400px">
    <tr>
        <td class="lewa">Miasto:</td>
        <td>{$oferta.miasto}</td>
    </tr>
    <tr>
        <td class="lewa">Powierzchnia:</td>
        <td>{$oferta.pow_dzialki}</td>
    </tr>
    <tr>
        <td class="lewa">Cena za m<sup>2</sup>:</td>
        <td>{$oferta.cena}</td>
    </tr>
    <tr>
        <td class="lewa">Cena łączna:</td>
        <td>{$oferta.pow_dzialki*$oferta.cena}</td>
    </tr>
</table>
<table cellspacing="0" style="float: left; width: 200px; margin-left: 50px">
    <tr>
        <td colspan="3">{if $zdjecie1}<a id="azdjecie" href="images/{$zdjecie1.adres}"><img id="zdjecie" src="images/{$zdjecie1.adres}" style="max-width: 190px" /></a>{else}<img src="brak.JPG" />{/if}</td>
    </tr>
    <tr>
        <td style="width: 56px">{if $zdjecie1}<img src="images/{$zdjecie1.adres}" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/{$zdjecie1.adres}'" style="max-width: 56px" />{/if}</td>
        <td style="width: 56px">{if $zdjecie2}<img src="images/{$zdjecie2.adres}" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/{$zdjecie2.adres}'" style="max-width: 56px" />{/if}</td>
        <td style="width: 56px">{if $zdjecie3}<img src="images/{$zdjecie3.adres}" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/{$zdjecie3.adres}'" style="max-width: 56px" />{/if}</td>
    </tr>
</table>
<table style="clear: left">
    <tr>
        <td style="text-align: left">
            {if !$oferta.id_sesji}
                <a href="#" onclick="return dodajDoKoszyka({$oferta.id_oferty}, this)">dodaj do koszyka</a>
            {else}
                <span style="color: grey">oferta w koszyku</span>
            {/if}
        </td>
    </tr>
    <tr>
        <td style="text-align: left">
            <a href="drukuj_oferte.php?id={$oferta.id_oferty}">drukuj do pdfa</a>
        </td>
    </tr>
    <tr>
        <td style="text-align: left">
            <a href="#" id="aZapytanie">wyślij zapytanie o ofertę</a>
        </td>
    </tr>
    <tr>
        <td style="text-align: left">
            <a href="#" id="aOferta">wyślij ofertę na podany adres email</a>
        </td>
    </tr>
</table>
<table style="width: 100%; min-height: 200px">
    <tr>
        <td style="border: 1px solid black; text-align: left; vertical-align: top">
            Typ oferty: {if $oferta.typ_oferty=='s'}sprzedaż{else}wynajem{/if}<br />
            Województwo: {$oferta.wojewodztwo}<br />
            Powiat: {$oferta.powiat}<br />
            Miasto: {$oferta.miasto}<br />
            Ulica: {$oferta.ulica}<br />
            Nr budynku: {$oferta.nr_budynku}<br />
            Cena za m<sup>2</sup>: {$oferta.cena}<br />
            Powierzchnia działki: {$oferta.pow_dzialki}<br />
            Telefon: {if $oferta.telefon=='t'}jest{else}nie ma{/if}<br />
            Internet: {if $oferta.internet=='t'}jest{else}nie ma{/if}<br />
            TV: {if $oferta.tv=='t'}jest{else}nie ma{/if}<br />
            Domofon: {if $oferta.domofon=='t'}jest{else}nie ma{/if}<br />
            Tereny: {if $oferta.tereny=='t'}są{else}nie ma{/if}<br />
            Plac zabaw: {if $oferta.plac_zabaw=='t'}jest{else}nie ma{/if}<br />
            Obiekty sportowe: {if $oferta.sport=='t'}są{else}nie ma{/if}<br />
            Kino: {if $oferta.kino=='t'}jest{else}nie ma{/if}<br />
            Basen: {if $oferta.basen=='t'}jest{else}nie ma{/if}
        </td>
    </tr>
</table>
<table style="width: 100%">
    <tr>
        <td style="width: 400px"></td>
        <td style="border: 1px solid black">{if $koszyk}<a href="koszyk.php">Wróć do koszyka >></a>{else}<a href="wyniki_grunty.php">Wróć do wyników >></a>{/if}</td>
    </tr>
</table>
<br />
<div id="dialog-zapytanie" title="Wyślij zapytanie ofertowe">
    <input type="hidden" name="id_oferty" id="id_oferty" value="{$oferta.id_oferty}" />
    <table style="width: 100%">
        <tr>
            <td>Imię i nazwisko</td>
            <td><input type="text" name="imie_nazwisko" id="imie_nazwisko" /></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td>Treść</td>
            <td><textarea name="tresc" id="tresc"></textarea></td>
        </tr>
    </table>
</div>
<div id="dialog-oferta" title="Podaj swój email">
    <input type="text" name="email" id="email2" />
</div>