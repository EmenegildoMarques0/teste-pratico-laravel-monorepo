# Monorepo Laravel - Test-1 e Test-2

Este repositório contém dois projetos Laravel organizados em uma estrutura monorepo:

```
/apps
  /test-1    # API RESTful para Gerenciamento de Tarefas (To-Do List)
  /test-2    # Consumo de API pública externa com autenticação usando HTTP Client Laravel
```
---

## Estrutura dos Projetos

### 1. `apps/test-1`

- Projeto que implementa uma API RESTful para gerenciamento de tarefas.
- Funcionalidades principais:
  - Criar tarefas (com título obrigatório e descrição opcional).
  - Listar todas as tarefas de um usuário.
  - Atualizar o status da tarefa (pendente, em andamento, concluída).
  - Deletar tarefas.
  - Filtrar tarefas por status.
- Utiliza autenticação de usuários para garantir que cada um manipule apenas suas tarefas.

### 2. `apps/test-2`

- Projeto que consome uma API pública externa que exige autenticação (exemplo: The Cat API).
- Demonstra o uso do HTTP Client nativo do Laravel para fazer requisições autenticadas.
- Realiza tratamento de respostas e erros da API consumida.
- Serve como exemplo prático de integração com serviços externos via API.

---

## Instruções de Uso

Cada projeto possui seu próprio README com instruções detalhadas para:

- Configuração do ambiente
- Instalação de dependências
- Configuração de variáveis de ambiente (ex: chaves de API)
- Execução do servidor local
- Testes e exemplos de chamadas à API

Recomenda-se acessar os READMEs localizados em:

- `apps/test-1/README.md`
- `apps/test-2/README.md`

para obter as orientações específicas de cada projeto.

---

Se precisar de ajuda ou tiver dúvidas, fique à vontade para abrir uma issue.

---
