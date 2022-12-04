<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

$zamestnanci = $db->getZamestnanci();

?>

<style>

    button {
        background-color: lightblue;
        border: 1px solid gray;
        color: gray;
        border-radius: 5px;
    }

    button:hover {
        background-color: gray;
        color: white;
        cursor: pointer;
    }


</style>

</style>

<body style="background-color: lightblue">

<button onclick="location.href='about.php'">Vrátiť sa na stránku</button>

<br><br>

<button onclick="location.href='insert_zamestnanec.php'">Vložiť zamestnanca</button>

<ol>

<?php
foreach ($zamestnanci as $zamestnanec => $zamestnanecData) { ?>
    <li style="font-weight: bold">
        <?php echo $zamestnanecData['meno'] ?> <br>
        <br><button onclick="location.href='delete_zamestnanec.php?id=<?php echo $zamestnanecData['id'] ?>'">Vymazať</button> <br><br>
        <button onclick="location.href='update_zamestnanec.php?id=<?php echo $zamestnanecData['id']?>'">Upraviť</button> <br>
    </li> <br>
<?php
}
?>