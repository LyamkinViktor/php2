<?php

namespace App\Models;

use App\Db;
use App\Model;

/**
 * Class Article
 * @package App\Models
 */
class Article extends Model
{
    protected const TABLE = 'news';
    public $note;

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
}
