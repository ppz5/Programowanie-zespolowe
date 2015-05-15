<?php /* Smarty version 2.6.26, created on 2015-02-18 22:42:41
         compiled from wyniki_domy.tpl */ ?>
<h4>Lista domów:</h4>
<?php $_from = $this->_tpl_vars['oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
<table cellspacing="0" border="1">
    <tr>
        <td style="width: 200px" rowspan="4"><a href="szczegoly_domu.php?id=<?php echo $this->_tpl_vars['o']['id']; ?>
"><?php if ($this->_tpl_vars['o']['adres']): ?><img src="images/<?php echo $this->_tpl_vars['o']['adres']; ?>
" style="max-width: 200px" /><?php else: ?><img src="brak.JPG" /><?php endif; ?></a></td>
        <td class="lewa">Miasto:</td>
        <td><?php echo $this->_tpl_vars['o']['miasto']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Pow. domu:</td>
        <td><?php echo $this->_tpl_vars['o']['pow_domu']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Pow. działki:</td>
        <td><?php echo $this->_tpl_vars['o']['pow_dzialki']; ?>
</td>
    </tr>
    <tr>
        <td class="lewa">Cena:</td>
        <td><?php echo $this->_tpl_vars['o']['cena']; ?>
</td>
    </tr>
</table>
<br />
<?php endforeach; endif; unset($_from); ?>
<table>
    <tr>
        <td style="width: 200px"></td>
        <td style="border: 1px solid black"><a href="wyszukaj_dom.php">Wróć do wyszukiwania >></a></td>
    </tr>
</table>
<br />