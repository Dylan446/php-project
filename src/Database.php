<?php
/**
 * Created by PhpStorm.
 * User: dylan
 * Date: 14/12/2017
 * Time: 00:41
 */

namespace Itb;


class Database
{
    const DB_NAME = 'webusers';
    const DB_USER = 'admin';
    const DB_PASS = 'admin';
    const DB_HOST = 'localhost:3306';

    private $connection;

    public function getConnection()
    {
        return $this->connection;
    }

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST;
        try {
            $this->connection = new \PDO(
                $dsn,
                self::DB_USER,
                self::DB_PASS
            );
        } catch (\Exception $e){
            print '<pre>';
            var_dump($e);
        }
    }
