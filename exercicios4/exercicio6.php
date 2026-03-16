<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-3">
    <h1>Exercicio 6</h1>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Digite um número decimal:</label>
            <input type="number" step="any" id="numero" name="numero" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $numero = $_POST['numero'];

        $cima = ceil($numero);     // arredonda para cima
        $baixo = floor($numero);   // arredonda para baixo
        $normal = round($numero);  // arredondamento normal

        echo "<div class='mt-3'>";
        echo "Número digitado: $numero <br>";
        echo "Arredondado para cima: $cima <br>";
        echo "Arredondado para baixo: $baixo <br>";
        echo "Arredondamento normal: $normal";
        echo "</div>";
    }

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>