<?php

namespace App;

/**
 * Class Db
 */
class Db
{
    protected $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $config = Config::getInstance();
        $data = $config->data;
        $this->dbh = new \PDO(
            'mysql:host=' . $data['db']['host'] . ';dbname=' . $data['db']['dbname'],
            $data['db']['username'],
            $data['db']['password']
        );
    }

    /**
     * Queries data from a database.
     *
     * @param string $sql    Sql query.
     * @param string $class  The class to which the sql query applies.
     * @param array  $params Query params.
     *
     * @return array
     */
    public function query($sql, $class, $params = []): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * Performs queries in the database.
     *
     * @param string $query  Sql query.
     * @param array  $params Query params.
     *
     * @return bool
     */
    public function execute($query, $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return true === $sth->execute($params);
    }

    /**
     * Get last insert id.
     *
     * @return string
     */
    public function getLastInsertId(): string
    {
        return $this->dbh->lastInsertId();
    }
}
