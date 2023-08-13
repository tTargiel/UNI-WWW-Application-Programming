<!DOCTYPE html>

<div id="leftPanel">
	<div id="menu">
		<a href="index.php"><b>Wszystkie Wydarzenia 📃</b></a>
		<a href="view_week.php"><b>Widok Tydzień 🕓</b></a>
		<a href="view_month.php"><b>Widok Miesiąc 📆</b></a>
		<!-- <a href="event_add.php"><b>Dodaj Wydarzenie ➕</b></a> -->
		<!-- <a href='login.php'><b>Zaloguj</b></a> -->

		<?php
		session_start();

		if ($_SESSION['admin']) {
			echo "<a href='event_add.php'><b>Dodaj Wydarzenie ➕</b></a>";
			echo "<a href='login.php?id=logout'><b>Wyloguj</b></a>";
		} else {
			echo "<a href='login.php'><b>Zaloguj</b></a>";
		}
		?>
	</div>
</div>