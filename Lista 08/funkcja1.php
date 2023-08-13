<?php include "_top.php"; ?>

<?php
$x1 = $_GET["x1"];
$y1 = $_GET["y1"];
$w1 = $_GET["w1"];
$x2 = $_GET["x2"];
$y2 = $_GET["y2"];
$w2 = $_GET["w2"];
$W = ($x1 * $y2) - ($x2 * $y1);
$Wx = ($w1 * $y2) - ($w2 * $y1);
$Wy = ($x1 * $w2) - ($x2 * $w1);

if ($W != 0) {
    $x = $Wx / $W;
    $y = $Wy / $W;
    echo "x = ", $x, " y = ", $y;
} else if ($W == 0 && ($Wx != 0 || $Wy != 0)) {
    echo "Brak rozwiązań";
} else if ($W == 0 && $Wx == 0 && $Wy == 0) {
    echo "Nieskończenie wiele rozwiazań";
}
?>

<?php include "_bottom.php"; ?>