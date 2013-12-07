<?php

require_once 'config/db.php';
require_once 'models/menterprise.php';
$model = new Model();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add_page':
            require_once 'views/enterprise/venterprise_add.php';
            break;
        case 'add':
            if (isset($_POST)) {
                if ($model->addEnterprise($_POST)) {
                    header('Location: index.php?page=enterprise');
                }
            }
            break;
        case 'edit_page':
            if (isset($_GET['id'])) {
                $enterprise = $model->getEnterprisesById($_GET['id']);
                require_once 'views/enterprise/venterprise_edit.php';
            }
            break;
        case 'edit':
            if (isset($_POST)) {
                if ($model->updateEnterprise($_POST)) {
                    header('Location: index.php?page=enterprise');
                }
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $model->deleteEnterprise($_GET['id']);
                header('Location: index.php?page=enterprise');
            }
            break;
        default:
            break;
    }
} else {
    $enterprise = $model->getAllEnterprises();
    require 'views/enterprise/venterprise_list.php';
}
?>
