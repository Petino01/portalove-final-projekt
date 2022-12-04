<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

if (isset($_POST['submit'])) {
    $update = $db->updateDovolenka($_POST['id'], $_POST['dovolenka_nazov'], $_POST['datum'], $_POST['dovolenka_popis'], $_POST['obrazok'], $_POST['atribut_hodnota1'], $_POST['atribut_hodnota2']);

    if($update) {
        header('Location: admin.php');
    } else {
        echo "FATAL ERROR!";
    }
} else {
    header('Location: admin.php');
}

?>
