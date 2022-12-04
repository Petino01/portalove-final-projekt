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

    .vlozit_button {
        background-color: lightblue;
        color: gray;
        border: 2px solid gray;
        border-radius: 5px;
    }

    .vlozit_button:hover {
        cursor: pointer;
        background-color: gray;
        color: white;
    }

</style>


<body style="background-color: lightblue">

<form method="post" action="insert_zam.php">

    Meno: <br>
    <input type="text" name="meno_zamestnanec" value="" required><br>
    Popis: <br>
    <textarea name="popis_zamestnanec" required></textarea><br>
    Fotka: <br>
    <input type="text" name="fotka" value="" required><br>
    <br>

    <input class="vlozit_button" type="submit" name="submit" value="Vložiť">

</form>

</body>