<?php
/**
 * User: rmurray
 * Date: 9/25/2017
 * Time: 4:30 PM
 */
namespace common;

/**
 *
 */
class Dao {
    /** @var \PDO */
    private $dbh;

    /**
     * @throws \Exception
     */
    public function __construct() {
        try {
            $this->dbh = new \PDO('mysql:dbname=' . Config::DB_NAME . ';host=' . Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD);
        } catch (\PDOException $e) {
            throw new \Exception('Connection failed: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * @param string  $sql
     * @param mixed[] $bv
     *
     * @return \PDOStatement
     */
    public function execute($sql, $bv) {
        $sth = $this->dbh->prepare($sql);
        foreach ($bv as $key => $value) {
            $sth->bindValue($key, $value);
        }
        $sth->execute();

        return $sth;
    }
}