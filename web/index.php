<?php
require_once __DIR__ . '/../vendor/autoload.php';

session_start();

use Itb\WebApplication;
use Itb\Database;

$app = new WebApplication();
$app->run();


$db = new Database();
$connection = $db->getConnection();


if(null != $connection) {
    print 'success - we connected to the database';
} else {
    die('there was an error connecting to the database');
}