<?php
require_once "vendor/autoload.php";
require_once "pdohelper/library/db.php";
require_once "helpers/functions.php";
require_once "monitor/Monitor.php";
require_once "monitor/SearchEngine.php";

/**
 * API request
 * @var $monitor
 */
$monitor = new \Rest\Monitor\Monitor;
$monitor->login();

/**
 * configuration
 * @var Dotenv
 */
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

# Load database
$database = new \Library\DB;

# Connection
$database->Connect(
  getenv('DB_CONNECTION'),
  getenv('DB_DATABASE'),
  getenv('DB_USERNAME'),
  getenv('DB_PASSWORD'),
  getenv('DB_HOST')
);

$se     = new \Rest\Monitor\SearchEngine($monitor, $database);
$result = $se->store();
d($result);
exit;

$regions = $otherRegions[0];
array_shift($otherRegions);

if (is_array($otherRegions)) {
  foreach ($otherRegions as $key => $otherRegion) {
    if ($otherRegion === $regions) {
      echo "yes";
    } else {
      echo "Update me, since you have unequal array";
    }
  }
}

exit;

// $data = getSites($monitor->sites());
// extract($data);
// d($sites, $search_engines);

// foreach ($sites as $key => $site) {
// 	$result = $databse->Insert('sites', $site);
// 	d($result);
// }
