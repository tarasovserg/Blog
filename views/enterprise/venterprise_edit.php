<form action="?page=enterprise&action=edit" method="post">
    <table>
        <tbody>
            <tr>
                <td>Название:</td>
                <td><input type="text" name="name" value="<?php echo $enterprise['enterprise_name'];?>"><input type="hidden" name="id_enterprise" value="<?php echo $enterprise['id_enterprise'];?>"></td>
            </tr>
            <tr>
                <td>Адресс:</td>
                <td><input type="text" name="address" value="<?php echo $enterprise['address'];?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Обновить"></td>
            </tr>
        </tbody>
        
    </table>
    
</form>
