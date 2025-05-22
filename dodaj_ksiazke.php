<link rel="stylesheet" href="style.css">

<?php
include "polacz.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tytul = $_POST['tytul'];
    $autor = $_POST['autor'];
    $sql = "INSERT INTO ksiazki (tytul, autor) VALUES ('$tytul', '$autor')";
    mysqli_query($conn, $sql);
    echo "Dodano książkę!";
}
?>
<form method="post">
    Tytuł: <input type="text" name="tytul"><br>
    Autor: <input type="text" name="autor"><br>
    <input type="submit" value="Dodaj książkę">
</form>

<a href="index.php">Powrót</a>
