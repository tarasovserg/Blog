<?php

require_once 'config/db.php';
require_once 'functions.php';
require_once 'models/muser.php';
$model = new UserModel();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'authorization':
            require_once 'views/user/vauthorization.php';
            break;
        case 'authorize':
            if(!empty($_POST['login']) && !empty($_POST['pass'])){                
                $login = $_POST['login'];
                $password = md5($_POST['pass']);
                
                $user = $model->authorize($login, $password);
                if ($user['id']) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = (int) $user['role'];
                    header('Location: index.php');
                } else {
                    header('Location: index.php?page=authorization&action=authorization&result=1');
                }
            } else {
                header('Location: index.php?page=authorization&action=authorization&result=2');
            }
            break;
        case 'registration':
            require_once 'views/user/vregistration.php';
            break;
        case 'exit':
            session_destroy();
            header('Location: index.php');
            break;
        case 'add':
            unset($_SESSION['reg_errors']);
            if (isset($_POST)) {
                $data = array();
                
                $data['login'] = $_POST['login'];
                $data['email'] = $_POST['email'];
                $data['password'] = md5($_POST['pass']);
                $data['repass'] = md5($_POST['repass']);
                $data['action'] = 'add';
                $is_valid = validate($data);
                if ($is_valid === true) {
                    if($model->addUser($data)) {                   
                        header('Location: index.php?page=authorization&action=authorization&result=3');
                    } else {
                        $_SESSION['reg_errors'] = 'Erreur de base de données.
                            L\'utilisateur n\'a pas été ajouté.';
                        header('Location: index.php?page=registration&action=registration');
                    }
                } else {
                    for($i=0;$i<count($is_valid);$i++){
                        $_SESSION['reg_errors'][$i] = $is_valid[$i] . '<br>';
                    }                    
                   header('Location:index.php?page=registration&action=registration');
                } 
            break;            
            }
        case 'users_list':
                $users = $model->getAllUsers();
                require_once 'views/user/users_list.php';
                break;
        case 'show_profile':
            $user = $model->getUserById($_SESSION['user_id']);
            require_once 'views/user/profile.php';
            break;
        case 'edit_user':
            if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
                $user = $model->getUserById($_GET['id']);
                require_once 'views/user/vuser_edit.php';        
            }
        break;
        case 'edit':
            unset($_SESSION['reg_errors']);
            if (isset($_POST)) {              
                $data = array();
                $data['id']=$_POST['id'];
                $data['login'] = $_POST['login'];
                $data['email'] = $_POST['email'];
                $data['role'] = $_POST['role']?1:0;
//                $data['oldpassword'] = md5($_POST['oldpass']);
                $data['password'] = md5($_POST['pass']);
                $data['repass'] = md5($_POST['repass']);
                $data['action'] = 'edit';
                $is_valid = validate($data);
                if ($is_valid === true) {
                    if ($model->updateUser($data)) {
                        $_SESSION['message'] = 'Données a été modifié avec succès';
                        header('Location: index.php?page=list&action=users_list');
                        
                    } else {
                        $_SESSION['reg_errors'] = 'Erreur de base de données.
                            L\'utilisateur n\'a pas été modifié.';
                        header('Location: index.php?page=list&?page=list&action=edit_user&id='.$data['id']);
                    }
                }
                 else {
                    for($i=0;$i<count($is_valid);$i++){
                        $_SESSION['reg_errors'][$i] = $is_valid[$i] . '<br>';
                        header('Location: index.php?page=list&?page=list&action=edit_user&id='.$data['id']);
                    }                    
                }
            }
            
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                echo $_GET['id'];
                $model->deleteUser($_GET['id']);
                header('Location: index.php?page=list&action=users_list');
            }
            break;
            case 'authors':
                require_once 'views/about.php';
                break;
        default:
            break;
    }
}


