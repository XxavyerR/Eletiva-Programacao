<?php
require 'config.php';
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare('DELETE FROM members WHERE id = ?');
    $stmt->execute([$id]);
}
header('Location: membros.php');
exit;
