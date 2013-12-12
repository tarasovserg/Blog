    <?php

    if(isset($_SESSION['reg_errors'])) {
        foreach($_SESSION['reg_errors'] as $key=>$value) {
            echo $value .'<br>';
        }
    }
    ?>
<div id="reg_block">  
  <form method="post" action="?page=registration&action=edit">
      <div class="field">
        <label for="login">Login: </label>
        <input type="text" name="login" id="login" value ="<?php echo $user['login']?>"/>
      </div>
      <div class="field">
        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email" value ="<?php echo $user['email']?>"/>
      </div>
      <div class="field">
        <label for="role">Admin rôle: </label>
        <?php if($user['role'] ==1) {
            $checked = 'checked';
        } else {
            $checked = '';
        } ?>
        <input type="checkbox" name="role" id="role" <?php echo $checked; ?> value="true"/>

      </div>
<!--      <div class="field">
        <label for="oldpass">Ancien mot de passe: </label>
        <input type="password" name="oldpass" id ="oldpass"/>
      </div>-->
      <div class="field">
        <label for="pass">Mot de passe: </label>
        <input type="password" name="pass" id ="pass"/>
      </div>
      <div class="field">
        <label for="repass">Confirmation de mot de passe: </label>
        <input type="password" name="repass" id="repass" />
      </div>
     <input type="hidden" name="id" id="id" value ="<?php echo $user['id']?>"/>
    <input  type="submit" value="Modifier" id="reg_button" />
  </form>
</div>

