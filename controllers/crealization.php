<?php

require_once 'config/db.php';
require_once 'models/mrealization.php';
$model = new Model();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add_page':
            $goods = $model->getGoodsList();
            require_once 'views/realization/vrealization_add.php';
            break;
        case 'add':
            if (isset($_POST)) {
                if ($model->addRealization($_POST)) {
                    header('Location: index.php?page=realization');
                }
            }
            break;
        case 'edit_page':
            if (isset($_GET['id'])) {
                $goods = $model->getGoodsList();
                $realization = $model->getRealizationById($_GET['id']);
                require_once 'views/realization/vrealization_edit.php';
            }
            break;
        case 'edit':
            if (isset($_POST)) {
                if ($model->updateRealization($_POST)) {
                    header('Location: index.php?page=realization');
                }
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $model->deleteRealization($_GET['id']);
                header('Location: index.php?page=realization');
            }
            break;
        default:
            break;
    }
} else {
    $realizations = $model->getAllRealizations();
    require 'views/realization/vrealization_list.php';
}
?>
