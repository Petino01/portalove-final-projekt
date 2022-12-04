<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

if (isset($_POST['submit'])) {
    $insert = $db->insertZamestnanec($_POST['meno_zamestnanec'], $_POST['popis_zamestnanec'], $_POST['fotka']);

    if($insert) {
        header('Location: zamestnanci.php');
    } else {
        echo "FATAL ERROR!";
    }
} else {
    header('Location: zamestnanci.php');
}

?>
