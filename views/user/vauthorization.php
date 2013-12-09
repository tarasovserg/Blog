<?php     
    if(isset($_GET['result'])){
        switch($_GET['result']){
            case 1:
                $message = 'Login ou mot de passe incorrect';
                break;
            case 2:
                $message = 'Entrez les données';
                break;
            case 3: 
                $message = 'Inscription réussie. S\'il vous plaît, autoriser.';
                break;
            default :
                $message = '';
        }  
    }
?>
<div id="auth_block"><?php if(isset($_SESSION['user_id'])): ?>
  <form method="post" ><input type="submit" name="exit" value="Sortie" /></form>
  <?php else:
    ?>
  <form method="post" class="form1" action="?page=authorization&action=authorize">
    <div class="field">
        <label for="login">Login: </label>
        <input type="text" name="login" />
    </div>
    <div class="field">
        <label for="pass">Mot de passe: </label>
        <input type="password" name="pass" />
    </div>
    <p><?php echo @$message; ?></p><input type="submit" value="Entrée" />
  </form>
  <?php endif; ?>
</div>