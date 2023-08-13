<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<style>
		* {
			font-family: Arial, Tahoma, Sans
		}

		body {
			background: #eee;
		}

		h1 {
			font-weight: normal;
			font-size: 3em
		}

		a {
			text-decoration: none
		}

		div#main {
			text-align: left;
			max-width: 700px;
			margin: 10px;
			min-height: 700px;
			padding: 10px;
		}

		#menu {
			min-width: 1400px;
			margin-bottom: 10px
		}

		#menu>a {
			background: yellow;
			border: 1px solid grey;
			display: table-cell;
			padding: 10px;
			margin: 10px;
			border-radius: 12px;
		}

		table {
			border-collapse: collapse;
			text-align: center;
			font-weight: bold;
		}

		td {
			height: 45px;
			border: 1px solid black;
		}

		.galleria {
			width: 700px;
			height: 600px;
			background: #def
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="galleria/galleria-1.2.9.min.js"></script>
</head>

<body>
	<div id="main"><?php include "_menu.php"; ?>