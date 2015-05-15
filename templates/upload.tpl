<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>


<form action="upload.php" method="post" enctype="multipart/form-data">
    
    <table cellspacing="0">
        <tr>
            <td colspan="2">Załaduj dane:</td>
        </tr>
        <tr>
            <td class="lewa">Nazwa produktu:</td>
            <td><input type="text" name="nazwa" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa">Typ urządzenia:</td>
            <td><input type="text" name="typ" size="21" /></td>
        </tr>
        
        <tr>
            <td class="lewa">Symbol:</td>
            <td><input type="text" name="symbol" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa" style="border-bottom: 1px solid black">Kod producenta:</td>
            <td style="border-bottom: 1px solid black"><input type="text" name="kod_prod" size="21" /></td>
        </tr>
        <tr>
            <td class="lewa">Opis:</td>
            <td> <textarea rows="5" cols="60" name="opis" width="690"/></textarea> </td>
        </tr>
       
        <tr>
            <td class="lewa" style="border-bottom: 1px solid black">Cena</td>
            <td style="border-bottom: 1px solid black"><input type="text" name="cena" size="7" /> </td>
        </tr>
        <tr>
            <td class="lewa">Zdjęcie:</td>
            <td> <input type="text" name="zdjecie" size="45" /></td>
        </tr>
    </table>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


