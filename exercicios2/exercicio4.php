<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>exercicio1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>exercicio2</h1>
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label">Primeiro valor:</label>
                <input type="number" id="valor1" name="valor1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $v1 = (float) $_POST['valor1'];
            if ($v1 > 100) {  
                $desconto = $v1 * 0.15;
                $resultado = $v1 - $desconto;
                echo "Valor original: R$ " . number_format($v1, 2, ',', '.') . "<br>";
                echo "Desconto (15%): R$ " . number_format($desconto, 2, ',', '.') . "<br>";
                echo "Novo valor: R$ " . number_format($resultado, 2, ',', '.');
            } else {
                echo "Valor: R$ " . number_format($v1, 2, ',', '.') . " (sem desconto)";
            }          
  
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>