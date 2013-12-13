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
        case 'themes_list':
            $themes = $modelThemes->getThemesList();
            require_once 'views/themes/themes_list.php';
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $modelThemes->deleteTheme($_GET['id']);
                header('Location: index.php?page=theme&action=themes_list');
            }
        break;
        case 'edit_theme':  
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $theme =  $modelThemes->getThemeById($id);
                $send_to = "edit_theme&id=$id";
            }
            if(isset($_POST['name']) || isset($_POST['description'])) {
                if(empty($_POST['name'])&&empty($_POST['description'])) {
                    echo 'Tous les champs sont obligatoires';
                } else {
                    $data = array();
                    $data['id'] = $_POST['id'];
                    $data['name'] = clean($_POST['name']);
                    $data['description'] = clean($_POST['description']);
                    if($modelThemes->updateTheme($data)) {
                        header('Location: index.php?page=theme&action=filter&id='.$id);
                    } else {
                        echo 'Sujet n\'est pas modifié';
                    }
                }
                
            }      
            require_once 'views/themes/add_theme.php';
        break;
        case 'readsolo':
            require_once 'views/themes/solo_article.php';
            break;
        case 'filter':
            $theme = $modelThemes->getThemeById(intval($_GET['id']));
            $articles = $modelThemes->getArticlesForTheme(intval($_GET['id']));    
            require_once 'views/themes/solo_theme.php';
            break;
        case 'add_theme':
            $send_to = 'add_theme';
            require_once 'views/themes/add_theme.php';
            if(isset($_POST['name']) || isset($_POST['description'])) {
                if(empty($_POST['name'])&&empty($_POST['description'])) {
                    echo 'Tous les champs sont obligatoires';
                } else {
                    $data = array();
                    $data['name'] = clean($_POST['name']);
                    $data['description'] = clean($_POST['description']);
                    $id = $modelThemes->addTheme($data);
                    if($id) {
                        header('Location: index.php?page=themes&action=filter&id='.$id);
                    } else {
                        echo 'Sujet n\'est pas ajouté';
                    }
                }
                
            }
            
            break;
            case 'cat':
                require_once 'javascript/ckeditor/cat.php';
            break;
            case 'add_article':
            $send_to = 'add_article';
            require_once 'views/themes/add_article.php';
            if(isset($_POST)) {
                if(!empty($_POST['header']) && !empty($_POST['description']) &&
                        !empty($_POST['content'])) {
                    $data['creator'] = $_SESSION['user_id'];
                    $data['date'] = date("Y-m-d H:i:s");        
                    $data['theme_id'] = $_GET['theme_id'];
                    $data['header'] = $_POST['header'];
                    $data['description'] = $_POST['description'];
                    $data['content'] = $_POST['content'];
                    $article_id = $modelThemes->addArticle($data);
                    if($article_id) {
                        header('Location: index.php?page=theme&action=readsolo&id='.
                                (int)$article_id);
                    }   else {
                        echo 'L\'article n\'est pas ajouté';
                    }
                } else {
                    echo 'Tous les champs sont obligatoires';
                }
            }
            break;
            case 'edit_article':
            $send_to = 'edit_article';
            $article = $modelThemes->getArticleById($_GET['id']);
            require_once 'views/themes/add_article.php';
            
            if(isset($_POST)) {
                if(!empty($_POST['header']) && !empty($_POST['description']) &&
                        !empty($_POST['content'])) {
                    $data['creator'] = $_SESSION['user_id'];
                    $data['id'] = $_GET['id'];
                    $data['date'] = date("Y-m-d H:i:s");        
                    $data['theme_id'] = $_GET['theme_id'];
                    $data['header'] = $_POST['header'];
                    $data['description'] = $_POST['description'];
                    $data['content'] = $_POST['content'];
                    $article_id = $modelThemes->updateArticle($data);
                    if($article_id) {
                        header('Location: index.php?page=theme&action=readsolo&id='.
                                (int)$article_id);
                    }   else {
                        echo 'L\'article n\'est pas modifié';
                    }
                } else {
                    echo 'Tous les champs sont obligatoires';
                }
            }
            break;
        case 'delete_article':
            if (isset($_GET['id'])&& isset($_GET['theme_id'])) {
                $modelThemes->deleteArticle($_GET['id']);
                header('Location: index.php?page=theme&action=filter&id='.$_GET['theme_id']);
            }
        break;
        case 'add_comment':
            $send_to = 'add_comment';
            require_once 'views/themes/add_comment.php';
            if(isset($_POST['content'])) {
                if(empty($_POST['content'])) {
                    echo 'Tous les champs sont obligatoires';
                } else {
                    $data = array();
                    $data['content'] = clean($_POST['content']);
                    $data['article_id'] = clean($_GET['article_id']);
                    $data['date'] = date("Y-m-d H:i:s");
                    $data['author_id'] = $_SESSION['user_id'];
                    $id = $modelThemes->addComment($data);
                    if($id) {
                        header('Location: index.php?page=theme&action=readsolo&id='.$_GET['article_id']);
                    } else {
                        echo 'Comment n\'est pas ajouté';
                    }
                }
                
            }
            break;
            case 'delete_comment':                
            if (isset($_GET['comment_id'])&& isset($_GET['article_id'])) {
                $modelThemes->deleteComment($_GET['comment_id']);
                header('Location: index.php?page=theme&action=readsolo&id='.$_GET['article_id']);
            }
        break;
        default:
            break;
    }
}
?>
