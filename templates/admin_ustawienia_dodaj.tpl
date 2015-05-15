<h4>Oferty specjalne - dodawanie</h4>

{if $smarty.get.msg == '1'}
    <p class="msg">Oferta została dodana do ofert specjalnych.</p>
{/if}

{if $ids}
    <form method="post" action="">
        <table style="width: 200px">
            <tr>
                <td>Id {$nieruchomosc}</td>
                <td>
                    <select name="id_oferty">
                    {foreach from=$ids item=i}
                        <option value="{$i.id}">{$i.id}</option>
                    {/foreach}
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="dodaj" value="Dodaj" /></td>
            </tr>
        </table>
    </form>
{else}
    <p style="margin-bottom: 15px">
        Brak ofert do dodania.
    </p>
{/if}