<?php include "./templates/_top.php"; ?>

<div id="content">
	<div id="tab">
		<h1>Widok Miesiąc</h1>

		<form method=post action='login_commit.php'>
			<p>
				Login:
				<input name=login>
			</p>
			<!-- </br> -->
			<p>
				Hasło:
				<input name=password type=password>
			</p>
			</br>
			<input type=submit>
		</form>

		<?php
		session_start();

		if ($_GET['id'] == 'login')
			include "login.php";
		else
		if ($_GET['id'] == 'logout')
			$_SESSION['admin'] = false;
		else
		?>
	</div>
</div>

<?php include "./templates/_bottom.php"; ?>