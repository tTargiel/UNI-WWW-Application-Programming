<?php
$id = $_GET['id'];
$db = new SQLite3('../src/database.db');
$sql = "delete from event where id=$id;";
$result = $db->query($sql);
$db->close();
header('Location: ../index.php');
?>