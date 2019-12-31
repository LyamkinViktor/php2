<?php

namespace App\Models;

use App\Db;
use App\Model;

/**
 * Class News
 * @package App\Models
 */
class News extends Model
{
    protected const TABLE = 'news';
    public $article;
    public $author_id;

    /**
     * Get model name.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return 'Articles';
    }

    /**
     * Find last three news.
     *
     * @return array
     */
    public static function findLastThree(): array
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::TABLE . ' LIMIT 3';

        return $db->query($sql, self::class);
    }

    /**
     * Get the author of news.
     *
     * @param string $name Name of property.
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        if ('author' === $name) {
                $db = new Db();

                $sql = 'SELECT * FROM authors WHERE authors.id = :id';
                $author = $db->query($sql, Author::class, [':id' => $this->author_id]);

                return $author[0];
        }

        return null;
    }

    /**
     * Check the existence of the author of news.
     *
     * @param string $name Name of property.
     *
     * @return boolean
     */
    public function __isset($name)
    {
        return 'author' === $name && !empty($this->author_id);
    }
}
