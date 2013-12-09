
<div id="reg_block">
    <?php

    if(isset($_SESSION['reg_errors'])) {
        foreach($_SESSION['reg_errors'] as $key=>$value) {
            echo $value .'<br>';
        }
    }
    ?>
  <form method="post" action="?page=registration&action=add">
      <p>
        <label>Login: </label>
        <input type="text" name="login" id="login" value =""/>
      </p>
      <p>
        <label>E-mail: </label>
        <input type="text" name="email" id="email" />
      </p>
      <p>
        <label>Mot de passe: </label>
        <input type="password" name="pass" id ="pass"/>
      </p>
      <p>
        <label>Confirmation de mot de passe: </label>
        <input type="password" name="repass" id="repass" />
      </p>
    
    <input  type="submit" value="Enregistrer" id="reg_button" />
  </form>
</div>

