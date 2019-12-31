<?php

use App\Models\News;
use App\View;

require __DIR__ . '/autoload.php';

$news = News::findById($_GET['id']);

$view = new View();
$view->news = $news;

$view->display(__DIR__ . '/templates/news.php');
