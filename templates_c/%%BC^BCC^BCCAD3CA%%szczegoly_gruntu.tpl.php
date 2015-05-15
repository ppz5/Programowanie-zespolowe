<?php /* Smarty version 2.6.26, created on 2015-02-18 22:44:03
         compiled from szczegoly_gruntu.tpl */ ?>
<?php echo '
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
                        if(response == \'ok\') {
                            $("#dialog-zapytanie").dialog("close");
                            alert("Dziękujemy za wysłanie zapytania");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog(\'close\');
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
                        if(response == \'ok\') {
                            $("#dialog-oferta").dialog("close");
                            alert("Oferta została wysłana na podany adres email.");
                        } else {
                            alert("Wystąpił błąd, prosimy spróbować ponownie.");
                        }
                    }
                );
            },
            "Zamknij": function() {
                $(this).dialog(\'close\');
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
        \'koszyk_ajax.php\',
        { id_nieruchomosci : idOferty, dodaj : 1 },
        function(response) {
            if(response == \'ok\') {
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
'; ?>

<h4>Grunt - szczegóły oferty</h4>
<table cellspacing="0" border="1" style="float: left; width: 400px">
    <tr>
        <td class="lewa">Miasto:</td>
        <td><?php echo $this->_tpl_vars['oferta']['miasto']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Powierzchnia:</td>
        <td><?php echo $this->_tpl_vars['oferta']['pow_dzialki']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Cena za m<sup>2</sup>:</td>
        <td><?php echo $this->_tpl_vars['oferta']['cena']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Cena łączna:</td>
        <td><?php echo $this->_tpl_vars['oferta']['pow_dzialki']*$this->_tpl_vars['oferta']['cena']; ?>
</td>
    </tr>
</table>
<table cellspacing="0" style="float: left; width: 200px; margin-left: 50px">
    <tr>
        <td colspan="3"><?php if ($this->_tpl_vars['zdjecie1']): ?><a id="azdjecie" href="images/<?php echo $this->_tpl_vars['zdjecie1']['adres']; ?>
"><img id="zdjecie" src="images/<?php echo $this->_tpl_vars['zdjecie1']['adres']; ?>
" style="max-width: 190px" /></a><?php else: ?><img src="brak.JPG" /><?php endif; ?></td>
    </tr>
    <tr>
        <td style="width: 56px"><?php if ($this->_tpl_vars['zdjecie1']): ?><img src="images/<?php echo $this->_tpl_vars['zdjecie1']['adres']; ?>
" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/<?php echo $this->_tpl_vars['zdjecie1']['adres']; ?>
'" style="max-width: 56px" /><?php endif; ?></td>
        <td style="width: 56px"><?php if ($this->_tpl_vars['zdjecie2']): ?><img src="images/<?php echo $this->_tpl_vars['zdjecie2']['adres']; ?>
" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/<?php echo $this->_tpl_vars['zdjecie2']['adres']; ?>
'" style="max-width: 56px" /><?php endif; ?></td>
        <td style="width: 56px"><?php if ($this->_tpl_vars['zdjecie3']): ?><img src="images/<?php echo $this->_tpl_vars['zdjecie3']['adres']; ?>
" onclick="document.getElementById('zdjecie').src=document.getElementById('azdjecie').href='images/<?php echo $this->_tpl_vars['zdjecie3']['adres']; ?>
'" style="max-width: 56px" /><?php endif; ?></td>
    </tr>
</table>
<table style="clear: left">
    <tr>
        <td style="text-align: left">
            <?php if (! $this->_tpl_vars['oferta']['id_sesji']): ?>
                <a href="#" onclick="return dodajDoKoszyka(<?php echo $this->_tpl_vars['oferta']['id_oferty']; ?>
, this)">dodaj do koszyka</a>
            <?php else: ?>
                <span style="color: grey">oferta w koszyku</span>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td style="text-align: left">
            <a href="drukuj_oferte.php?id=<?php echo $this->_tpl_vars['oferta']['id_oferty']; ?>
">drukuj do pdfa</a>
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
            Typ oferty: <?php if ($this->_tpl_vars['oferta']['typ_oferty'] == 's'): ?>sprzedaż<?php else: ?>wynajem<?php endif; ?><br />
            Województwo: <?php echo $this->_tpl_vars['oferta']['wojewodztwo']; ?>
<br />
            Powiat: <?php echo $this->_tpl_vars['oferta']['powiat']; ?>
<br />
            Miasto: <?php echo $this->_tpl_vars['oferta']['miasto']; ?>
<br />
            Ulica: <?php echo $this->_tpl_vars['oferta']['ulica']; ?>
<br />
            Nr budynku: <?php echo $this->_tpl_vars['oferta']['nr_budynku']; ?>
<br />
            Cena za m<sup>2</sup>: <?php echo $this->_tpl_vars['oferta']['cena']; ?>
<br />
            Powierzchnia działki: <?php echo $this->_tpl_vars['oferta']['pow_dzialki']; ?>
<br />
            Telefon: <?php if ($this->_tpl_vars['oferta']['telefon'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            Internet: <?php if ($this->_tpl_vars['oferta']['internet'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            TV: <?php if ($this->_tpl_vars['oferta']['tv'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            Domofon: <?php if ($this->_tpl_vars['oferta']['domofon'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            Tereny: <?php if ($this->_tpl_vars['oferta']['tereny'] == 't'): ?>są<?php else: ?>nie ma<?php endif; ?><br />
            Plac zabaw: <?php if ($this->_tpl_vars['oferta']['plac_zabaw'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            Obiekty sportowe: <?php if ($this->_tpl_vars['oferta']['sport'] == 't'): ?>są<?php else: ?>nie ma<?php endif; ?><br />
            Kino: <?php if ($this->_tpl_vars['oferta']['kino'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?><br />
            Basen: <?php if ($this->_tpl_vars['oferta']['basen'] == 't'): ?>jest<?php else: ?>nie ma<?php endif; ?>
        </td>
    </tr>
</table>
<table style="width: 100%">
    <tr>
        <td style="width: 400px"></td>
        <td style="border: 1px solid black"><?php if ($this->_tpl_vars['koszyk']): ?><a href="koszyk.php">Wróć do koszyka >></a><?php else: ?><a href="wyniki_grunty.php">Wróć do wyników >></a><?php endif; ?></td>
    </tr>
</table>
<br />
<div id="dialog-zapytanie" title="Wyślij zapytanie ofertowe">
    <input type="hidden" name="id_oferty" id="id_oferty" value="<?php echo $this->_tpl_vars['oferta']['id_oferty']; ?>
" />
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