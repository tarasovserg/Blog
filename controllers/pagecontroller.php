<?php
            if (isset($_GET['page'])) {
                $page_name = $_GET['page'];
                switch ($page_name) {
                    case 'theme' :
                        require 'controllers/cthemes.php';
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