<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';
require __DIR__ . '/functions.php';

if (isset($_POST['newsHeadline'], $_POST['newsDescription'])) {
    if (empty($_POST['newsHeadline']) || empty($_POST['newsDescription'])) {
        echo 'Fill in all the fields!';
    } else {
        editNews($_POST['newsHeadline'], $_POST['newsDescription'], $_GET['id'], $_POST['author']);
    }
}

if (isset($_GET['delete'], $_GET['id'])) {
    deleteNews($_GET['id']);
}

$news = News::findAll();

include __DIR__ . '/../../templates/admin.php';
