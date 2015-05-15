{literal}
<script type="text/javascript">

function usun(id, elem) {
    if(confirm("Czy na pewno chcesz usunąć ofertę specjalną?")) {
        $.post("admin_ustawienia_ajax.php",
            { id_specjalne : id },
            function(response) {
                if(response == 'ok') {
                    $(elem).parent().effect('fade', {}, "normal", function() {
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
    $(".specjalne").sortable({ cursor: 'move' });
});
</script>
{/literal}
<h4>Oferty specjalne</h4>

{if $smarty.get.msg == '1'}
    <p class="msg">Kolejność ofert została zapisana.</p>
{/if}

<form action="" method="post">
<h4>Domy</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=d">dodaj</a>
</p>
<ul class="specjalne">
    {foreach from=$specjalne_d item=it}
    <li>
        <input type="hidden" name="domy[]" value="{$it.id_specjalne}" />
        <img src="{if $it.adres}images/{$it.adres}{else}brak.JPG{/if}" style="width: 190px" />
        <div class="opis">
            ID: <strong>{$it.id}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" /></a>
    </li>
    {foreachelse}
    <li>brak</li>
    {/foreach}
</ul>
<h4>Mieszkania</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=m">dodaj</a>
</p>
<ul class="specjalne">
    {foreach from=$specjalne_m item=it}
    <li>
        <input type="hidden" name="mieszkania[]" value="{$it.id_specjalne}" />
        <img src="{if $it.adres}images/{$it.adres}{else}brak.JPG{/if}" style="width: 190px" />
        <div class="opis">
            ID: <strong>{$it.id}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" /></a>
    </li>
    {foreachelse}
    <li>brak</li>
    {/foreach}
</ul>
<h4>Grunty</h4>
<p>
    <a href="admin_ustawienia_dodaj.php?typ=g">dodaj</a>
</p>
<ul class="specjalne">
    {foreach from=$specjalne_g item=it}
    <li>
        <input type="hidden" name="grunty[]" value="{$it.id_specjalne}" />
        <img src="{if $it.adres}images/{$it.adres}{else}brak.JPG{/if}" style="width: 190px" />
        <div class="opis">
            ID: <strong>{$it.id}</strong>
        </div>
        <a href="#" onclick="return usun({$it.id_specjalne}, this)"><img src="images/usun.png" /></a>
    </li>
    {foreachelse}
    <li>brak</li>
    {/foreach}
</ul>
<div style="text-align: center; margin-bottom: 15px">
    <input type="submit" name="zapisz" value="Zapisz kolejność" />
</div>
</form>