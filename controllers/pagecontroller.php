<?php
            if (isset($_GET['page'])) {
                $page_name = $_GET['page'];
                switch ($page_name) {
                    case 'theme' :
                        require 'controllers/cthemes.php';
                        break;
                    case 'authorization':
                    case 'about':
                    case 'list':
                    case 'registration':
                    case 'profile':
                        require 'controllers/cuser.php';
                        break;                                           
                    default :
                        break;
                }                 
            } else {
                header('Location: index.php?page=theme&action=showall');
            }
            ?>