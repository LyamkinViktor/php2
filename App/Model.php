<?php

namespace App;

use App\Models\Article;

/**
 * Class Model
 * @package App
 */
abstract class Model
{
    protected const TABLE = null;
    public $id;

    abstract public function getModelName();

    /**
     * Find all entities from db.
     *
     * @return array
     */
    public static function findAll(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE;

        return $db->query($sql, static::class);
    }

    /**
     * Find entity by id.
     *
     * @param integer $id Entity identifier.
     *
     * @return mixed
     */
    public static function findById(int $id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE ' . static::TABLE . '.id = ' . $id;

        $res = $db->query($sql, static::class);

        return empty($res[0]) ? false : $res[0];
    }
}