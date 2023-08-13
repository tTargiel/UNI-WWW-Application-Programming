<h2>Dodawanie osoby</h2>
<form method='post' action='osoba_zmiana.php'>
	<input name='id' type=hidden>
	<input name='imie' placeholder='Imię'>
	<input name='nazwisko' placeholder='Nazwisko'>
	<select name='plec' placeholder='Płeć'>
		<option value=''>Płeć:</option>
		<option value='m'>Mężczyzna</option>
		<option value='k'>Kobieta</option>
	</select>
	<input name='ur' placeholder='Data urodzenia' type="date">
	<input name='album' placeholder='Album'>
	<input name='kierunek' placeholder='Kierunek'>
	<input name='wzrost' placeholder='Wzrost'>
	<input type=submit name=co value=Dodaj>
	<input type=submit name=co value=Anuluj>
</form>