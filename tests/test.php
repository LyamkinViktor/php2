<?php

use App\Db;

require __DIR__ . '/../autoload.php';

$db = new Db();

$sql = 'INSERT INTO `person` (id, name, age) VALUE (null, \'Ivan\', 30)';
$insert = $db->execute($sql);
var_dump($insert); // boolean true

$sql = 'UPDATE `person` SET age = 42 WHERE person.name = \'Ivan\'';
$update = $db->execute($sql);
var_dump($update); // boolean true

$sql = 'DELETE FROM `person` WHERE person.name = \'Ivan\'';
$delete = $db->execute($sql);
var_dump($delete); // boolean true