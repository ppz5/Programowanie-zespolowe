{literal}
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
{/literal}

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

            {foreach from=$log_oferty item=lo}
            <tr>
                <td>{$lo.id_nieruchomosci}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
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

            {foreach from=$log_koszyk item=lo}
            <tr>
                <td>{$lo.id_nieruchomosci}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
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

            {foreach from=$zapytania item=lo}
            <tr>
                <td>{$lo.id_nieruchomosci}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
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

            {foreach from=$log_oferty_dt item=lo}
            <tr>
                <td>{$lo.dt}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
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

            {foreach from=$log_oferty_g item=lo}
            <tr>
                <td>{$lo.g}</td>
                <td>{$lo.ile}</td>
            </tr>
            {/foreach}
        </table>
    </div>
</div>