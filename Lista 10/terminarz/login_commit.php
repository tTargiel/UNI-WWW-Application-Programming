<?php
session_start();

if ($_POST['login'] == 'login1' && $_POST['password'] == 'password1') {
    $_SESSION['admin'] = true;
    echo "Zalogowano pomyślnie";
} else {
    echo "Wprowadzono niepoprawne dane";
}

header("location:.");
