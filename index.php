<?php

use App\Models\Article;
use App\Models\Person;

require __DIR__ . '/autoload.php';

$person = Person::findById(18);

var_dump($person->delete());

//include __DIR__ . '/templates/index.php';