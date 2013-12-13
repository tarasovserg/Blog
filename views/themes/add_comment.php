<script src="javascript/ckeditor/ckeditor.js"></script>
<?php 
$action = $send_to;
if(isset($_GET['article_id'])) {
    $action .= '&article_id='. $_GET['article_id'];
}
?>
<form action="?page=theme&action=<?php echo $action;?>" 
      method="POST">
    <section class ="article" >
       <section class="field">
           <label for="content">Commentaire: </label>
           <textarea id="content" name="content" rows="10" cols="80" 
                     placeholder="Tapez le commentaire ici"></textarea>
       </section>

        <input type="hidden" value="<?php if(isset($_GET['article_id'])) {
            echo $_GET['article_id']; 
        }?>">
        <button type="submit">Ajouter</button>
    </section>
</form>