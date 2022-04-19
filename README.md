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

> Listar jogos

https://localhost/cygni-1/public/api/jogos

> Listar Rank

https://localhost/cygni-1/public/api/rank

**Rotas POST**

> Cadastra o jogador

https://localhost/cygni-1/public/api/auth/cadastrar

Adicione um body do tipo json

```json
{
    "name": "cygni",
    "surname": "cygni123",
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
