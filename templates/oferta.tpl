<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


<form action="zlecenie.php" method="post" enctype="multipart/form-data">
    
    <table cellspacing="0">
        <tr>
            <td colspan="2">Złóż ofertę:</td>
        </tr>
        <tr>
            <td class="lewa">Nazwa wykonawcy:</td>
            <td><input type="text" name="nazwa" size="21" /></td>
        </tr>

        <tr>
            <td class="lewa">Opis zlecenia:</td>
            <td> <textarea rows="5" cols="60" name="opis" width="690"/></textarea> </td>
        </tr>
       
        <tr>
            <td class="lewa">Zakończono</td>
            <td><input type="checkbox" name="zakoncz" value="tak" /> </td>
        </tr>
    </table>

    Złóż ofertę:
    <input type="submit" value="Wy" name="submit">
</form>


