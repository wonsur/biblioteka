<?php
include "polacz.php";
if (isset($_GET['usun'])) {
    $id = intval($_GET['usun']);
    $wynik = mysqli_query($conn, "SELECT * FROM ksiazki WHERE id_ucznia=$id");
    if (mysqli_num_rows($wynik) == 0) {
        mysqli_query($conn, "DELETE FROM uczniowie WHERE id_ucznia=$id");
    } else {
        echo "Nie można usunąć ucznia z wypożyczonymi książkami.<br>";
    }
}
if (isset($_POST['zapisz'])) {
    $id = intval($_POST['id']);
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    mysqli_query($conn, "UPDATE uczniowie SET imie='$imie', nazwisko='$nazwisko' WHERE id_ucznia=$id");
}
$wynik = mysqli_query($conn, "SELECT * FROM uczniowie");
while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
    echo "<form method='post'>
        <input type='hidden' name='id' value='{$row['id_ucznia']}'>
        Imię: <input type='text' name='imie' value='{$row['imie']}'>
        Nazwisko: <input type='text' name='nazwisko' value='{$row['nazwisko']}'>
        <input type='submit' name='zapisz' value='Zapisz'>
        <a href='edytuj_ucznia.php?usun={$row['id_ucznia']}'>Usuń</a>
    </form><br>";
}
?>
<a href="index.html">Powrót</a>
