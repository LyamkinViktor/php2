<?php

namespace App\Models;

use App\Model;

/**
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    protected const TABLE = 'authors';
    public $name;

    /**
     * Get model name.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return 'Authors';
    }
}