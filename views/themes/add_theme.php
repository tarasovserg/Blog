<div id="themes_block"><?php if(isset($_SESSION['user_id'])
                                    && ($_SESSION['role'])==1): ?>
    <form method="post" class="form1" action="?page=theme&action=add_theme">
    <div class="field">
        <label for="name">Le nom du thème: </label>
        <input type="text" name="name" />
    </div>
    <div class="field">
        <label for="description">Description: </label>
        <textarea name="description"></textarea>
    </div>
    <p><?php echo @$message; ?></p><input type="submit" value="Ajouter" />
  </form>
  
  <?php else:
    ?>
  <h1>Vous ne pouvez pas ajouter thème</h1>
  <?php endif; ?>
</div>