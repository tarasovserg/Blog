<div class="action_reference"><a href="?page=enterprise&action=add_page">Добавить предприятие</a> </div>
<table class="hovertable">
    <tr>
        <th></th>
        <th>Название предприятия</th>
        <th>Адресс</th>
        <th></th>
    </tr>

    <?php
//
    if ($enterprise != NULL) {
        foreach ($enterprise as $key => $value):
            ?>
            <tr>
                <td><a href="?page=enterprise&action=edit_page&id=<?php echo $value['id_enterprise'] ?>">Редактировать</a></td>
                <td><?php echo $value['enterprise_name'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><a class="delete_ref" href="?page=enterprise&action=delete&id=<?php echo $value['id_enterprise'];?>" onclick="return window.confirm('Удалить?');">Удалить</a></td>
            </tr>
            <?php
        endforeach;
    }
    ?>

</table>