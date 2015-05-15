<?php /* Smarty version 2.6.26, created on 2015-01-24 22:59:54
         compiled from admin_uzytkownicy_dodaj.tpl */ ?>
<h4>Użytkownicy - dodawanie</h4>

<?php if ($_GET['msg'] == '1'): ?>
    <p class="msg">Użytkownik został dodany do bazy.</p>
<?php endif; ?>

<form method="post" action="admin_uzytkownicy_dodaj.php">
<table style="width: 500px">
    <tr>
	<td>Imię</td>
	<td><input type="text" name="imie" value="<?php echo $this->_tpl_vars['uzytkownik']['imie']; ?>
" class="<?php echo $this->_tpl_vars['bledy']['imie']; ?>
" /></td>
    </tr>
    <tr>
	<td>Nazwisko</td>
	<td><input type="text" name="nazwisko" value="<?php echo $this->_tpl_vars['uzytkownik']['nazwisko']; ?>
" class="<?php echo $this->_tpl_vars['bledy']['nazwisko']; ?>
" /></td>
    </tr>
    <tr>
	<td>Login</td>
	<td><input type="text" name="login" value="<?php echo $this->_tpl_vars['uzytkownik']['login']; ?>
" class="<?php echo $this->_tpl_vars['bledy']['login']; ?>
" /></td>
    </tr>
    <tr>
	<td>Hasło</td>
	<td><input type="password" name="haslo" class="<?php echo $this->_tpl_vars['bledy']['haslo']; ?>
" /></td>
    </tr>
    <tr>
	<td>Grupa</td>
	<td>
            <select name="id_grupy">
            <?php $_from = $this->_tpl_vars['grupy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?>
                <option value="<?php echo $this->_tpl_vars['g']['id']; ?>
" <?php if ($this->_tpl_vars['g']['id'] == $this->_tpl_vars['uzytkownik']['id_grupy']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['g']['nazwa']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            </select>
	</td>
    </tr>
    <tr>
	<td></td>
	<td><input type="submit" name="zapisz" value="Zapisz" /></td>
    </tr>
</table>
</form>