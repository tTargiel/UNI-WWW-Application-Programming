<?php include "_top.php"; ?>

<h1>Tablice i słowniki</h1>

<?php
$a = ["Gauloises", "Marlboro", "Camel"];
echo "<ul>";

foreach ($a as $x) {
    echo "<li>$x</li>";
}

echo "</ul>";
$dict = ["kot" => "cat", "je" => "eats", "słonecznik" => "sunflower seeds", "woda" => "water"];
echo "<ul>";

foreach ($dict as $x => $y) {
    echo "<li><b>$x</b> - $y</li>";
}

echo "</ul>";

function tlumacz($pl)
{
    global $dict; // Zmienne globalne trzeba deklarować
    echo "<b>$pl</b> - ", strtr($pl, $dict);
}

tlumacz("kot je słonecznik");
?>

<?php include "_bottom.php"; ?>