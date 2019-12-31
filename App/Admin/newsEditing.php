<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';

$id = $_GET['id'];

if (isset($id) && false !== News::findById((int)$id)) {
    $news = News::findById((int)$id);
}

include __DIR__ . '/../../templates/newsEditing.php';
