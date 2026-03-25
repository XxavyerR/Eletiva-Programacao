<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exercicio 10</title>
</head>
<body>

<form method="post">
    Nome completo: <input type="text" name="nome">
    <button type="submit">Enviar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    // separa o nome em partes
    $partes = explode(" ", $nome);

    $iniciais = "";

    // pega a primeira letra de cada parte
    foreach ($partes as $p) {
        if ($p != "") {
            $iniciais .= strtoupper($p[0]) . ".";
        }
    }

    echo "Iniciais: " . $iniciais;
}
?>

</body>
</html>