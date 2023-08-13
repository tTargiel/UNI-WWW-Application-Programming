<?php
session_start();

if ($_POST and $_SESSION['admin']) {
    include "baza.php";

    foreach ($_POST as $x => $y) $r[$x] = $baza->escapeString($y);
    switch ($_POST['co']) {
        case 'Usun':
            $baza->query("delete from studenci where id='$r[id]'");
            break;
        case 'Zapisz':
            $baza->query("update studenci 
						 set imie='$r[imie]', 
						 nazwisko='$r[nazwisko]', 
						 plec='$r[plec]', 
						 ur='$r[ur]',
						 album='$r[album]',
						 kierunek='$r[kierunek]',
						 wzrost='$r[wzrost]'
						 where id='$r[id]'");
            break;
        case 'Dodaj':
            $baza->query("insert into studenci (imie,nazwisko,plec,ur,album,kierunek,wzrost)
                          values('$r[imie]', '$r[nazwisko]', '$r[plec]', '$r[ur]','$r[album]','$r[kierunek]','$r[wzrost]')
						 ");
            break;
    }

    // echo $baza->lastErrorMsg();
}

header("location:.");
