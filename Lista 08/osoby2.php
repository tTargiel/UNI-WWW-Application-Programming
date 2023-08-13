<?php
function pokaz_osoby()
{
    echo "<h1>Osoby</h1>\n<ul>\n";
    $osoby = json_decode(file_get_contents("osoby.json"));
    $i = 0;

    foreach ($osoby as $osoba) {
        echo "<li>$osoba->imie $osoba->nazwisko<a href='?x=$i' style=color:red>x</a></li>";
        $i++;
    }

    echo "<li><form method=POST><input name=imie><input name=nazwisko><input type=submit value=Dodaj></li>";
    echo "</ul>";
}

function dodaj($dane)
{
    $osoby = json_decode(file_get_contents("osoby.json"));
    $osoby[] = $dane;
    file_put_contents("osoby.json", json_encode($osoby));
    header("location:osoby2.php");
}

function usun($i)
{
    $osoby = json_decode(file_get_contents("osoby.json"));
    array_splice($osoby, $i, 1);
    file_put_contents("osoby.json", json_encode($osoby));
    header("location:osoby2.php");
}

if ($_POST) {
    dodaj($_POST);
}

if (isset($_GET['x'])) {
    usun(intval($_GET['x']));
}

include "_top.php";

pokaz_osoby();

include "_bottom.php";
?>