<link rel="stylesheet" href="style.css">
<?php
include "polacz.php";
if (isset($_POST['wypozycz'])) {
    $id_ksiazki = intval($_POST['id_ksiazki']);
    $id_ucznia = intval($_POST['id_ucznia']);
    mysqli_query($conn, "UPDATE ksiazki SET id_ucznia=$id_ucznia WHERE id_ksiazki=$id_ksiazki");
    $data = date('Y-m-d');
    mysqli_query($conn, "INSERT INTO wypozyczenia (id_ksiazki, id_ucznia, data_wypozyczenia) VALUES ($id_ksiazki, $id_ucznia, '$data')");
    echo "Wypożyczono książkę!";
}
$ksiazki = mysqli_query($conn, "SELECT * FROM ksiazki WHERE id_ucznia=0");
echo "<form method='post'>";
echo "Książka: <select name='id_ksiazki'>";
while ($row = mysqli_fetch_array($ksiazki, MYSQLI_ASSOC)) {
    echo "<option value='{$row['id_ksiazki']}'>{$row['tytul']} - {$row['autor']}</option>";
}
echo "</select><br>";
$uczniowie = mysqli_query($conn, "SELECT * FROM uczniowie");
echo "Uczeń: <select name='id_ucznia'>";
while ($row = mysqli_fetch_array($uczniowie, MYSQLI_ASSOC)) {
    echo "<option value='{$row['id_ucznia']}'>{$row['imie']} {$row['nazwisko']}</option>";
}
echo "</select><br>";
echo "<input type='submit' name='wypozycz' value='Wypożycz'>";
echo "</form>";
echo "<a href='index.php'>Powrót</a>"
?>
