<?php
require '../connection.php';
$connection = new Connection();

$id = $_POST["id"];
$nome = $_POST["name"];
$email = $_POST["email"];
$color_id = $_POST["color_id"];

$connection->query("UPDATE users SET name='$nome', email='$email' WHERE id='$id'");
$connection->query("UPDATE user_colors SET color_id='$color_id' WHERE user_id='$id'");

Header("Location: http://localhost:7070/index.php");

