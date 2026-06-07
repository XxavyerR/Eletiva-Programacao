<?php
require 'config.php';
require 'cabecalho.php';

$stmt = $pdo->query('SELECT * FROM projects ORDER BY id DESC');
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Projetos</h2>
<p><a href="projeto_form.php">Novo Projeto</a></p>
<table border="1" cellpadding="6" cellspacing="0">
  <tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Criação</th><th>Ações</th></tr>
  <?php foreach ($projects as $p): ?>
  <tr>
    <td><?=htmlspecialchars($p['id'])?></td>
    <td><?=htmlspecialchars($p['name'])?></td>
    <td><?=htmlspecialchars($p['description'])?></td>
    <td><?=htmlspecialchars($p['created_at'])?></td>
    <td>
      <a href="projeto_form.php?id=<?=$p['id']?>">Editar</a> |
      <a href="projeto_delete.php?id=<?=$p['id']?>" onclick="return confirm('Remover projeto?')">Remover</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php require 'rodape.php';
