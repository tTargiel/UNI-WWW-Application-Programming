<?php include "_top.php"; ?>

<h1>Tabliczka mnożenia</h1>

<a href="?n=10" onclick="tablica(10)">do 10, </a>
<a href="?n=20" onclick="tablica(20)">do 20, </a>
<a href="?n=30" onclick="tablica(30)">do 30</a>
</br></br>

<?php
$n = $_GET["n"];

if (!isset($n)) {
    $n = 20;
}

function tablica($n)
{
    echo "<table>";

    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";

        for ($j = 1; $j <= $n; $j++) {
            echo "<td style='width:1000px'>", ($i * $j), "</td>";
        };

        echo "</tr>";
    };

    echo "</table>";
};

echo tablica($n)
?>

<?php include "_bottom.php"; ?>