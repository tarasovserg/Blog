<div class="action_reference"><a href="?page=realization&action=add_page">Добавить реализацию</a> </div>
<table class="hovertable">
    <tr>
        <th></th>
        <th>Товар</th>
        <th>Дата</th>
        <th></th>
    </tr>
    <a href="#" id ="print">Печать документа</a>
    <?php
//
    if ($realizations != NULL) {
        foreach ($realizations as $key => $value):
            ?>
            <tr>
                <td><a href="?page=realization&action=edit_page&id=<?php echo $value['id_realization'] ?>">Редактировать</a></td>
                <td><?php echo $value['good_name'] ?></td>
                <td><?php echo $value['date'] ?></td>
                <td><a class="delete_ref" href="?page=realization&action=delete&id=<?php echo $value['id_realization'];?>" onclick="return window.confirm('Удалить?');">Удалить</a></td>
            </tr>
            <?php
        endforeach;
    }
    ?>

</table>