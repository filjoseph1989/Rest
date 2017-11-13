<?php
require_once "vendor/autoload.php";
require_once "helpers/functions.php";

use \Database\Db;
use \Monitor\Regions;
use \Monitor\SearchEngine;

/**
 * API request
 * @var $monitor
 */
$monitor = new \Monitor\Monitor;
$monitor->login();

/**
 * configuration
 * @var Dotenv
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

# Load database
$database = new Db;

# Connection
$database->Connect(
  getenv('DB_CONNECTION'),
  getenv('DB_DATABASE'),
  getenv('DB_USERNAME'),
  getenv('DB_PASSWORD'),
  getenv('DB_HOST')
);

$se      = new SearchEngine($monitor, $database);
$result  = $se->store();
$keys    = $se->getSearchEngineId();
$regions = $se->getRegions();

if ($regions === false) {
  echo "Need to update the list of regions";
}

echo "Successfully added the list of search engines <br>";

$regions = new Regions($regions, $database);
$regions->store();

echo "Successfully added the list of search engines regions <br>";
