 <nav id ="header">
     <div id="navigation">
        <ul>
            <li><a href="?page=theme&action=showall">All articles</a></li>
                <?php 
                    require_once 'config/db.php';
                    require_once 'models/mthemes.php';
                    if (isset($_SESSION['role']) 
                             && $_SESSION['role'] == 1) { ?>
                    <li><a href="?page=list&action=users_list">Users List</a></li>
                             <?php }
                    
                    $themesObj = new ThemesModel();
                    $themes = $themesObj->getAllThemesName();
                    
                    foreach ($themes as $key 
                    => $value) { ?>
                        <li><a href="?page=themes&action=filter&id=<?php echo $value['id'] ?>">
                            <?php echo $value['name'] ?></a></li>
                    <?php }
                    
                ?>
                 <li><a href="?page=about&action=authors">Les auteurs</a></li>
                        
        </ul>
     </div>
    
 </nav>
