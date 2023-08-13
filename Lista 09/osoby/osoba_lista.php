<?php
include "baza.php";

$wynik = $baza->query("select * from osoby");
echo "<h2>Lista osób</h2>";
echo "<ul>";

while ($r = $wynik->fetchArray()) {
	echo "<a href='?id=$r[id]'><li>$r[imie] $r[nazwisko] $r[plec] $r[opis]</li></a>";
}

echo "<a href='?id=dodaj'><li>Dodaj</li></a>";
echo "</ul>";
