<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/models/article/article.php');

    $configPath = $_SERVER['DOCUMENT_ROOT'] . ((isset($_POST['filter']) || (isset($_SESSION['user']['admin']) && $_SESSION['user']['admin'])) ?
            '/views/list_view/config/config.php': '/views/user_view/config/config.php');
    $model = new Article($configPath);
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $articles = $model->getArticlesPerPage($page);
    $images = $model->getImagesPerPage($articles);
    $totalPages = ceil($model->getTotalPages());

    header('Content-Type: text/html; charset=utf-8');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/views/view.phtml');