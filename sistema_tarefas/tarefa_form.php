<?php
require 'config.php';
require 'cabecalho.php';

$id = $_GET['id'] ?? null;
$task = ['title'=>'','description'=>'','status'=>'','project_id'=>'','due_date'=>''];
$projects = $pdo->query('SELECT * FROM projects')->fetchAll(PDO::FETCH_ASSOC);
if ($id) {
    $stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $desc = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? '';
    $project_id = $_POST['project_id'] ?? null;
    $due = $_POST['due_date'] ?? null;
    if (!empty($_POST['id'])) {
        $stmt = $pdo->prepare('UPDATE tasks SET project_id = ?, title = ?, description = ?, status = ?, due_date = ? WHERE id = ?');
        $stmt->execute([$project_id,$title,$desc,$status,$due,$_POST['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO tasks(project_id,title,description,status,due_date) VALUES(?,?,?,?,?)');
        $stmt->execute([$project_id,$title,$desc,$status,$due]);
    }
    header('Location: tarefas.php');
    exit;
}
?>
<h2><?= $id ? 'Editar' : 'Nova' ?> Tarefa</h2>
<form method="post">
  <input type="hidden" name="id" value="<?=htmlspecialchars($task['id'] ?? '')?>">
  <div>
    <label>Projeto<br>
      <select name="project_id" required>
        <option value="">-- selecione --</option>
        <?php foreach ($projects as $p): ?>
          <option value="<?=$p['id']?>" <?=($p['id']==($task['project_id'] ?? '')?'selected':'')?>><?=htmlspecialchars($p['name'])?></option>
        <?php endforeach; ?>
      </select>
    </label>
  </div>
  <div>
    <label>Título<br><input name="title" required value="<?=htmlspecialchars($task['title'] ?? '')?>"></label>
  </div>
  <div>
    <label>Descrição<br><textarea name="description"><?=htmlspecialchars($task['description'] ?? '')?></textarea></label>
  </div>
  <div>
    <label>Status<br><input name="status" value="<?=htmlspecialchars($task['status'] ?? '')?>"></label>
  </div>
  <div>
    <label>Prazo<br><input type="date" name="due_date" value="<?=htmlspecialchars($task['due_date'] ?? '')?>"></label>
  </div>
  <div><button type="submit">Salvar</button> <a href="tarefas.php">Cancelar</a></div>
</form>

<?php require 'rodape.php';
