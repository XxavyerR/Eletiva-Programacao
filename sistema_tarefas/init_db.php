<?php
require __DIR__ . '/config.php';

if (file_exists(__DIR__ . '/db.sqlite')) {
    echo "Banco já existe. Remova 'db.sqlite' para recriar.\n";
    exit;
}

$sql = [
    "CREATE TABLE projects (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, description TEXT, created_at TEXT);",
    "CREATE TABLE members (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, email TEXT);",
    "CREATE TABLE tasks (id INTEGER PRIMARY KEY AUTOINCREMENT, project_id INTEGER NOT NULL, title TEXT NOT NULL, description TEXT, status TEXT, due_date TEXT, FOREIGN KEY(project_id) REFERENCES projects(id));",
    "CREATE TABLE allocations (id INTEGER PRIMARY KEY AUTOINCREMENT, task_id INTEGER NOT NULL, member_id INTEGER NOT NULL, status TEXT, assigned_at TEXT, FOREIGN KEY(task_id) REFERENCES tasks(id), FOREIGN KEY(member_id) REFERENCES members(id));",
];

foreach ($sql as $q) {
    $pdo->exec($q);
}

echo "Banco inicializado com sucesso em 'db.sqlite'.\n";
