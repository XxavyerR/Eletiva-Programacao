<?php
require 'config.php';
require 'cabecalho.php';

$id = $_GET['id'] ?? null;
$alloc = ['task_id'=>'','member_id'=>'','status'=>''];
$tasks = $pdo->query('SELECT id,title FROM tasks')->fetchAll(PDO::FETCH_ASSOC);
$members = $pdo->query('SELECT id,name FROM members')->fetchAll(PDO::FETCH_ASSOC);
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM allocations WHERE id = ?');
    $stmt->execute([$id]);
    $alloc = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'] ?? null;
    $member_id = $_POST['member_id'] ?? null;
    $status = $_POST['status'] ?? '';
    if (!empty($_POST['id'])) {
        $stmt = $pdo->prepare('UPDATE allocations SET task_id = ?, member_id = ?, status = ? WHERE id = ?');
        $stmt->execute([$task_id,$member_id,$status,$_POST['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO allocations(task_id,member_id,status,assigned_at) VALUES(?,?,?,?)');
        $stmt->execute([$task_id,$member_id,$status,date('c')]);
    }
    header('Location: alocacoes.php');
    exit;
}
?>
<h2><?= $id ? 'Editar' : 'Nova' ?> Alocação</h2>
<form method="post">
  <input type="hidden" name="id" value="<?=htmlspecialchars($alloc['id'] ?? '')?>">
  <div>
    <label>Tarefa<br>
      <select name="task_id" required>
        <option value="">-- selecione --</option>
        <?php foreach ($tasks as $t): ?>
          <option value="<?=$t['id']?>" <?=($t['id']==($alloc['task_id'] ?? '')?'selected':'')?>><?=htmlspecialchars($t['title'])?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <label>Membro<br>
      <select name="member_id" required>
        <option value="">-- selecione --</option>
        <?php foreach ($members as $m): ?>
          <option value="<?=$m['id']?>" <?=($m['id']==($alloc['member_id'] ?? '')?'selected':'')?>><?=htmlspecialchars($m['name'])?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <label>Status<br><input name="status" value="<?=htmlspecialchars($alloc['status'] ?? '')?>"></label>
  </div>
  <div><button type="submit">Salvar</button> <a href="alocacoes.php">Cancelar</a></div>
</form>

<?php require 'rodape.php';
