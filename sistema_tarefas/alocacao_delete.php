<?php
require 'config.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM allocations WHERE id = ?');
    $stmt->execute([$id]);
}
header('Location: alocacoes.php');
exit;
