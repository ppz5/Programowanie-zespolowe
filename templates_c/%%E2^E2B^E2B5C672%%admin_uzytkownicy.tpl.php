<?php /* Smarty version 2.6.26, created on 2015-02-18 21:02:15
         compiled from admin_uzytkownicy.tpl */ ?>
<h4>Użytkownicy</h4>
<p>
    <a href="admin_uzytkownicy_dodaj.php">dodaj użytkownika</a>
</p>
<table>
    <tr>
	<th>Lp</th>
	<th>Imię</th>
	<th>Nazwisko</th>
	<th>Login</th>
	<th>Grupa</th>
	<th></th>
    </tr>
<?php $_from = $this->_tpl_vars['uzytkownicy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['uzytkownicy'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['uzytkownicy']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['u']):
        $this->_foreach['uzytkownicy']['iteration']++;
?>
    <tr>
	<td><?php echo $this->_foreach['uzytkownicy']['iteration']; ?>
</td>
	<td><?php echo $this->_tpl_vars['u']['imie']; ?>
</td>
	<td><?php echo $this->_tpl_vars['u']['nazwisko']; ?>
</td>
	<td><?php echo $this->_tpl_vars['u']['login']; ?>
</td>
	<td><?php echo $this->_tpl_vars['u']['grupa']; ?>
</td>
        <td>
            <a href="admin_uzytkownicy_edycja.php?id=<?php echo $this->_tpl_vars['u']['id']; ?>
">edytuj</a> |
            <a href="admin_uzytkownicy_usun.php?id=<?php echo $this->_tpl_vars['u']['id']; ?>
">usuń</a>
	</td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
</table>