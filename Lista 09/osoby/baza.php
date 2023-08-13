<?php
$baza = new SQLite3('baza.db');
$baza->query("create table if not exists osoby
		(id integer primary key autoincrement,
		imie char(20),
		nazwisko char(40),
		plec char(1),
		opis text
		)");
