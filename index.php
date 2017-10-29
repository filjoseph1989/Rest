<?php
require_once "vendor/autoload.php";
// require_once "config.php";
require_once "helpers/functions.php";
require_once "Monitor.php";

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

d(getenv('APP_NAME'));
d($_ENV);
d($_SERVER);
// $monitor = \Rest\Monitor::start();
// $monitor->login();
//
// $data = getSites($monitor->sites());
//
// extract($data);
// // d($sites, $search_engines);
//
// foreach ($sites as $key => $site) {
// 	$result = $databse->Insert('sites', $site);
// 	d($result);
// }
