    <?php

    if(isset($_SESSION['reg_errors'])) {
        foreach($_SESSION['reg_errors'] as $key=>$value) {
            echo $value .'<br>';
        }
    }
    ?>
<div id="reg_block">  
  <form method="post" action="?page=registration&action=edit">
      <p>
        <label>Login: </label>
        <input type="text" name="login" id="login" value ="<?php echo $user['login']?>"/>
      </p>
      <p>
        <label>E-mail: </label>
        <input type="text" name="email" id="email" value ="<?php echo $user['email']?>"/>
      </p>
      <p>
        <label>Admin rôle: </label>
        <?php if($user['role'] ==1) {
            $checked = 'checked';
        } else {
            $checked = '';
        } ?>
        <input type="checkbox" name="role" id="role" checked="<?php echo $checked ?>" value="true"/>

      </p>
      <p>
        <label>Ancien mot de passe: </label>
        <input type="password" name="oldpass" id ="oldpass"/>
      </p>
      <p>
        <label>Mot de passe: </label>
        <input type="password" name="pass" id ="pass"/>
      </p>
      <p>
        <label>Confirmation de mot de passe: </label>
        <input type="password" name="repass" id="repass" />
      </p>
     <input type="hidden" name="id" id="id" value ="<?php echo $user['id']?>"/>
    <input  type="submit" value="Modifier" id="reg_button" />
  </form>
    <?php 
echo '* rôle=1 administrateur, rôle=0 usager';
?>
</div>

