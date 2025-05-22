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

<a href="index.html">Powrót</a>
