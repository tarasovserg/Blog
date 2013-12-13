<?php
    $article = $modelThemes->getArticleById(intval($_GET['id']));
     
    if ($article) {
        $comments = $modelThemes->getCommentsForArticle($article['id']);
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
     <section class="comments_block">
<?php
        if($comments) {
            foreach ($comments as $comment) {
                ?>
            <section class="comment">
                <section class="author">
                    <label>Author:</label> 
                    <?php echo $comment['author']; ?>
                </section>
                <section class="comment_content">
                    <label>Commentaire:</label> 
                        <p><?php echo $comment['content']; ?></p>
                </section>
                <section class="date">
                    <label>Date:</label> 
                    <?php echo $comment['date']; ?>
                </section>
               <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
                <section>
                    <a href="index.php?page=theme&action=delete_comment&article_id=<?php 
                    echo  $article['id'];
                    ?>&comment_id=<?php
                        echo  $comment['id'];
                    ?>">Annuler</a>
                </section>
                <?php endif; ?>
            </section>
         </section>
<?php
            }
        }
    }
    
    if(isset($_SESSION['user_id'])) {
?>
    
<section class="add_new"><a href="?page=theme&action=add_comment&article_id=<?php echo  $article['id']?>">Ajouter un commentaire</a></section>
    <?php } ?>

    
   


   
