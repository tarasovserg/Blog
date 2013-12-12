<table>
    <caption>Liste des thèmes</caption>
    <tr>
        <th>№</th>
        <th>name</th>
        <th>description</th>
        <th>modifier</th> 
        <th>annuler</th>
         
    </tr>
           
<?php
    foreach($themes as $key => $theme ) {
?>
    <tr>
        <td><?php $number = $key+1;
        echo $number?></td>
        <td><a href="?page=theme&action=filter&id=<?php echo $theme['id']; ?>">
            <?php echo $theme['name']; ?></a></td>
        <td><?php echo $theme['description']; ?></td>
        <td><a href="?page=theme&action=edit_theme&id=<?php echo $theme['id'];?>">modifier</a></td>
        <td><a href="?page=theme&action=delete&id=<?php echo $theme['id'];?>">annuler</a></td>
    </tr>
<?php }?>
</table>
<?php if($_SESSION['role'] ==1):?>
    <section class="add_new"><a href="?page=theme&action=add_theme">Ajouter un nouveau thème</a></section>
<?php endif; ?>
