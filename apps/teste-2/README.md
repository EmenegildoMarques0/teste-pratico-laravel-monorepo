
# Projeto Laravel - Consumo da The Cat API

Este projeto exemplifica como consumir a API pública **The Cat API** que exige autenticação via API Key, utilizando o HTTP Client nativo do Laravel.

---

## 1. Configuração

### 1.1 Obtenha a API Key

- Cadastre-se em [The Cat API](https://thecatapi.com/) e gere sua chave gratuita.

### 1.2 Configure a chave no `.env`

```env
THECAT_API_KEY=sua_chave_aqui
```

---

## 2. Endpoint criado

### `GET /cats/random`

Retorna uma imagem aleatória de gato da API.

---

## 3. Exemplo de requisição

```
GET /cats/random
```

---

## 4. Exemplo de resposta

```json
{
  "breeds": [],
  "id": "cou",
  "url": "https://cdn2.thecatapi.com/images/cou.jpg",
  "width": 512,
  "height": 384
}
```

---

## 5. Detalhes da implementação

- Autenticação via header `x-api-key` usando a API Key armazenada no `.env`.
- Consumo da API externa utilizando o Laravel HTTP Client (`Http` facade).
- Tratamento básico de erros: a aplicação verifica se a resposta foi bem-sucedida e retorna erro amigável caso contrário.
- Código claro, simples e fácil de estender para outras funcionalidades.
- A chave API é acessada diretamente do `.env` usando `env('THECAT_API_KEY')` no controller, sem necessidade de configuração no `config/services.php`.

---

## 6. Testes

Você pode testar a rota usando Postman, Insomnia ou diretamente no navegador, acessando:

```
http://seu-dominio/cats/random
```

---
