# Library III Laravel

## Olá seja bem vindo ao meu projeto :)
Para roda-lo é simples, primeiro copie o repositório para sua maquina local.
### Copie o .env.example para um arquivo .env
```
cp .env.example .env
```

Preencha o .env com os dados do seu banco de dados

### Docker
rode os seguintes comandos 

```
docker-compose up -d
```

### Entrando no container

Necessario rodar as migrations do banco de dados e a Seeder com algumas inserções <br>
Então entre dentro do container com

```
docker-compose exec app bash
```

### Executando Migrations e Seeder

```
php artisan migrate
```

```
php artisan db:seed --class=BookInsertSeeder
```

#### E pronto agora o projeto pode ser acessado através do localhost:8000 aproveite :)
<br>

### Caso de erro de permissão necessario <br> dar permissão para a pasta build
```
chmod +x build/
```