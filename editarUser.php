<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Cover Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>




    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="index.php">Home</a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Editar usuário.</h1>
            <?php

            require 'connection.php';

            $connection = new Connection();
            $id = $_GET["id"];
            $usuario = $connection->query("SELECT * FROM users WHERE id=$id");

            foreach ($usuario as $userRow) {
                $idUsuario = $userRow->id;
                $nomeUsuario    = $userRow->name;
                $emailUsuario   = $userRow->email;
            }

            ?>
            <p class="lead">
            <form class="form-horizontal" role="form" method="post" action="./controller/editarUser.php">
                <div class="form-group">
                    <div class="col-sm-1">
                        <label for="name" class="control-label">Nome</label>
                    </div>

                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idUsuario ?>">

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo" value="<?php echo $nomeUsuario ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-1">
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ex.: fulano@email.com" value="<?php echo $emailUsuario ?>">
                    </div>
                </div>
                <div class="col-sm-1">
                    <label for="name" class="control-label">Cor</label>
                </div>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm" name='id' aria-label=".form-select-sm example">
                        <?php
                        $id = $_GET["id"];
                        // $colorsDisponiveis = $connection->query("SELECT id, name, hexRgb FROM colors WHERE id NOT IN (SELECT color_id FROM user_colors WHERE user_id = $idUsuario) ORDER BY name ASC");
                        $colors = $connection->query("SELECT id,name FROM colors WHERE id NOT IN (SELECT color_id FROM user_colors where user_id = $id) ");

                        // $colors = $connection->query("SELECT name,id FROM colors");
                        foreach ($colors as $color) {
                            $name = $color->name;
                            $color_id = $color->id;
                            echo "<option value='$color_id' id='id' name='id' style='background-color:$name;'>$name</option>";
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-light">Editar.</button>
                        <a class="btn btn-primary" href="index.php">Cancelar</a>
                    </div>
                </div>
            </form>
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>by <a href="https://github.com/viponcio" class="text-white">@viponcio</a> with <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, .</p>
        </footer>
    </div>



</body>

</html>