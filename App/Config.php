<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    public $data = [];

    public function __construct()
    {
        $this->data = require __DIR__ . '/DbConfig.php';
    }
}
