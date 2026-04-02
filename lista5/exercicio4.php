<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1></h1>
        <form method="post">
            <?php
            for ($i = 0; $i < 5; $i++) {
                echo '
                <div class="mb-3">
                    <label class="form-label">Nome do Item</label>
                    <input type="text" name="nome[]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preço</label>
                    <input type="number" step="0.01" name="preco[]" class="form-control" required>
                </div>
                <hr>';
            }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];

            $itens = array();

            for ($i = 0; $i < count($nomes); $i++) {

                $nome = $nomes[$i];
                $preco = $precos[$i];

                // aplicar imposto de 15%
                $precoFinal = $preco * 1.15;

                // criar mapa (nome => preço com imposto)
                $itens[$nome] = $precoFinal;
            }

            // ordenar pelos preços (valores) - crescente
            asort($itens);

            echo "<h3>Lista de Itens com Imposto:</h3>";

            foreach ($itens as $nome => $precoFinal) {
                echo "<p><strong>$nome</strong>: R$ " . number_format($precoFinal, 2, ',', '.') . "</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>