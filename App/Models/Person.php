<?php

namespace App\Models;

use App\Model;

/**
 * Class Person
 */
class Person extends Model
{
    protected const TABLE = 'person';
    public $name;
    public $age;

    /**
     * Get model name.
     *
     * @return string
     */
    public function getModelName(): string
    {
       return 'Persons';
    }
}
