<?php

use App\Models\News;

require __DIR__ . '/autoload.php';

$lastThreeNews = News::findLastThree();

include __DIR__ . '/templates/index.php';
