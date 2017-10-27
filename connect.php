<?php

require_once "pdohelper/library/db.php";
require_once "vendor/autoload.php";
require_once "Monitor.php";
require_once "helpers/functions.php";

$monitor = \Rest\Monitor::start();
$databse = new \Library\DB;

$databse->Connect('mysql', 'monitorbiz', 'root', '', 'localhost');
$monitor->login();
$data = getSites($monitor->sites());

extract($data);
// d($sites, $search_engines);

foreach ($sites as $key => $site) {
	$result = $databse->Insert('sites', $site);
	d($result);
}
