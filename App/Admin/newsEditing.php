<?php

use App\Models\News;

require __DIR__ . '/../../autoload.php';

if (isset($_GET['id']) && false !== News::findById((int)$_GET['id'])) {
    $news = News::findById((int)$_GET['id']);
}

include __DIR__ . '/../../templates/newsEditing.php';
