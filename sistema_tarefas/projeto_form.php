<?php
require 'config.php';
require 'cabecalho.php';

$id = $_GET['id'] ?? null;
$project = ['name'=>'','description'=>''];
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $stmt->execute([$id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $desc = $_POST['description'] ?? '';
    if (!empty($_POST['id'])) {
        $stmt = $pdo->prepare('UPDATE projects SET name = ?, description = ? WHERE id = ?');
        $stmt->execute([$name,$desc,$_POST['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO projects(name,description,created_at) VALUES(?,?,?)');
        $stmt->execute([$name,$desc,date('c')]);
    }
    header('Location: projetos.php');
    exit;
}
?>
<h2><?= $id ? 'Editar' : 'Novo' ?> Projeto</h2>
<form method="post">
  <input type="hidden" name="id" value="<?=htmlspecialchars($project['id'] ?? '')?>">
  <div>
    <label>Nome<br><input name="name" required value="<?=htmlspecialchars($project['name'] ?? '')?>"></label>
  </div>
  <div>
    <label>Descrição<br><textarea name="description"><?=htmlspecialchars($project['description'] ?? '')?></textarea></label>
  </div>
  <div><button type="submit">Salvar</button> <a href="projetos.php">Cancelar</a></div>
</form>

<?php require 'rodape.php';
