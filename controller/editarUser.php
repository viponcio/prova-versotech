<?php
require '../connection.php';
$connection = new Connection();

$id = $_POST["id"];
$nome = $_POST["name"];
$email = $_POST["email"];
$color_id = $_POST["color_id"];

$connection->query("UPDATE users SET name='$nome', email='$email' WHERE id='$id'");

Header("Location: http://localhost:7070/index.php");

