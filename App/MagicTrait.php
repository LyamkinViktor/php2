<?php

namespace App;

/**
 * Trait MagicTrait
 * @package App
 */
trait MagicTrait
{
    /**
     * Value of property.
     *
     * @var array
     */
    private $data = [];

    /**
     * Sets the value to an arbitrary property of the object.
     *
     * @param string $name  Name of property.
     * @param mixed  $value Value of property.
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * Gets an arbitrary property of the object.
     *
     * @param string $name Name of property.
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * Checks for the existence of an arbitrary property of an object.
     *
     * @param string $name Name of property.
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}
