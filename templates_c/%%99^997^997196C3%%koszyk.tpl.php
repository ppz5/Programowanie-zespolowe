<?php /* Smarty version 2.6.26, created on 2015-02-18 22:44:09
         compiled from koszyk.tpl */ ?>
<?php echo '
<script type="text/javascript">

function usunZKoszyka(idKoszyka, elem)
{
    $.post(
        \'koszyk_ajax.php\',
        { id_koszyka : idKoszyka, usun : 1 },
        function(response) {
            if(response == \'ok\') {
                $(elem).closest("table").remove();
                
                ilosc = $("#liczbaOfert").html() * 1;
                $("#liczbaOfert").html(ilosc - 1);
                if (ilosc==1)
                    $("#brakOfert").html("<div style=\'height: 200px\'>Brak ofert w koszyku.</div>");
            } else {
                alert("Wystąpił błąd, prosimy spróbować ponownie.");
            }
        }
    );

    return false;
}
</script>
'; ?>

﻿<h4>Koszyk ofert</h4>
<?php $_from = $this->_tpl_vars['oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
<table cellspacing="0" border="1">
    <tr>
        <td style="width: 200px" rowspan="5"><a href="szczegoly_<?php if ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'm'): ?>mieszkania<?php elseif ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'd'): ?>domu<?php else: ?>gruntu<?php endif; ?>.php?id=<?php echo $this->_tpl_vars['o']['id']; ?>
&k=1"><?php if ($this->_tpl_vars['o']['adres']): ?><img src="images/<?php echo $this->_tpl_vars['o']['adres']; ?>
" style="max-width: 200px" /><?php else: ?><img src="brak.JPG" /><?php endif; ?></a></td>
        <td class="lewa">Typ nieruchomości:</td>
        <td><?php if ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'm'): ?>Mieszkanie<?php elseif ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'd'): ?>Dom<?php else: ?>Grunt<?php endif; ?></td>
    </tr>
    <tr>
        <td class="lewa">Typ oferty:</td>
        <td><?php if ($this->_tpl_vars['o']['typ_oferty'] == 's'): ?>Sprzedaż<?php else: ?>Wynajem<?php endif; ?></td>
    </tr>
    <tr>
        <td class="lewa">Miasto:</td>
        <td><?php echo $this->_tpl_vars['o']['miasto']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Cena<?php if ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'g'): ?> za m<sup>2</sup><?php endif; ?>:</td>
        <td><?php echo $this->_tpl_vars['o']['cena']; ?>
</td>
    </tr>
    <tr>
        <td colspan="2"><a href="#" onclick="return usunZKoszyka(<?php echo $this->_tpl_vars['o']['id_koszyka']; ?>
, this)">usuń z koszyka</a></td>
    </tr>
</table>
<?php endforeach; else: ?>
<div style="height: 200px">
Brak ofert w koszyku.
</div>
<?php endif; unset($_from); ?>
<div id="brakOfert">
</div>