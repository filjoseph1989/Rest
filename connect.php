<?php
require_once "vendor/autoload.php";

require_once "Monitor.php";

$monitor = \Rest\Monitor::start();
d($monitor->login());
