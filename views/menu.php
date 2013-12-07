 <nav id ="header">
     <div id="navigation">
        <ul>
                <?php 
                    require_once 'controllers/cthemes.php';
                    if (isset($_SESSION['role']) 
                             && $_SESSION['role'] == 'role.administrator') { ?>
                    <li><a href="?page=list&action=users_list">Users List</a></li>
                             <?php }
                             
                    $themes = $modelThemes->getAllThemesName();
                    
                    foreach ($themes as $key => $value) { ?>
                        <li><a href="?page=themes&id=<?php echo $value['id'] ?>">
                            <?php echo $value['name'] ?></a></li>
                    <?php }
                    
                    
                ?>
                 <li><a href="about.html">About</a></li>
                        
        </ul>
     </div>
    
 </nav>
