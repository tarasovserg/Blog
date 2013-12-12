<?php
    $article = $modelThemes->getArticleById(intval($_GET['id']));
     
    if ($article) {
     ?>
        
    <div class ="article" >
        <div style="border-bottom: 1px solid black; font-size: 20px;">
            <?php echo $article['header']?></div>
        <div style="margin-top: 10px; border-bottom: 1px solid black;">
            <?php echo $article['description'] ?></div>
        <div style="margin-top: 10px; border-bottom: 1px solid black;">
            <?php echo $article['content'] ?></div>
        <div style="height: 50px; float: left; width: 20%; min-width: 100px; border-right: 1px solid black;">
            By: <?php echo $article['login']?><br/>
            <?php echo $article['name'] ?>
        </div>
        <div style="height: 50px; margin-left: 5px; float: left; width: 20%; min-width: 100px;">
            At: <?php echo $article['date']?></div>
        
    </div>
    
<?php
    }
    if($_SESSION['user_id']) {
?>

    <?php } ?>


   
