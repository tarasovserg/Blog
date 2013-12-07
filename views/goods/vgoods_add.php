<form action="?page=goods&action=add" method="post">
    <table >
        <tbody>
            <tr>
                <td>Название товара:</td>
                <td><input type="text" name="good_name"></td>
            </tr>
            <tr>
                <td>Сорт:</td>
                <td><input type="text" name="sort"></td>
            </tr>
            <tr>
                <td>Предприятие:</td>
                <td>
                    <select name="id_enterprise">
                        <?php foreach ($enterprises as $key => $value) :                         
                        ?>
                        <option value="<?php echo $value['id_enterprise']?>"><?php echo $value['enterprise_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Цена:</td>
                <td><input type="text" name="price"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value ="Добавить"></td>
            </tr>
        </tbody>
        
    </table>
    
</form>
