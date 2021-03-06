<?php   
    if ($theme) {
     ?>
    <section>
        <p>Name: <?php echo $theme['name']; ?></p>
        <p>Description:  <?php echo $theme['description']; ?></p>
    </section>
    <?php if($articles) {?>
    <table>
        <caption>Les articles</caption>
        <thead>
        <th>№</th>
            <th>Rubrique</th>
            <th>Description</th>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
            <th>Modifier</th> 
            <th>Annuler</th>
            <?php endif; ?>
        </thead>
        <tbody>
     <?php
     $n = 1;
     foreach ($articles as $article) { ?>
    <tr>
        <td><?php echo $n++;?></td>
        <td><a href="?page=theme&action=readsolo&id=<?php
            echo $article['id'];
        ?>"><?php echo $article['header'];?></a></td>
        <td><?php echo $article['description']; ?></td>
        <?php if($_SESSION['role']== 1): ?>
        <td><a href="?page=theme&action=edit_article&id=<?php echo $article['id'];?>&theme_id=<?php echo  $theme['id']?>">modifier</a></td>
        <td><a href="?page=theme&action=delete_article&id=<?php echo $article['id'];?>&theme_id=<?php echo  $theme['id']?>"">annuler</a></td>
        <?php endif; ?>
        <tr>
            <?php } ?>
        </tbody>
    </table>
<?php     
     
    } else {
        echo "Il n'y a pas d'articles";
    }
}
?>
<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
<section class="add_new"><a href="?page=theme&action=add_article&theme_id=<?php echo  $theme['id']?>">Ajouter un nouvel article</a></section>
<?php endif; ?>
   
