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


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj</title>
</head>
<body>
    <form action="dodaj.php" method="post">
    <label for="tytul">Tytul: </label>
    <input type="text" name="tytul">
    <label for="autor">Autor: </label>
    <input type="text" name="autor">
    <input type="submit" value="Wyslij">
    </form>
    <?php
        // $tytul = $_POST['tytul'];
        // $autor = $_POST['autor'];

        // $c = mysqli_connect('localhost', 'root', '', 'biblioteka');

        // mysqli_query($c, "INSERT INTO `ksiazki`(`tytul`, `autor`) VALUES ('$tytul','$autor')");

    ?>

</body>
</html> -->
