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
      <h1>Usuários cadastrados.</h1>
      <?php

      require 'connection.php';

      $connection = new Connection();

      $users = $connection->query("SELECT * FROM users");
      echo "<table class='table'>
      <thead>
    <tr class='table-dark' >
        <th scope='col' class='table-dark' >ID</th>    
        <th scope='col' class='table-dark' >Nome</th>    
        <th scope='col' class='table-dark' >Email</th>
        <th scope='col' class='table-dark'>Ação</th>    
    </tr>
    <thead>
";

      foreach ($users as $user) {
        echo sprintf(
          "
          <tbody>
          <tr class='table-dark'>
                      <td class='table-dark'>%s</td>
                      <td class='table-dark'>%s</td>
                      <td class='table-dark'>%s</td>
                      <td>
                          <a class='btn btn-light' value='editar' href='editarUser.php?id=" . $user->id . "' role='button'>Editar</a>
                          <a class='btn btn-danger' value='excluir' href='excluir.php?id=" . $user->id . "' role='button'>Excluir</a>
                      </td>
                   </tr>",
          $user->id,
          $user->name,
          $user->email
        );
      }

      echo "
      </tbody>
      </table>";

      ?>
      <div class="container-md">
        <p class="lead">
          <a class="btn btn-light" href="cadastrarUser.php" role="button">Cadastrar novo usuário</a>
        </p>
      </div>
    </main>

    <footer class="mt-auto text-white-50">
      <p>by <a href="https://github.com/viponcio" class="text-white">@viponcio</a> with <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, .</p>
    </footer>
  </div>



</body>

</html>