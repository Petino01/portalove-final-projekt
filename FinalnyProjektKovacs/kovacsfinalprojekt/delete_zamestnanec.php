<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

if (isset($_GET['id'])) {
    $delete = $db->deleteZamestnanec($_GET['id']);

    if ($delete) {
        header('Location: zamestnanci.php');
    } else {
        echo "FATAL ERROR!";
    }
} else {
    header('Location: zamestnanci.php');
}

?>
