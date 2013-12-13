 <nav id ="header">
     <div id="navigation">
        <ul>
            <li><a href="?page=theme&action=showall">Tous les articles</a></li>
                <?php 
                    require_once 'config/db.php';
                    require_once 'models/mthemes.php';
                    if (isset($_SESSION['role']) 
                             && $_SESSION['role'] == 1) { ?>
                    <li><a href="?page=list&action=users_list">Liste d'utilisateurs</a></li>
                             <?php }?>
                    <li><a href="?page=theme&action=themes_list">Liste des thèmes</a></li>

<?php   
                    if(isset($_SESSION['user_id'])) {?>
                        <li><a href="?page=profile&action=show_profile">Profil</a><li>
                    <?php } ?>
                 <li><a href="?page=about&action=authors">Les auteurs</a></li>
                
        </ul>
     </div>
    <a href="?page=theme&action=cat" id="cat">C</a>  
 </nav>
