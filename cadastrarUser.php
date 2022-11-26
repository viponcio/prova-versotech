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
            <h1>Cover your page.</h1>
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
            <p class="lead">
            <form class="form-horizontal" role="form" method="post" action="./controller/crudUser.php">
                <!-- talvez arrumar o acton; -->
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="name" class="control-label">Nome</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome Completo">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <label for="email" class="control-label">Email</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ex.: fulano@email.com">
                    </div>
                </div>
                <div class="col-sm-1">
                    <label for="name" class="control-label">Cor</label>
                </div>
                <div class="col-sm-10">
                    <select class="form-select form-select-sm" name='color_id' aria-label=".form-select-sm example">
                        <?php

                        $colors = $connection->query("SELECT name,id FROM colors");
                        foreach ($colors as $color) {
                            $nameColor = $color->name;
                            $color_id = $color->id;

                            echo "<option value='$color_id' id='color_id' name='color_id' style='background-color:$nameColor;'>$color_id $nameColor</option>";
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div id="liveAlertPlaceholder"></div>
                        <button type="submit" name="operacao" value="cadastrar" id="liveAlertBtn" class="btn btn-light">Cadastrar.</button>
                        <a class="btn btn-primary" href="index.php">Cancelar</a>
                    </div>
                </div>
                <script>
                    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

                    const alert = (message, type) => {
                        const wrapper = document.createElement('div')
                        wrapper.innerHTML = [
                            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                            `   <div>${message}</div>`,
                            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                            '</div>'
                        ].join('')

                        alertPlaceholder.append(wrapper)
                    }

                    const alertTrigger = document.getElementById('liveAlertBtn')
                    if (alertTrigger) {
                        alertTrigger.addEventListener('click', () => {
                            alert('Usuário cadastrado com sucesso!', 'success');
                        })
                    }
                </script>
            </form>
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>by <a href="https://github.com/viponcio" class="text-white">@viponcio</a> with <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, .</p>
        </footer>
    </div>



</body>

</html>