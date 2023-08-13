<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<style>
		form {
			display: block;
			width: 300px
		}

		input,
		textarea,
		select {
			display: block;
			width: 100%;
			margin: auto;
			box-sizing: border-box
		}

		textarea {
			height: 100px
		}

		input[type=submit] {
			width: 25%;
			float: left
		}

		h2 {
			clear: both
		}

		table th,
		table td {
			border: 1px solid;
			padding: 5px
		}

		table {
			border-collapse: collapse
		}
	</style>
</head>

<body>
	<?php
	if ($_GET['id'] == 'login')
		include "login.php";
	else
	if ($_GET['id'] == 'logout') {
		$_SESSION['admin'] = false;
		include "osoba_tabela.php";
	}
	else
	if (intval($_GET['id']) and $_SESSION['admin'])
		include "osoba_edit.php";
	else
	if ($_GET['id'] == 'dodaj' and $_SESSION['admin'])
		include "osoba_dodaj.php";
	else
		include "osoba_tabela.php";
	?>
</body>

</html>