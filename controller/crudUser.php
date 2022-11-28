<?php
require '../connection.php';

$connection = new Connection();
$operacao = isset($_POST["operacao"]) ? $_POST["operacao"] : "";

session_start();


switch ($operacao) {

	case "cadastrar":
		$name = $_POST["name"];
		$email = $_POST["email"];

		$user_id = $_POST["user_id"];
		$color_id = $_POST["color_id"];
		$result =$connection->query("INSERT INTO users(name, email) VALUES ('$name', '$email') RETURNING id")->fetch(PDO::FETCH_ASSOC);
		foreach($result as $id) {
			$user_id = $id;
		}
		$connection->query("INSERT INTO user_colors(user_id, color_id) VALUES ('$user_id', '$color_id')");
		Header("Location: http://localhost:7070/cadastrarUser.php");
		break;
			

}
