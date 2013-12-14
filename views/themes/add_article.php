<script src="javascript/ckeditor/ckeditor.js"></script>
<?php 
$action = $send_to;
if(isset($_GET['theme_id'])) {
    $action .= '&theme_id='. $_GET['theme_id'];
}
if(isset($_GET['id'])) {
    $action .= '&id='. $_GET['id'];
}
?>
<form action="?page=theme&action=<?php echo $action;?>" 
      method="POST">
    <section class ="article" >
       <section class="field">
           <label for="header">Titre de l'article: </label>
           <input type="text" name="header" 
                  value="<?php
                  if(isset($article['header'])) {
                      echo $article['header'];
                  } ?>" />
       </section>
        <section class="field">
           <label for="description">Rubrique: </label>
           <input type="text" name="description" 
                  value="<?php
                  if(isset($article['description'])) { 
                      echo $article['description'];                      
                      }?>" />
       </section>

        <textarea id="content" name="content" rows="10" cols="80">
            <?php
            if(isset($article['content'])) {
                echo $article['content'];
            } else {
                echo 'Tapez le texte de l\'article ici';                    
            }
            ?>                    
        </textarea>
        <script>
<<<<<<< HEAD
            CKEDITOR.replace( 'content', {language: 'fr'} );
=======
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            //CKEDITOR.replace( 'content' );
            $('content').ckeditor({language: 'fr'});
>>>>>>> 814a777df16ce3e63561d418fe7d8ddaff5aee69
        </script>
        <?php 
        if(isset($article)):
            $submit = 'Modifier'; 
            else : $submit = 'Ajouter';
            endif;
        ?>
        <input type="hidden" value="<?php if(isset($_GET['theme_id'])) {
            echo $_GET['theme_id']; 
        }?>">
        <button type="submit"><?php echo $submit;?></button>
</form>