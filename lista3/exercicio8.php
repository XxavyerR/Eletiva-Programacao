<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>exercicio 8</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container py-3">
<h1>exercicio 8</h1>

<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Digite um numero:</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero =  $_POST["numero"];

    if ($numero < 1) {
        echo "<div class='alert alert-danger mt-3'>Digite um número válido.</div>";
    } else {
        $soma = 0;
        $i = 1;

        // loop do...while
        do {
            $soma += $i;
            $i++;
        } while ($i <= $numero);

        echo "<div class='alert alert-success mt-3'>
                A soma de 1 até $numero é: $soma
              </div>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>