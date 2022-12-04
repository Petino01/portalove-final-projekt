<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

$zamestnanec = $db->getZamestnanec($_GET['id'])[0];

?>

<style>

    input {
        background-color: lightgray;
        border-radius: 5px;
        border: 2px solid gray;
    }

    textarea {
        background-color: lightgray;
        border-radius: 5px;
        border: 2px solid gray;
    }

    select {
        background-color: lightgray;
        border-radius: 5px;
        border: 2px solid gray;
    }

    .upravit_button {
        background-color: lightblue;
        color: gray;
        border: 2px solid gray;
        border-radius: 5px;
    }

    .upravit_button:hover {
        cursor: pointer;
        background-color: gray;
        color: white;
    }

</style>

<body style="background-color: lightblue">

<form method="post" action="update_zam.php">

    Meno: <br>
    <input type="text" name="meno_zamestnanec" value="<?php echo $zamestnanec['nazov']; ?>"><br>
    Popis: <br>
    <textarea name="popis_zamestnanec"><?php echo $zamestnanec['popis']; ?></textarea><br>
    Fotka: <br>
    <input type="text" name="fotka" value="<?php echo $zamestnanec['fotka'] ?>"><br>

    <input type="hidden" name="id" value="<?php echo $zamestnanec['id'];?>"><br>

    <input class="upravit_button" type="submit" name="submit" value="Upraviť">

</form>

</body>