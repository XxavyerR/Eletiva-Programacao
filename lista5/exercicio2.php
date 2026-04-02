
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-3">
<h1>Exercicio 2</h1>

<form method="post">
<?php
for ($i = 0; $i < 5;$i++)
echo '<div class="mb-3">
<label for="nome[]" class="form-label">Digite o nome: :</label>
<input type="text" id="nome[]" name="nome[]" class="form-control" required>
</div>
<div class="mb-3">
<label for="nota1[]" class="form-label" step = "any">Digite a nota 1: </label>
<input type="number" id="nota1[]" name="nota1[]" class="form-control" step = "0.01" required>

<label for="nota2[]" class="form-label" step = "any">Digite a nota 2: </label>
<input type="number" id="nota2[]" name="nota2[]" class="form-control" step = "0.01" required>

<label for="nota3[]" class="form-label" step = "any">Digite a nota 3: </label>
<input type="number" id="nota3[]" name="nota3[]" class="form-control" step = "0.01" required>
</div>
'
?>
<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];

    $media_notas = array();

    for ($i = 0; $i < 5;$i++) {
        $nome_atual = $nome[$i];
        $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;

        $media_notas[$nome_atual] = round($media, 2);
    }

    arsort($media_notas);

    foreach ($media_notas as $nome => $media){
        echo "<p>nome: " . $nome . " média: " . $media . "</p>";
    }
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>