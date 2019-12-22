<?php

namespace App;

/**
 * Class Config
 * @package App
 */
class Config
{
    private static $instance;
    public $data;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        $this->data = require __DIR__ . '/DbConfig.php';
    }

    /**
     * Get config instance.
     *
     * @return Config
     */
    public static  function getInstance(): Config
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
