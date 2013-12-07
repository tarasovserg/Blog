<div id="auth_block"><?php if(isset($_COOKIE['isauth'])): ?>
  <form method="post" ><input type="submit" name="exit" class="botton" value="Выход" /></form>
  <?php else: ?>
  <form method="post" class="form1">
    <label>Логин: </label><input type="text" name="login" /><br />
    <label>Пароль: </label><input type="password" name="pass" /><br />
    <?php echo @$message; ?><input class="botton" type="submit" value="Вход" />
  </form>
  <?php endif; ?>
</div>