<?php /* Smarty version 2.6.26, created on 2014-12-30 23:45:40
         compiled from oferty.index.tpl */ ?>
﻿<h2>Oferty</h2>

<form action="" method="post">

<table class="full">
	<tr>
		<th>Lp</th>
		<th>Typ nieruchomości</th>
		<th>Typ oferty</th>
		<th>Numer</th>
		<th>Powierzchnia</th>
		<th></th>
	</tr>
	
	<tr class="szukaj">
		<td></td>
		<td>
			<select name="typ_nieruchomosci">
				<option value="">-</option>
				<option value="M" <?php if ($this->_tpl_vars['szukaj']['typ_nieruchomosci'] == 'M'): ?>selected="selected"<?php endif; ?>>mieszkanie</option>
				<option value="D" <?php if ($this->_tpl_vars['szukaj']['typ_nieruchomosci'] == 'D'): ?>selected="selected"<?php endif; ?>>dom</option>
			</select>
		</td>
		<td>
			<select name="typ_oferty">
				<option value="">-</option>
				<option value="S" <?php if ($this->_tpl_vars['szukaj']['typ_oferty'] == 'S'): ?>selected="selected"<?php endif; ?>>sprzedaż</option>
				<option value="W" <?php if ($this->_tpl_vars['szukaj']['typ_oferty'] == 'W'): ?>selected="selected"<?php endif; ?>>wynajem</option>
			</select>
		</td>
		<td>
			<input type="text" name="numer" value="<?php echo $this->_tpl_vars['szukaj']['numer']; ?>
" />
		</td>
		<td></td>
		<td>
			<input type="submit" name="szukaj" value="Szukaj" />
		</td>
	</tr>
	
	<?php $_from = $this->_tpl_vars['oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['oferty'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['oferty']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['o']):
        $this->_foreach['oferty']['iteration']++;
?>
	<tr>
		<td><?php echo $this->_foreach['oferty']['iteration']; ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'M'): ?>
				Mieszkanie
			<?php elseif ($this->_tpl_vars['o']['typ_nieruchomosci'] == 'D'): ?>
				Dom
			<?php endif; ?>
		</td>
		<td>
			<?php if ($this->_tpl_vars['o']['typ_oferty'] == 'S'): ?>
				Sprzedaż
			<?php elseif ($this->_tpl_vars['o']['typ_oferty'] == 'W'): ?>
				Wynajem
			<?php endif; ?>
		</td>
		<td><?php echo $this->_tpl_vars['o']['numer']; ?>
</td>
		<td><?php echo $this->_tpl_vars['o']['powierzchnia']; ?>
 m<sup>2</sup></td>
		<td>
			<a href="oferty.szczegoly.php?id=<?php echo $this->_tpl_vars['o']['id']; ?>
">szczegóły</a>
		</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>

</form>