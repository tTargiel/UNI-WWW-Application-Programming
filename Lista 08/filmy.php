<?php include "_top.php"; ?>

<h1>Filmy</h1>

<?php
foreach (scandir("./filmy") as $plik) {
    if ($plik[0] != ".") {
        echo "<video width='600' controls><source src='./filmy/$plik'></video></br></br>";
    }
}
?>

<?php include "_bottom.php"; ?>