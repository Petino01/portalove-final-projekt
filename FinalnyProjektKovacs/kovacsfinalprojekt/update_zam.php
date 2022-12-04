<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

if (isset($_POST['submit'])) {
    $update = $db->updateZamestnanec($_POST['id'], $_POST['meno_zamestnanec'], $_POST['popis_zamestnanec'], $_POST['fotka']);

    if($update) {
        header('Location: zamestnanci.php');
    } else {
        echo "FATAL ERROR!";
    }
} else {
    header('Location: zamestnanci.php');
}

?>
