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
                    <label class="form-label">Título do Livro</label>
                    <input type="text" name="titulo[]" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade em Estoque</label>
                    <input type="number" name="quantidade[]" class="form-control" required>
                </div>
                <hr>';
            }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $titulos = $_POST['titulo'];
            $quantidades = $_POST['quantidade'];

            $livros = array();

            for ($i = 0; $i < count($titulos); $i++) {

                $titulo = $titulos[$i];
                $quantidade = $quantidades[$i];

                $livros[$titulo] = $quantidade;
            }

            ksort($livros);

            echo "<h3>Lista de Livros:</h3>";

            foreach ($livros as $titulo => $quantidade) {

                if ($quantidade < 5) {
                    echo "<p class='text-danger'><strong>$titulo</strong>: $quantidade (Estoque baixo!)</p>";
                } else {
                    echo "<p><strong>$titulo</strong>: $quantidade</p>";
                }
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>