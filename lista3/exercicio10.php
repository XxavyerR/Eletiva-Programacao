<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>exercicio 9</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 

<div class="container py-3">
<h1>exercicio 9</h1>

<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Digite um número:</label>
        <input type="number" id="numero" name="numero" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    for ($i = 1; $i <= $numero; $i++) {
        $tabuada = $numero * $i;
        echo "<p>$numero x $i = $tabuada</p>";
    }

    
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</div>

</body>
</html>