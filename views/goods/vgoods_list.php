<div class="action_reference"><a href="?page=goods&action=add_page">Добавить товар</a> </div>
<table class="hovertable">
    <tr>
        <th></th>
        <th>Название товара</th>
        <th>Сорт</th>
        <th>Предприятие</th>
        <th>Цена</th>
        <th></th>
    </tr>

    <?php
//
    if ($goods != NULL) {
        foreach ($goods as $key => $value):
            ?>
            <tr>
                <td><a href="?page=goods&action=edit_page&id=<?php echo $value['id_good'] ?>">Редактировать</a></td>
                <td><?php echo $value['good_name'] ?></td>
                <td><?php echo $value['sort'] ?></td>
                <td><?php echo $value['enterprise_name'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><a class="delete_ref" href="?page=goods&action=delete&id=<?php echo $value['id_good'];?>" onclick="return window.confirm('Удалить?');">Удалить</a></td>
            </tr>
            <?php
        endforeach;
    }
    ?>

</table>