<?php
include "polacz.php";
$wynik = mysqli_query($conn, "SELECT ksiazki.*, uczniowie.imie, uczniowie.nazwisko FROM ksiazki LEFT JOIN uczniowie ON ksiazki.id_ucznia=uczniowie.id_ucznia");
while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    $styl = ($row['id_ucznia'] != 0) ? "style='color:red;'" : "";
    echo "<div $styl>{$row['tytul']} - {$row['autor']}";
    if ($row['id_ucznia'] != 0) {
        echo " (wypożyczona przez: {$row['imie']} {$row['nazwisko']})";
    }
    echo "</div>";
}
?>
