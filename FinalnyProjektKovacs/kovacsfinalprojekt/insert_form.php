<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJ1SAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

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

<form method="post" action="insert.php">

    Názov: <br>
    <input type="text" name="dovolenka_nazov" value="" required><br>
    Dátum: <br>
    <input type="text" name="datum" value="" required><br>
    Popis: <br>
    <textarea name="dovolenka_popis" required></textarea><br>
    Obrázok: <br>
    <input type="text" name="obrazok" value="" required><br>
    <br>

    Atribúty:
    <br>
    <br>
    <select name="atribut1" id="select1" onchange="getSelectValue(this.value);" required>

        <option value="">--Vyber atribút--</option>
        <option value="1">dĺžka</option>
        <option value="2">cena</option>

    </select>

    <br><br>

    <input type="text" name="atribut_hodnota1" placeholder="Atribút hodnota" value="" required>

    <br>
    <br>

    <select name="atribut2" id="select2" onchange="getSelectValue2(this.value)" required>

        <option value="">--Vyber atribút--</option>
        <option value="1">dĺžka</option>
        <option value="2">cena</option>

    </select>

    <br><br>

    <input type="text" name="atribut_hodnota2" placeholder="Atribút hodnota" value="" required>

    <br><br>

    <input class="vlozit_button" type="submit" name="submit" value="Vložiť">

</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmY1" crossorigin="anonymous"></script>

<script type="text/javascript">
    function getSelectValue(select) {
        if(select != '') {
            $("#select2 option[value='"+select+"']").hide();
            $("#select2 option[value!='"+select+"']").show();
        }
    }

    function getSelectValue2(select) {
        if(select != '') {
            $("#select1 option[value='"+select+"']").hide();
            $("#select1 option[value!='"+select+"']").show();
        }
    }
</script>

</body>