<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

$dovolenka = $db->getDovolenka($_GET['id'])[0];
$atribut = $db->getAttribute($_GET['id'])[0];

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

<form method="post" action="update.php">

    Názov: <br>
    <input type="text" name="dovolenka_nazov" value="<?php echo $dovolenka['dovolenka_nazov']; ?>"><br>
    Dátum: <br>
    <input type="text" name="datum" value="<?php echo $dovolenka['datum']; ?>"><br>
    Popis: <br>
    <textarea name="dovolenka_popis"><?php echo $dovolenka['dovolenka_popis']; ?></textarea><br>
    Obrázok: <br>
    <input type="text" name="obrazok" value="<?php echo $dovolenka['obrazok'] ?>"><br>

    <input type="hidden" name="id" value="<?php echo $dovolenka['id'];?>"><br>

    Atribúty:
    <br>
    <br>
    Dĺžka:
    <input type="text" name="atribut_hodnota1" placeholder="Atribút hodnota" value="<?php echo $atribut['atribut_hodnota'] ?>" required>
    <br>
    <br>

    <?php

    $atribut = $db->getAttribute($_GET['id'])[1];

    ?>

    Cena:
    <input type="text" name="atribut_hodnota2" placeholder="Atribút hodnota" value="<?php echo $atribut['atribut_hodnota'] ?>" required>
    <br>
    <br>

    <input class="upravit_button" type="submit" name="submit" value="Upraviť">

</form>

</body>
