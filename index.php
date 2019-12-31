<?php

use App\Models\News;
use App\View;

require __DIR__ . '/autoload.php';

$lastThreeNews = News::findLastThree();

$view = new View();
$view->lastThreeNews = $lastThreeNews;

$view->display(__DIR__ . '/templates/index.php');