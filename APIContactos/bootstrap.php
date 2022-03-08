<?php 

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('DBHOST', $_ENV['DBHOST']);
define('USER',  $_ENV['DBUSER']);
define('PASS',  $_ENV['DBPASS']);
define('BDNAME',  $_ENV['DBNAME']);
define('PORT',  $_ENV['DBPORT']);


?>