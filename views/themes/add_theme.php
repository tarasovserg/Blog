<div id="themes_block"><?php if(isset($_SESSION['user_id'])
                                    && ($_SESSION['role'])==1): ?>
    <form method="post" class="form1" action="?page=theme&action=<?php echo $send_to; ?>">
    <div class="field">
        <label for="name">Le nom du thème: </label>
        <input type="text" name="name" value="
            <?php if(isset($theme['name'])): echo $theme['name']; 
            endif; ?>"/>
    </div>
    <div class="field">
        <label for="description">Description: </label>
        <textarea name="description">
            <?php if(isset($theme['description'])): echo $theme['description']; 
            endif;?></textarea>
    </div>
        <?php
            if(isset($theme['name'])):
            $submit = 'Modifier'; 
            else : $submit = 'Ajouter';
            endif;
            if(isset($_GET['id'])): $id = $_GET['id'];
            else: $id = "";
            endif;
        ?>
    <p><?php echo @$message; ?></p><input type="submit" value=<?php echo $submit;?> />
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  </form>
  
  <?php else:
    ?>
  <h1>Vous ne pouvez pas ajouter thème</h1>
  <?php endif; ?>
</div>