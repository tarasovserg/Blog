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
            <th>Modifier</th> 
            <th>Annuler</th>
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
        <td><a href="?page=theme&action=edit_article&id=<?php echo $article['id'];?>&theme_id=<?php echo  $theme['id']?>">modifier</a></td>
        <td><a href="?page=theme&action=delete_article&id=<?php echo $article['id'];?>&theme_id=<?php echo  $theme['id']?>"">annuler</a></td>
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
<section class="add_new"><a href="?page=theme&action=add_article&theme_id=<?php echo  $theme['id']?>">Ajouter un nouvel article</a></section>
    
   
