<?php
    $articles = $modelThemes->getAllArticles();
    
    
    foreach ($articles as $key => $value) { ?>
        
    <div class ="article" >
        <div style="height: 30px; border-bottom: 1px solid black; font-size: 20px;">
            <?php echo $value['header']?></div>
        <div style="height: 50px; text-overflow: ellipsis; margin-top: 10px; border-bottom: 1px solid black;">
            <?php echo $value['description'] ?></div>
        <div style="height: 50px; float: left; width: 20%; min-width: 100px; border-right: 1px solid black;">
            By: <?php echo $value['login']?><br/>
            <?php echo $value['name'] ?>
        </div>
        <div style="height: 50px; margin-left: 5px; float: left; width: 20%; min-width: 100px;">
            At: <?php echo $value['date']?></div>
        <div style="height: 50px; margin-left: 5px; float: left; width: 20%; min-width: 100px;">
            <a href="?page=theme&action=readsolo&id=<?php echo $value['id']?>">Read article</a></div>
    </div>
    
<?php
    
}
    
?>