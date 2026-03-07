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
        <h1>exercicio3</h1>
        <form method="post">
            <div class="mb-3">
                <label for="A" class="form-label">Valor A:</label>
                <input type="number" id="A" name="A" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="B" class="form-label">Valor B:</label>
                <input type="number" id="B" name="B" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $A = (float) $_POST['A'];
            $B = (float) $_POST['B'];
            if ($A == $B) {
                echo "<div class=\"alert alert-warning mt-3\">";
                echo "Números iguais: $A";
                echo "</div>";
            } else {
                // exibir todos os valores entre A e B, incluindo limites
                if ($A < $B) {
                    $menor = $A;
                    $maior = $B;
                } else {
                    $menor = $B;
                    $maior = $A;
                }

                echo "<div class=\"alert alert-info mt-3\">";
                echo "Valores de $menor até $maior: ";
                for ($n = $menor; $n <= $maior; $n++) {
                    echo $n;
                    if ($n < $maior) echo " ";
                }
                echo "</div>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
            crossorigin="anonymous"></script>
    </div>
</body>

</html>