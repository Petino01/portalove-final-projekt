<?php

include_once "db.php";

use finalprojekt\DB;

$db = new DB("localhost", "finalprojekt", "root", "", '');

global $db;

session_start();

?>
