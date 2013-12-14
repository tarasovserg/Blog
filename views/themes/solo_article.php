<?php
    $article = $modelThemes->getArticleById(intval($_GET['id']));
     
    if ($article) {
        $comments = $modelThemes->getCommentsForArticle($article['id']);
     ?>
    
     <div class ="article solo-article" >
        <div class="article-header" >
            <?php echo $article['header']?></div>
        <div class="article-info">
            <span style="margin-right: 5px">Autor: <?php echo $article['login']?></span>
            <span style="margin-right: 5px">Date: <?php echo $article['date']?></span>
            <span>Theme: <?php echo $article['name'] ?></span>
           
        </div>
        
        <div class="article-description">
            <?php echo $article['description'] ?>
       
        </div>
         <div class="article-content"><?php echo $article['content'] ?></div>
        <hr>
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
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) : ?>
                    <a href="index.php?page=theme&action=delete_comment&article_id=<?php 
                    echo  $article['id'];
                    ?>&comment_id=<?php
                        echo  $comment['id'];
                    ?>">Annuler</a>
                <?php endif; ?>
                </section>
                <hr>
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

    
   


   
