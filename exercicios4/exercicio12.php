<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio12</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container py-3">
<h1>Exercicio 12</h1>

<form method="post">
<div class="mb-3">
<label for="tamanho" class="form-label">
Digite a quantidade de caracteres que sua senha deve conter:
</label>
<input type="number" id="tamanho" name="tamanho" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $tamanho = $_POST['tamanho'];

    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&*()_+=";
    //str_shuffle embaralha os caracteres
    //aqui eu defini os caracteres para serem embaralhados e com o shuffle emabaralhei conforme foi pedido
    $senha = substr(str_shuffle($caracteres), 0, $tamanho);

    echo "<div class='mt-3'>";
    echo "Senha gerada: <strong>$senha</strong>";
    echo "</div>";
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>