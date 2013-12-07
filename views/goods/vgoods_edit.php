<form action="?page=goods&action=edit" method="post">
    <table >
        <tbody>
            <tr>
                <td>Название товара:</td>
                <td><input type="text" name="good_name" value="<?php echo $good['good_name'] ?>">
                    <input type="hidden" name="id_good" value="<?php echo $good['id_good'] ?>"></td>
            </tr>
            <tr>
                <td>Сорт:</td>
                <td><input type="text" name="sort" value="<?php echo $good['sort'] ?>"></td>
            </tr>
            <tr>
                <td>Предприятие:</td>
                <td>
                    <select name="id_enterprise">
                        <?php foreach ($enterprises as $key => $value) :                         
                        ?>
                        <option <?php if($good['id_enterprise']==$value['id_enterprise']){ echo "selected";} ?> value="<?php echo $value['id_enterprise']?>"><?php echo $value['enterprise_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Цена:</td>
                <td><input type="text" name="price" value="<?php echo $good['price'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value ="Обновить"></td>
            </tr>
        </tbody>
        
    </table>
    
</form>
