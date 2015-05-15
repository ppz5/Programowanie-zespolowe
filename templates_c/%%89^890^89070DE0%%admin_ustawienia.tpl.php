<?php /* Smarty version 2.6.26, created on 2015-02-18 22:13:50
         compiled from admin_ustawienia.tpl */ ?>
<?php echo '
<script type="text/javascript">

function usun(id, elem) {
    if(confirm("Czy na pewno chcesz usunąć ofertę specjalną?")) {
        $.post("admin_ustawienia_ajax.php",
            { id_specjalne : id },
            function(response) {
                if(response == \'ok\') {
                    $(elem).parent().effect(\'fade\', {}, "normal", function() {
                        $(elem).parent().remove();
                    });
                } else {
                    alert("Wystąpił błąd, prosimy spróbować ponownie.");
                }
            }
        );
    }

    return false;
}

$(function() {
    $(".specjalne").sortable({ cursor: \'move\' });
});
</script>
'; ?>

<h4>Oferty specjalne</h4>

<?php if ($_GET['msg'] == '1'): ?>
    <p class="msg">Kolejność ofert została zapisana.</p>
<?php endif; ?>

<form action="" method="post">
<h4>Domy</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=d">dodaj</a>
</p>
<ul class="specjalne">
    <?php $_from = $this->_tpl_vars['specjalne_d']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li>
        <input type="hidden" name="domy[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="<?php if ($this->_tpl_vars['it']['adres']): ?>images/<?php echo $this->_tpl_vars['it']['adres']; ?>
<?php else: ?>brak.JPG<?php endif; ?>" style="width: 190px" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" /></a>
    </li>
    <?php endforeach; else: ?>
    <li>brak</li>
    <?php endif; unset($_from); ?>
</ul>
<h4>Mieszkania</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=m">dodaj</a>
</p>
<ul class="specjalne">
    <?php $_from = $this->_tpl_vars['specjalne_m']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li>
        <input type="hidden" name="mieszkania[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="<?php if ($this->_tpl_vars['it']['adres']): ?>images/<?php echo $this->_tpl_vars['it']['adres']; ?>
<?php else: ?>brak.JPG<?php endif; ?>" style="width: 190px" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" /></a>
    </li>
    <?php endforeach; else: ?>
    <li>brak</li>
    <?php endif; unset($_from); ?>
</ul>
<h4>Grunty</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=g">dodaj</a>
</p>
<ul class="specjalne">
    <?php $_from = $this->_tpl_vars['specjalne_g']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['it']):
?>
    <li>
        <input type="hidden" name="grunty[]" value="<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
" />
        <img src="<?php if ($this->_tpl_vars['it']['adres']): ?>images/<?php echo $this->_tpl_vars['it']['adres']; ?>
<?php else: ?>brak.JPG<?php endif; ?>" style="width: 190px" />
        <div class="opis">
            ID: <strong><?php echo $this->_tpl_vars['it']['id']; ?>
</strong>
        </div>
        <a href="#" onclick="return usun(<?php echo $this->_tpl_vars['it']['id_specjalne']; ?>
, this)"><img src="images/usun.png" /></a>
    </li>
    <?php endforeach; else: ?>
    <li>brak</li>
    <?php endif; unset($_from); ?>
</ul>
<div style="text-align: center; margin-bottom: 15px">
    <input type="submit" name="zapisz" value="Zapisz kolejność" />
</div>
</form>