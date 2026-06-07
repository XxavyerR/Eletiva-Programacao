<?php
require 'config.php';
require 'cabecalho.php';

$stmt = $pdo->query('SELECT * FROM members ORDER BY id DESC');
$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Membros</h2>
<p><a href="membro_form.php">Novo Membro</a></p>
<table border="1" cellpadding="6" cellspacing="0">
  <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
  <?php foreach ($members as $m): ?>
  <tr>
    <td><?=htmlspecialchars($m['id'])?></td>
    <td><?=htmlspecialchars($m['name'])?></td>
    <td><?=htmlspecialchars($m['email'])?></td>
    <td>
      <a href="membro_form.php?id=<?=$m['id']?>">Editar</a> |
      <a href="membro_delete.php?id=<?=$m['id']?>" onclick="return confirm('Remover membro?')">Remover</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<?php require 'rodape.php';
