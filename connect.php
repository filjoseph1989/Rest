<?php

require_once "pdohelper/library/db.php";
require_once "vendor/autoload.php";
require_once "Monitor.php";

$monitor = \Rest\Monitor::start();
$databse = new \Library\DB;

$databse->Connect('mysql', 'monitorbiz', 'root', '', 'localhost');
$data = [
	'site_id'                => "1",
	'site_group_id'          => "2",
	'website_group_id'       => "3",
	'name'                   => "sample",
	'title'                  => "sample title",
	'today_avg_position'     => "1",
	'yesterday_avg_position' => "2",
	'total_up'               => "5",
	'total_down'             => "6",
	'keys_count'             => "7",
	'process'                => "1",
];
$databse->Insert('sites', $data, $query = '');
// d($databse->db); exit;

// $monitor->login();
//
// d($monitor->searchEngines());
// d($monitor->sites());
