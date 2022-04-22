![Screenshot: Running tests on  vscode](docs/img/cygni.png)

# Api de resultado dos jogos | Cygni Agrociência.

O objetivo é mostrar os scores dos jogadores com rank das partidas, foram criados alguns dados fakes para melhor iteração e entendimento.

## Instalação para primeira vez de uso.

Instalar as dependências

> composer install

Rodar as migrations

> php artisan migrate

### Rodar o seeder para gerar popular as tabelas do banco de dados com os dados fakes.

> php artisan db:seed

### Rotas disponíveis -

Não se esqueça de configurar os headers e incluir o Bearer Token no client de sua preferencia

**Rotas GET**

> Listar jogadores

https://localhost/cygni-1/public/api/jogadores

### json demonstrativo

```json
{
  "data": [
    [
      {
        "jogador": "Krista Wolf",
        "score": 69,
        "posicao": 1
      },
      {
        "jogador": "Lelia Volkman",
        "score": 60,
        "posicao": 2
      }
    ]
  ]
}
```

> Listar jogos

https://localhost/cygni-1/public/api/jogos

### json demonstrativo

```json
{
  "message": "Jogos e seus Scores",
  "user": [
    {
      "id": 1,
      "name": "Ping Pong",
      "description": "Temporibus autem sed repellat dolores consvoluptatem voluptas.",
      "category": "Tênis de mesa",
      "created_at": "2022-04-22T00:15:56.000000Z",
      "updated_at": "2022-04-22T00:15:56.000000Z",
      "scores": [
        {
          "player_id": 9,
          "game_id": 1,
          "score": 41,
          "created_at": "2022-04-22T00:15:56.000000Z",
          "updated_at": "2022-04-22T00:15:56.000000Z"
        },
        {
          "player_id": 6,
          "game_id": 1,
          "score": 45,
          "created_at": "2022-04-22T00:15:56.000000Z",
          "updated_at": "2022-04-22T00:15:56.000000Z"
        },
        {
          "player_id": 10,
          "game_id": 1,
          "score": 50,
          "created_at": "2022-04-22T00:15:56.000000Z",
          "updated_at": "2022-04-22T00:15:56.000000Z"
        }
      ]
    }
  ]
}
```

> Listar Rank

https://localhost/cygni-1/public/api/rank

### json demonstrativo

```json
{
  "data": [
    [
      {
        "jogador": "Krista Wolf",
        "score": 80,
        "posicao": 1
      },
      {
        "jogador": "Lelia Volkman",
        "score": 79,
        "posicao": 2
      }
    ]
  ]
}
```

**Rotas POST**

> Cadastra o jogador

https://localhost/cygni-1/public/api/auth/cadastrar

Adicione um body do tipo json

```json
{
  "name": "cygni",
  "surname": "cygni123",
  "score": 23,
  "email": "cygni@gmail.com",
  "password": "123456"
}
```

> Cadastrar novo score para o jogador usando o id de um jogo.

```json
{
  "game_id": 1,
  "new_score": 80
}
```

> Dados json para usar no login cadastrado anteriormente.

```json
{
  "email": "cygni@gmail.com",
  "password": "123456"
}
```
