<?php
require 'config.php';
require 'cabecalho.php';

$stmt = $pdo->query('SELECT a.*, t.title as task_title, m.name as member_name FROM allocations a LEFT JOIN tasks t ON a.task_id = t.id LEFT JOIN members m ON a.member_id = m.id ORDER BY a.id DESC');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Alocações</h2>
<p><a href="alocacao_form.php">Nova Alocação</a></p>
<table border="1" cellpadding="6" cellspacing="0">
  <tr><th>ID</th><th>Tarefa</th><th>Membro</th><th>Status</th><th>Atribuído</th><th>Ações</th></tr>
  <?php foreach ($rows as $r): ?>
  <tr>
    <td><?=htmlspecialchars($r['id'])?></td>
    <td><?=htmlspecialchars($r['task_title'])?></td>
    <td><?=htmlspecialchars($r['member_name'])?></td>
    <td><?=htmlspecialchars($r['status'])?></td>
    <td><?=htmlspecialchars($r['assigned_at'])?></td>
    <td>
      <a href="alocacao_form.php?id=<?=$r['id']?>">Editar</a> |
      <a href="alocacao_delete.php?id=<?=$r['id']?>" onclick="return confirm('Remover alocação?')">Remover</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php require 'rodape.php';
