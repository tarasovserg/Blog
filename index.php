<?php
    require_once 'views/header.html';
    require 'views/menu.html';
    require_once 'views/auth.html';
?>

        <div id="middle">
            <?php
            if (isset($_GET['page'])) {
                $page_name = $_GET['page'];
                switch ($page_name) {
                    case 'enterprise':
                        require 'controllers/centerprise.php';
                        break;
                    case 'goods':
                        require 'controllers/cgoods.php';
                        break;
                    case 'realization':
                        require 'controllers/crealization.php';
                        break;
                    case 'authorization':
                    case 'list':
                    case 'registration':
                        require 'controllers/cuser.php';
                        break;                                           
                    default :
                        break;
                }
            }
            ?>
        </div>
    </body>
</html>
