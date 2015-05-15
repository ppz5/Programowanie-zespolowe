<?php /* Smarty version 2.6.26, created on 2015-02-19 14:36:11
         compiled from admin_raporty.tpl */ ?>
<?php echo '
<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">

$(function() {
        $("#tabs").tabs();

        swfobject.embedSWF("images/open-flash-chart.swf", "log_oferty_chart", "660", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin_raporty_wykres.php?typ=oferta"});
        swfobject.embedSWF("images/open-flash-chart.swf", "log_koszyk_chart", "660", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin_raporty_wykres.php?typ=koszyk"});
        swfobject.embedSWF("images/open-flash-chart.swf", "zapytania_chart", "660", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin_raporty_wykres.php?typ=zapytanie"});
        swfobject.embedSWF("images/open-flash-chart.swf", "log_oferty_dt_chart", "660", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin_raporty_wykres.php?typ=oferta_dt"});
        swfobject.embedSWF("images/open-flash-chart.swf", "log_oferty_g_chart", "660", "250", "9.0.0", "expressInstall.swf", {"data-file":"admin_raporty_wykres.php?typ=oferta_g"});
});

</script>
'; ?>


<h4>R a p o r t y</h4>

<div id="tabs">
    <ul style="height: 31px">
        <li><a href="#tabs-1">Oferty</a></li>
        <li><a href="#tabs-2">Koszyk</a></li>
        <li><a href="#tabs-3">Zapytania</a></li>
        <li><a href="#tabs-4">Dni tygodnia</a></li>
        <li><a href="#tabs-5">Godziny</a></li>
    </ul>

    <div id="tabs-1">
        <h4>Wejścia w oferty</h4>

        <div id="log_oferty_chart"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Liczba wejść</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_oferty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['id_nieruchomosci']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    <div id="tabs-2">
        <h4>Dodanie ofert do koszyka</h4>

        <div id="log_koszyk_chart"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Liczba dodań</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_koszyk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['id_nieruchomosci']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    <div id="tabs-3">
        <h4>Zapytania do ofert</h4>

        <div id="zapytania_chart"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Liczba zapytań</th>
            </tr>

            <?php $_from = $this->_tpl_vars['zapytania']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['id_nieruchomosci']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    <div id="tabs-4">
        <h4>Wejścia w oferty w poszczególnych dniach tygodnia</h4>

        <div id="log_oferty_dt_chart"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Liczba wejść</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_oferty_dt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['dt']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
    <div id="tabs-5">
        <h4>Wejścia w oferty w określonych godzinach</h4>

        <div id="log_oferty_g_chart"></div>

        <table>
            <tr>
                <th>ID</th>
                <th>Liczba wejść</th>
            </tr>

            <?php $_from = $this->_tpl_vars['log_oferty_g']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lo']):
?>
            <tr>
                <td><?php echo $this->_tpl_vars['lo']['g']; ?>
</td>
                <td><?php echo $this->_tpl_vars['lo']['ile']; ?>
</td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    </div>
</div>