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
{foreach from=$uzytkownicy item=u name=uzytkownicy}
    <tr>
	<td>{$smarty.foreach.uzytkownicy.iteration}</td>
	<td>{$u.imie}</td>
	<td>{$u.nazwisko}</td>
	<td>{$u.login}</td>
	<td>{$u.grupa}</td>
        <td>
            <a href="admin_uzytkownicy_edycja.php?id={$u.id}">edytuj</a> |
            <a href="admin_uzytkownicy_usun.php?id={$u.id}">usuń</a>
	</td>
    </tr>
{/foreach}
</table>