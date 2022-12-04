<?php

include_once "db_connect.php";

$db = $GLOBALS['db'];

if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
    $dovolenky = $db->getDovolenky();


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

<body style="background-color: lightblue">

<button onclick="location.href='insert_form.php'">Vložiť dovolenku</button>

<br><br>

<button onclick="location.href='tours.php'">Vrátiť sa na stránku</button>

<br><br>

<button onclick="location.href='logout.php'">Odhlásiť sa</button>

<br><br>

<ol>

<?php
foreach ($dovolenky as $dovolenka => $dovolenkaData) { ?>
    <li style="font-weight: bold">
        <?php echo $dovolenka ?> <br>
        <br><button onclick="location.href='delete.php?id=<?php echo $dovolenkaData['id'] ?>'">Vymazať</button> <br><br>
        <button onclick="location.href='update_form.php?id=<?php echo $dovolenkaData['id']?>'">Upraviť</button> <br>
    </li> <br>
<?php
}
?>

</ol>

</body>

<?php
} else {
?>

    <body style="background-color: lightblue">

        <form method="post" action="login.php">
            Username: <br>
            <input style="border-radius: 5px; border: 1px solid gray; background-color: lightgray" name="username" type="text" placeholder="Username" required><br>
            Password: <br>
            <input style="border-radius: 5px; border: 1px solid gray; background-color: lightgray" name="password" type="password" required><br><br>
            <input style="background-color: lightblue; border: 1px solid gray; color: gray; border-radius: 5px" type="submit" name="submit", value="Login" >
        </form>

    </body>

<?php
}
?>

