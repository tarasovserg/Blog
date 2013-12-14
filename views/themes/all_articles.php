<?php
    $articles = $modelThemes->getAllArticles();
    
    
    foreach ($articles as $key => $value) { ?>
        
    <div class ="article" >
        <div class="article-header" >
            <?php echo $value['header']?></div>
        <div class="article-info">
            <span style="margin-right: 5px">Autor: <?php echo $value['login']?></span>
            <span style="margin-right: 5px">Date: <?php echo $value['date']?></span>
            <span>Theme: <?php echo $value['name'] ?></span>
           
        </div>
        
        <div class="article-description">
            <?php echo $value['description'] ?>
       
        </div>
        <div class="article-ref"> <a href="?page=theme&action=readsolo&id=<?php echo $value['id']?>">Read article</a></div>
        <hr>
    </div>
    
<?php
    
}
    
?>