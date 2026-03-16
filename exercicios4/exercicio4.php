<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercicio 4</h1>

        <form method="post">

            <div class="mb-3">
                <label for="dia" class="form-label">Dia:</label>
                <input type="number" id="dia" name="dia" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="mes" class="form-label">Mês:</label>
                <input type="number" id="mes" name="mes" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano:</label>
                <input type="number" id="ano" name="ano" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>

        </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $dia = $_POST['dia'];
            $mes = $_POST['mes'];
            $ano = $_POST['ano'];
            //checkdate aqui serve pra checar se a data é válida
            if (checkdate($mes, $dia, $ano)) {

                $dataFormatada = sprintf("%02d/%02d/%04d", $dia, $mes, $ano);
                echo "<p class='mt-3'>Data válida: $dataFormatada</p>";

            } else {

                echo "<p class='mt-3 text-danger'>Data inválida.</p>";

            }
        }

        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

    </div>
</body>

</html>