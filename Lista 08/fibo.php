<?php include "_top.php"; ?>

<h1>Ciąg Fibonacciego</h1>

<?php
function fibonacci($x)
{
    if ($x == 0) {
        return 0;
    } else if ($x == 1) {
        return 1;
    } else {
        return fibonacci($x - 1) + fibonacci($x - 2);
    }
};

for ($i = 0; $i < 21; $i++) {
    echo " ", fibonacci($i), ",";
}
?>

<?php include "_bottom.php"; ?>