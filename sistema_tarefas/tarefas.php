<?php
require 'config.php';
require 'cabecalho.php';

$stmt = $pdo->query('SELECT t.*, p.name as project_name FROM tasks t LEFT JOIN projects p ON t.project_id = p.id ORDER BY t.id DESC');
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Tarefas</h2>
<p><a href="tarefa_form.php">Nova Tarefa</a></p>
<table border="1" cellpadding="6" cellspacing="0">
  <tr><th>ID</th><th>Título</th><th>Projeto</th><th>Status</th><th>Prazo</th><th>Ações</th></tr>
  <?php foreach ($tasks as $t): ?>
  <tr>
    <td><?=htmlspecialchars($t['id'])?></td>
    <td><?=htmlspecialchars($t['title'])?></td>
    <td><?=htmlspecialchars($t['project_name'])?></td>
    <td><?=htmlspecialchars($t['status'])?></td>
    <td><?=htmlspecialchars($t['due_date'])?></td>
    <td>
      <a href="tarefa_form.php?id=<?=$t['id']?>">Editar</a> |
      <a href="tarefa_delete.php?id=<?=$t['id']?>" onclick="return confirm('Remover tarefa?')">Remover</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php require 'rodape.php';
