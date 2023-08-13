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

	<textarea name='opis' placeholder='Opis'></textarea>
	<input type=submit name=co value=Dodaj>
	<input type=submit name=co value=Anuluj>
</form>