<script src="javascript/checkStrength/checkStrength.js"></script>
<div id="reg_block">  
  <form method="post" action="?page=registration&action=edit">
      <div class="form_field">
        <label>Login: </label>
        <input type="text" name="login" id="login" value ="<?php echo $user['login']?>"/>
      </div>
      <div class="form_field">
        <label>E-mail: </label>
        <input type="text" name="email" id="email" value ="<?php echo $user['email']?>"/>
      </div>
      <div class="form_field">
        <label>Old Password: </label>
        <input type="password" name="old_pass" id ="old_pass"/>
      </div>
      <div class="form_field">
        <label>Password: </label>
        <input type="password" name="pass" id ="pass"/>
      </div>
      <div class="form_field">
        <label>Verification Password: </label>
        <input type="password" name="repass" id="repass" />
      </div>
     <input type="hidden" name="id" id="id" value ="<?php echo $user['id']?>"/>
    <input  type="submit" value="Submit" id="reg_button" />
  </form>
</div>
<script type="text/javascript">
    $('#pass').checkStrength();
</script>