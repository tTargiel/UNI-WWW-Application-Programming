<?php
function pokaz_osoby()
{
    echo "<h1>Osoby</h1>\n<ul>\n";
    $spis = scandir('./osoby');

    foreach ($spis as $x) {
        if ($x[0] != ".") {
            $dane = json_decode(file_get_contents("./osoby/$x"));
            $encoded_x = rawurlencode($x);
            echo "<li>$dane->imie $dane->nazwisko<a href='?x=$encoded_x' style=color:red>x</a></li>";
        }
    }

    echo "<li><form method=POST><input name=imie><input name=nazwisko><input type=submit value=Dodaj></li>";
    echo "</ul>";
}

function dodaj($dane)
{
    $filename = "./osoby/" . date("Y-m-d_H-i-s");
    file_put_contents($filename, json_encode($dane));
    header("location:osoby.php");
}

function usun($plik)
{
    unlink("./osoby/$plik");
    header("location:osoby.php");
}

if ($_POST) dodaj($_POST);

if ($_GET['x']) usun($_GET['x']);

include "_top.php";

pokaz_osoby();

include "_bottom.php";
?>