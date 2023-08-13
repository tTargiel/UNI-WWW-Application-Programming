<?php include "_top.php"; ?>

<?php
function pokaz_news()
{
    echo "<h1>Aktualności</h1>\n<ul>\n";
    $spis = scandir('./news');

    foreach ($spis as $x) {
        if ($x[0] != '.') {
            $dane = json_decode(file_get_contents("./news/$x"));
            $encoded_x = rawurlencode($x);
            echo "<h2> $dane->title </h2> <p>$dane->text";

            if ($_GET["haslo"] == "password1") {
                echo "<a href='?x=$encoded_x' style=color:red>x</a></p>";
            }
        }
    }

    if ($_GET["haslo"] == "password1") {
        echo "<form method=POST><input name=title><textarea name=text></textarea><input type=submit value=Dodaj>";
    }

    echo "</ul>";
}

function dodaj($dane)
{
    $filename = "./news/" . date("Y-m-d_H-i-s");
    file_put_contents($filename, json_encode($dane));
    header("location:news.php");
}

function usun($plik)
{
    unlink("./news/$plik");
    header("location:news.php");
}

if ($_POST) {
    dodaj($_POST);
}

if ($_GET['x']) {
    usun($_GET['x']);
}

pokaz_news();
?>

<?php include "_bottom.php"; ?>