<?php
require 'config.php';
require 'cabecalho.php';

$id = $_GET['id'] ?? null;
$member = ['name'=>'','email'=>''];
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM members WHERE id = ?');
    $stmt->execute([$id]);
    $member = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    if (!empty($_POST['id'])) {
        $stmt = $pdo->prepare('UPDATE members SET name = ?, email = ? WHERE id = ?');
        $stmt->execute([$name,$email,$_POST['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO members(name,email) VALUES(?,?)');
        $stmt->execute([$name,$email]);
    }
    header('Location: membros.php');
    exit;
}
?>
<h2><?= $id ? 'Editar' : 'Novo' ?> Membro</h2>
<form method="post">
  <input type="hidden" name="id" value="<?=htmlspecialchars($member['id'] ?? '')?>">
  <div>
    <label>Nome<br><input name="name" required value="<?=htmlspecialchars($member['name'] ?? '')?>"></label>
  </div>
  <div>
    <label>Email<br><input name="email" value="<?=htmlspecialchars($member['email'] ?? '')?>"></label>
  </div>
  <div><button type="submit">Salvar</button> <a href="membros.php">Cancelar</a></div>
</form>

<?php require 'rodape.php';
