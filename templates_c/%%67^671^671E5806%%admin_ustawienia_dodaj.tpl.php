<?php /* Smarty version 2.6.26, created on 2015-01-26 20:02:56
         compiled from admin_ustawienia_dodaj.tpl */ ?>
<h4>Oferty specjalne - dodawanie</h4>

<?php if ($_GET['msg'] == '1'): ?>
    <p class="msg">Oferta została dodana do ofert specjalnych.</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['ids']): ?>
    <form method="post" action="">
        <table style="width: 200px">
            <tr>
                <td>Id <?php echo $this->_tpl_vars['nieruchomosc']; ?>
</td>
                <td>
                    <select name="id_oferty">
                    <?php $_from = $this->_tpl_vars['ids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
                        <option value="<?php echo $this->_tpl_vars['i']['id']; ?>
"><?php echo $this->_tpl_vars['i']['id']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="dodaj" value="Dodaj" /></td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <p style="margin-bottom: 15px">
        Brak ofert do dodania.
    </p>
<?php endif; ?>