
<div id="reg_block">
    <?php

    if(isset($_SESSION['reg_errors'])) {
        foreach($_SESSION['reg_errors'] as $key=>$value) {
            echo $value .'<br>';
        }
    }
    ?>
  <form method="post" action="?page=registration&action=add">
      <div class="field">
        <label for="login">Login: </label>
        <input type="text" name="login" id="login" value =""/>
      </div>
      <div class="field">
        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email" />
      </div>
      <div class="field">
        <label for="pass">Mot de passe: </label>
        <input type="password" name="pass" id ="pass"/>
      </div>
      <div class="field">
        <label for="repass">Confirmation de mot de passe: </label>
        <input type="password" name="repass" id="repass" />
      </div>
    
    <input  type="submit" value="Enregistrer" id="reg_button" />
  </form>
</div>

