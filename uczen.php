<?php
include "polacz.php";
$id_ucznia = isset($_GET['id_ucznia']) ? intval($_GET['id_ucznia']) : 0;
$wynik = mysqli_query($conn, "SELECT * FROM uczniowie WHERE id_ucznia=$id_ucznia");
if ($uczen = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    echo "<h2>{$uczen['imie']} {$uczen['nazwisko']}</h2>";
    $ksiazki = mysqli_query($conn, "SELECT * FROM ksiazki WHERE id_ucznia=$id_ucznia");
    echo "Wypożyczone książki:<br>";
    while ($row = mysqli_fetch_array($ksiazki, MYSQLI_ASSOC)) {
        echo "{$row['tytul']} - {$row['autor']}<br>";
    }
} else {
    echo "Nie znaleziono ucznia.";
}
?>
<a href="index.html">Powrót</a>
