<?php

require_once 'config/db.php';
require_once 'models/mgoods.php';
$model = new Model();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add_page':
            $enterprises = $model->getEnterprisesList();
            require_once 'views/goods/vgoods_add.php';
            break;
        case 'add':
            if (isset($_POST)) {
                if ($model->addGood($_POST)) {
                    header('Location: index.php?page=goods');
                }
            }
            break;
        case 'edit_page':
            if (isset($_GET['id'])) {
                $enterprises = $model->getEnterprisesList();
                $good = $model->getGoodById($_GET['id']);
                require_once 'views/goods/vgoods_edit.php';
            }
            break;
        case 'edit':
            if (isset($_POST)) {
                if ($model->updateGood($_POST)) {
                    header('Location: index.php?page=goods');
                }
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $model->deleteGood($_GET['id']);
                header('Location: index.php?page=goods');
            }
            break;
        default:
            break;
    }
} else {
    $goods = $model->getAllGoods();
    require 'views/goods/vgoods_list.php';
}
?>
