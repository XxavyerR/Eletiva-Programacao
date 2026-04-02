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
                        <label class="form-label">Código</label>
                        <input type="text" name="codigo[]" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
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

            $codigos = $_POST['codigo'];
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];

            $produtos = array();

            // Montar o mapa (código => [nome, preço])
            for ($i = 0; $i < count($codigos); $i++) {

                $codigo = $codigos[$i];
                $nome = $nomes[$i];
                $preco = $precos[$i];

                // aplicar desconto se > 100
                if ($preco > 100) {
                    $preco *= 0.9; // 10% de desconto
                }

                $produtos[$codigo] = array(
                    "nome" => $nome,
                    "preco" => $preco
                );
            }

            // Ordenar pelo nome do produto
            uasort($produtos, function ($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });

            echo "<h3>Lista de Produtos:</h3>";

            foreach ($produtos as $codigo => $dados) {
                echo "<p>
                    <strong>Código:</strong> $codigo <br>
                    <strong>Nome:</strong> {$dados['nome']} <br>
                    <strong>Preço:</strong> R$ " . number_format($dados['preco'], 2, ',', '.') . "
                </p><hr>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>