<?php
$DB_FILE = __DIR__ . '/db.sqlite';
try {
    $pdo = new PDO('sqlite:' . $DB_FILE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erro ao conectar ao banco: ' . $e->getMessage());
}
