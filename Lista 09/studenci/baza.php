<?php
$baza = new SQLite3("studenci.db");
$baza->query("create table if not exists studenci
		(id integer primary key autoincrement,
		imie char(10),
		nazwisko char(40),
		plec char(1),
		ur date,
		album int,
		kierunek varchar(50),
		wzrost integer
		)");
