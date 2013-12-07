<?php

require_once 'config/db.php';
require_once 'functions.php';
require_once 'models/muser.php';
$model = new Model();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'authorization':
            require_once 'views/user/vauthorization.php';
            break;
        case 'registration':
            require_once 'views/user/vregistration.html';
            break;
        case 'add':
            
            if (isset($_POST)) {
                $data = array();
                
                $data['login'] = $_POST['login'];
                $data['email'] = $_POST['email'];
                $data['password'] = md5($_POST['pass']);
                $data['repass'] = md5($_POST['repass']);
                $is_valid = validate($data);
                if ($is_valid === true) {
                    if($model->addUser($data)) {
                        header('Location: index.php');
                    } else {
                        echo 'Error';
                    }
                } else {
                    for($i=0;$i<count($is_valid);$i++){
                        echo $is_valid[$i] . '<br>';
                    }
//                    header('Location:'.$_SERVER['PHP_SELF']);
                } 
            break;            
            }
            case 'users_list':
                $users = $model->getAllUsers();
                require_once 'views/user/users_list.php';
                break;
        case 'edit_user':
            if (isset($_GET['id'])) {
                $user = $model->getUserById($_GET['id']);
                require_once 'views/user/vuser_edit.php';        
            }
        break;
        case 'edit':
            if (isset($_POST)) {
                if ($model->updateUser($_POST)) {
                    header('Location: index.php?page=list&action=users_list');
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
        default:
            break;
    }
}
//else {
//    $enterprise = $model->getAllEnterprises();
//    require 'views/enterprise/venterprise_list.php';
//}

