!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio15</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container py-3">
<h1>Exercicio 15</h1>

<form method="post">
<div class="mb-3">
<label for="email" class="form-label">Digite o seu email:</label>
<input type="email" id="email" name="email" class="form-control" required>
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    //o explode aqui divide a string em um array usando o @ como delimitador,tudo depois dele fica no array
    $parte = explode("@", $email);
    $dominio = array_pop($parte); //pega a ultima parte
    echo "o dominio do email é $dominio";  
}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>
</html>