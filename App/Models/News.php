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
