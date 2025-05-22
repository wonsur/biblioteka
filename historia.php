<?php
include "polacz.php";
$wynik = mysqli_query($conn, "SELECT wypozyczenia.*, ksiazki.tytul, uczniowie.imie, uczniowie.nazwisko FROM wypozyczenia JOIN ksiazki ON wypozyczenia.id_ksiazki=ksiazki.id_ksiazki JOIN uczniowie ON wypozyczenia.id_ucznia=uczniowie.id_ucznia ORDER BY wypozyczenia.id_wypozyczenia DESC");
while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    echo "{$row['imie']} {$row['nazwisko']} wypożyczył(a) '{$row['tytul']}' dnia {$row['data_wypozyczenia']}";
    if ($row['data_zwrotu']) {
        echo ", zwrócono: {$row['data_zwrotu']}";
    } else {
        echo ", NIE ZWRÓCONO";
    }
    echo "<br>";
}
?>
