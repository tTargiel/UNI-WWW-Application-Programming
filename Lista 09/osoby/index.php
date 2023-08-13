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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
	<?php
	if ($_GET) {
		if ($_GET['id'] == 'dodaj')
			include("osoba_dodaj.php");
		else
    if (intval($_GET['id']))
			include "osoba_edit.php";
	} else {
		// include "osoba_lista.php";
		include "osoba_tabela.php";
	}
	?>
</body>

</html>