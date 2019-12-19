<?php

require __DIR__ . '/autoload.php';

$lastThreeNews = \App\Models\Article::findLastThree();

include __DIR__ . '/templates/index.php';