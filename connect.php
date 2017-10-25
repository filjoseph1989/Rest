<?php
require_once "vendor/autoload.php";
require_once "Monitor.php";

$monitor = \Rest\Monitor::start();

$monitor->login();
d($monitor->searchVolumeRegions());
// d($monitor->logout());
// foreach ($monitor->sites() as $key => $user) {
//   $user = (object)$user;
//   d($monitor->stats($user->id));
//   d($monitor->keywords($user->id));
// }
