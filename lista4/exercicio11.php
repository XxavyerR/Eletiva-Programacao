
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercicio 11</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor" class="form-label">Digite uma valor para ser convertido em Reais:</label>
                <input type="number" id="valor" name="valor" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        //strlen() verifica a quantidade de caracteres de um determinada string
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $valor = $_POST['valor'];
            //Aqui eu uso o number_format para mostrar o valor convertido em reais transformando o ponto em virgula e 2 casas decimais pros centavos
            $valorFormatado = "R$ " . number_format($valor, 2, ',', '.');
            echo "a valor em Reais é de  R$ $valorFormatado";

        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>