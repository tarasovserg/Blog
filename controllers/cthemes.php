<?php

require_once 'config/db.php';
require_once 'functions.php';
require_once 'models/mthemes.php';
$modelThemes = new ThemesModel();
if (isset($_GET['action'])) {
    
    $action = $_GET['action'];
    switch ($action) {
        case 'showall':
            require_once 'views/themes/all_articles.php';
            break;
        case 'readsolo':
            require_once 'views/themes/solo_article.php';
            break;
        case 'add_theme':
            require_once 'views/themes/add_theme.php';
            if(isset($_POST['name']) || isset($_POST['description'])) {
                if(empty($_POST['name'])&&empty($_POST['description'])) {
                    echo 'Tous les champs sont obligatoires';
                } else {
                    $id = $modelThemes->addTheme($_POST);
                    if($id) {
                        header('Location: index.php?page=themes&action=filter&id='.$id);
                    } else {
                        echo 'Sujet n\'est pas ajouté';
                    }
                }
                
            }
            break;
        default:
            break;
    }
}
?>
