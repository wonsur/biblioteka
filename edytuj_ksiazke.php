<?php
include "polacz.php";
if (isset($_GET['usun'])) {
    $id = intval($_GET['usun']);
    mysqli_query($conn, "DELETE FROM ksiazki WHERE id_ksiazki=$id");
}
if (isset($_POST['zapisz'])) {
    $id = intval($_POST['id']);
    $tytul = $_POST['tytul'];
    $autor = $_POST['autor'];
    mysqli_query($conn, "UPDATE ksiazki SET tytul='$tytul', autor='$autor' WHERE id_ksiazki=$id");
}
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki");
while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    echo "<form method='post'>
        <input type='hidden' name='id' value='{$row['id_ksiazki']}'>
        Tytuł: <input type='text' name='tytul' value='{$row['tytul']}'>
        Autor: <input type='text' name='autor' value='{$row['autor']}'>
        <input type='submit' name='zapisz' value='Zapisz'>
        <a href='edytuj_ksiazke.php?usun={$row['id_ksiazki']}'>Usuń</a>
    </form><br>";
}
?>
<a href="index.html">Powrót</a>
