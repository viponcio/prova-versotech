<?php
require '../connection.php';
$connection = new Connection();
$id = $_GET["id"];
$connection->query("DELETE FROM users WHERE id='$id'");
$connection->query("DELETE FROM user_colors WHERE user_id='$id'");
Header("Location: http://localhost:7070/index.php");

