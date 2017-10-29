<?php
require_once "pdohelper/library/db.php";

$databse = new \Library\DB;

# Establish connection
if ($_SERVER['SERVER_ADDR'] != '127.0.0.1') {
  $databse->Connect('mysql', 'monitorb_db', 'monitorbiz', 'Monit7086!', 'localhost');
} else {
  $databse->Connect('mysql', 'monitor', 'root', '', 'localhost');
}
