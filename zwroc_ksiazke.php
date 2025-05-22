<?php
include "polacz.php";
if (isset($_GET['zwroc'])) {
    $id_ksiazki = intval($_GET['zwroc']);
    mysqli_query($conn, "UPDATE ksiazki SET id_ucznia=0 WHERE id_ksiazki=$id_ksiazki");
    $data = date('Y-m-d');
    $wynik = mysqli_query($conn, "SELECT id_wypozyczenia FROM wypozyczenia WHERE id_ksiazki=$id_ksiazki AND data_zwrotu IS NULL ORDER BY id_wypozyczenia DESC LIMIT 1");
    if ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
        $id_wypozyczenia = $row['id_wypozyczenia'];
        mysqli_query($conn, "UPDATE wypozyczenia SET data_zwrotu='$data' WHERE id_wypozyczenia=$id_wypozyczenia");
    }
    echo "Zwrócono książkę!";
}
$wynik = mysqli_query($conn, "SELECT ksiazki.*, uczniowie.imie, uczniowie.nazwisko FROM ksiazki JOIN uczniowie ON ksiazki.id_ucznia=uczniowie.id_ucznia WHERE ksiazki.id_ucznia!=0");
while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    echo "{$row['tytul']} - {$row['autor']} (wypożyczona przez: {$row['imie']} {$row['nazwisko']}) <a href='zwroc_ksiazke.php?zwroc={$row['id_ksiazki']}'>Zwróć</a><br>";
}
?>
<a href="index.html">Powrót</a>
