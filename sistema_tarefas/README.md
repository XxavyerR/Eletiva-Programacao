# Sistema de Controle de Tarefas (Exemplo)

Pequeno sistema PHP para controlar projetos, membros, tarefas e alocações. Usa SQLite para persistência e foi criado como protótipo pedagógico.

Requisitos
- PHP 7.4+ com PDO_SQLITE habilitado
- Git (opcional, para versionamento)

Como iniciar

1. Abra um terminal e entre na pasta do projeto:

```powershell
cd "f:\Elevtiva\Projeto\sistema_tarefas"
```

2. Inicialize o banco (cria `db.sqlite` e as tabelas):

```powershell
php init_db.php
```

3. Inicie o servidor PHP embutido para testes:

```powershell
php -S localhost:8000
```

4. Acesse em `http://localhost:8000` — a aplicação redireciona para a lista de projetos.

Arquivos principais
- `config.php` — configuração e conexão PDO com SQLite
- `init_db.php` — script para criar o banco e tabelas
- `projetos.php`, `projeto_form.php`, `projeto_delete.php` — CRUD de projetos
- `membros.php`, `membro_form.php`, `membro_delete.php` — CRUD de membros
- `tarefas.php`, `tarefa_form.php`, `tarefa_delete.php` — CRUD de tarefas
- `alocacoes.php`, `alocacao_form.php`, `alocacao_delete.php` — registro de alocações (tarefas ↔ membros)
- `cabecalho.php`, `rodape.php` — layout simples

Observações
- O arquivo de banco é `db.sqlite` gerado em runtime; faça backup antes de apagar.
- Este projeto é um protótipo e não implementa autenticação nem validações avançadas.

Licença
- Uso e modificações livres para fins de aprendizado.
