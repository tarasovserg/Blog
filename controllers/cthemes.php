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
        default:
            break;
    }
}
?>
