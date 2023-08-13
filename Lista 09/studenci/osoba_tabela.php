<!-- <a href="?">Wszyscy</a>
<a href="?kierunek=ISSP">ISSP</a>
<a href="?kierunek=Fizyka">Fizyka</a> -->

<form>
    <select id="kierunek" name="kierunek" onchange="this.form.submit()">
        <option value=''>Wszystkie kierunki</option>
        <option>ISSP</option>
        <option>Fizyka</option>
    </select>
    <select id="plec" name="plec" onchange="this.form.submit()">
        <option value=''>Wszystkie płcie</option>
        <option>m</option>
        <option>k</option>
    </select>
</form>

<script>
    document.getElementById("kierunek").value = "<?= $_GET['kierunek'] ?>";
    document.getElementById("plec").value = "<?= $_GET['plec'] ?>";
</script>

<style>
    form {
        display: flex;
        width: 100%;
    }

    select {
        margin: 0 24px;
        padding: 16px 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f1f1f1;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #A80;
        color: white;
    }
</style>

<?php
include "baza.php";

$k = $_GET['kierunek'];
$p = $_GET['plec'];

if ($k) $and .= " and kierunek='$k' ";
if ($p) $and .= " and plec='$p' ";

$wynik = $baza->query("select * from studenci where 1 $and");
echo "<table>";
echo "<h2>Lista osób</h2>";
echo "<tr><th>Id<th>Imię</th><th>Nazwisko</th><th>Płeć</th><th>Data urodzenia</th><th>Album</th><th>Kierunek</th><th>Wzrost</th>";

while ($r = $wynik->fetchArray()) {
    echo "<tr onclick=\"location='?id=$r[id]'\">
			<td>$r[id]</td>
			<td>$r[imie]</td>
			<td>$r[nazwisko]</td>
			<td>$r[plec]</td>
			<td>$r[ur]</td>
			<td>$r[album]</td>
			<td>$r[kierunek]</td>
			<td>$r[wzrost]</td></tr>";
}

if ($_SESSION['admin']) echo "<tr onclick=\"location='?id=dodaj'\"><td colspan=5>Dodaj nową osobę</td></tr>";
else echo "<tr onclick=\"location='?id=login'\"><td colspan=5>Zaloguj sie by edytować tabelę</td></tr>";

echo "</table>";

if ($_SESSION['admin']) echo "<a href=?id=logout>Wyloguj się</a>";
?>