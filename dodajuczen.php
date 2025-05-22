<?php
include "polacz.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    mysqli_query($conn, "INSERT INTO uczniowie (imie, nazwisko) VALUES ('$imie', '$nazwisko')");
    echo "Dodano ucznia!";
}
?>
<form method="post">
    Imię: <input type="text" name="imie"><br>
    Nazwisko: <input type="text" name="nazwisko"><br>
    <input type="submit" value="Dodaj ucznia">
</form>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
    <form action="dodajuczen.php" method="post">
    <label for="imie">Imie: </label>
    <input type="text" name="imie">
    <label for="nazwisko">Nazwisko: </label>
    <input type="text" name="nazwisko">
    <input type="submit" value="Wyslij">
    </form>
    <?php
        // $imie = $_POST['imie'];
        // $nazwisko = $_POST['nazwisko'];

        // $c = mysqli_connect('localhost', 'root', '', 'biblioteka');

        // mysqli_query($c, "INSERT INTO `uczniowie`(`imie`, `nazwisko`) VALUES ('$imie','$nazwisko')");

    ?>

</body>
</body>
</html> -->