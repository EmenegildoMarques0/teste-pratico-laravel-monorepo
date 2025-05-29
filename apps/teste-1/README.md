
# 📋 API RESTful para Gerenciamento de Tarefas (To-Do List)

API desenvolvida em Laravel para gerenciamento de tarefas e usuários. Permite criar, listar, atualizar e deletar tarefas, bem como gerenciar os usuários que as executam.

![Documentação da API](./Captura%20de%20ecrã_2025-05-29_21-30-26.png)

## 📌 Funcionalidades

### Tarefas
- **Criar Tarefa**: Criação de uma nova tarefa com título obrigatório e descrição opcional.
- **Listar Tarefas**: Listagem de todas as tarefas cadastradas por um usuário, com opção de filtro por status (pendente, em andamento, concluído).
- **Atualizar Tarefa**: Permite alterar o status de uma tarefa.
- **Deletar Tarefa**: Remove tarefas não mais necessárias.

### Usuários
- **Criar Usuário**: Cadastro de um novo usuário.
- **Listar Usuários**: Listagem de todos os usuários cadastrados.
- **Buscar Usuário**: Buscar um usuário específico pelo ID.
- **Atualizar Usuário**: Atualização dos dados de um usuário.
- **Deletar Usuário**: Exclusão de um usuário.

## 🚀 Tecnologias Utilizadas

- PHP 8.2+
- Laravel 12
-  SQLite / MySQL / PostgreSQL
- Swagger (OpenAPI) para documentação
- Laravel Sanctum (opcional) para autenticação

## 🔧 Instalação e Execução

```bash
# Clonar o repositório
git clone https://github.com/seu-usuario/sua-api.git
cd sua-api

# Instalar dependências
composer install

# Criar o arquivo .env
cp .env.example .env

# Configurar variáveis do .env (banco de dados, etc.)

# Gerar chave da aplicação
php artisan key:generate

# Rodar migrações
php artisan migrate

# Iniciar o servidor
php artisan serve
```

Acesse a API em `http://localhost:8000`

## 📑 Documentação

A documentação da API está disponível via Swagger em:
```
http://localhost:8000/api/documentation
```

## 📂 Estrutura de Rotas

### Tarefas
| Método | Rota             | Descrição                     |
|--------|------------------|-------------------------------|
| GET    | `/api/tasks`     | Listar tarefas do usuário     |
| POST   | `/api/tasks`     | Criar uma nova tarefa         |
| PUT    | `/api/tasks/{id}`| Atualizar status da tarefa    |
| DELETE | `/api/tasks/{id}`| Deletar tarefa                |

### Usuários
| Método | Rota              | Descrição                  |
|--------|-------------------|----------------------------|
| GET    | `/api/users`      | Listar todos os usuários   |
| POST   | `/api/users`      | Criar um novo usuário      |
| GET    | `/api/users/{id}` | Buscar um usuário pelo ID  |
| PUT    | `/api/users/{id}` | Atualizar um usuário       |
| DELETE | `/api/users/{id}` | Deletar um usuário         |
