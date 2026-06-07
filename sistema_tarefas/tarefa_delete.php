<?php
require 'config.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM tasks WHERE id = ?');
    $stmt->execute([$id]);
}
header('Location: tarefas.php');
exit;
