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
     * Returns all data from the specified table.
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
     * Finds an entry in the specified table by id.
     *
     * @param integer $id Entry identifier.
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

    /**
     * Checks if an entry has been previously added.
     *
     * @return bool
     */
    public function isNew(): bool
    {
        return null === $this->id;
    }

    /**
     * Writes an entry to the database.
     *
     * @return bool
     */
    public function insert(): bool
    {
        if (!$this->isNew()) {
            return false;
        }

        $properties = get_object_vars($this);

        $cols  = [];
        $binds = [];
        $data  = [];

        foreach ($properties as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $binds[] = ':' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $cols) . ') VALUES (' . implode(', ', $binds) . ')';

        $db = new Db();
        $db->execute($sql, $data);

        $this->id = $db->getLastInsertId();

        return true;
    }

    /**
     * Updates the data in the specified table by id.
     *
     * @return boolean
     */
    public function update(): bool
    {
        if ($this->isNew()) {
            return false;
        }

        $properties = get_object_vars($this);

        $colsAndBinds = [];
        $data = [];

        foreach ($properties as $name => $value) {
            $data[':' . $name] = $value;

            if ('id' === $name) {
                continue;
            }
            $colsAndBinds[] = $name . '=:' . $name;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $colsAndBinds) . ' WHERE ' . static::TABLE . '.id=:id';

        $db = new Db();

        return $db->execute($sql, $data);
    }

    /**
     * Deletes an entry in the specified table by id.
     *
     * @return boolean
     */
    public function delete(): bool
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE ' . static::TABLE . '.id=:id';
        $params = [':id' => $this->id];

        $db = new Db();

        return $db->execute($sql, $params);
    }

    /**
     * Updates or creates an entry in the specified table.
     *
     * @return boolean
     */
    public function save(): bool
    {
        return $this->isNew() ? $this->insert() : $this->update();
    }
}