# 🔐 site_php_login

Sistema web de autenticação e gerenciamento de funcionários desenvolvido em PHP com banco de dados PostgreSQL.

## 📋 Funcionalidades

- Login de usuários com autenticação via banco de dados
- Cadastro de novos usuários
- Listagem de funcionários
- Conexão com PostgreSQL via `pg_connect`

## 🗂️ Estrutura do Projeto

```
site_php_login/
├── db.php                 # Configuração e conexão com o banco de dados
├── db_site_php.sql        # Script SQL para criação das tabelas e dados iniciais
├── login.php              # Página de login
├── logica_action.php      # Lógica de autenticação (validação de login)
├── cadastro_action.php    # Lógica de cadastro de usuários
├── listagem.php           # Listagem de funcionários
└── styles.css             # Estilos da interface
```

## 🗃️ Banco de Dados

O projeto utiliza **PostgreSQL** com duas tabelas principais:

**`usuarios`** — Armazena as credenciais de acesso:
| Coluna | Tipo         | Descrição          |
|--------|--------------|--------------------|
| id     | integer (PK) | Identificador único|
| login  | varchar(50)  | Nome de usuário    |
| senha  | varchar(255) | Senha do usuário   |

**`funcionarios`** — Armazena os dados dos funcionários:
| Coluna   | Tipo         | Descrição           |
|----------|--------------|---------------------|
| id       | integer (PK) | Identificador único |
| nome     | varchar(100) | Nome completo       |
| cargo    | varchar(100) | Cargo               |
| email    | varchar(100) | E-mail              |
| telefone | varchar(20)  | Telefone            |
| situacao | varchar(10)  | Situação (ativo etc)|

### Usuário padrão

| login | senha |
|-------|-------|
| admin | 123   |

> ⚠️ **Atenção:** Altere a senha padrão antes de usar em produção.

## ⚙️ Pré-requisitos

- PHP 7.4 ou superior com extensão `pgsql` habilitada
- PostgreSQL 14 ou superior
- Servidor web (Apache, Nginx ou PHP built-in server)

## 🚀 Como executar

### 1. Clone o repositório

```bash
git clone https://github.com/walkowicz19/site_php_login.git
cd site_php_login
```

### 2. Configure o banco de dados

Crie o banco e importe o schema:

```bash
createdb php_site
psql -U postgres -d php_site -f db_site_php.sql
```

### 3. Ajuste as credenciais de conexão

Edite o arquivo `db.php` com os dados do seu ambiente:

```php
$host     = "localhost";
$port     = "5432";
$dbname   = "php_site";
$user     = "postgres";
$password = "sua_senha";
```

### 4. Inicie o servidor

```bash
php -S localhost:8000
```

Acesse em: [http://localhost:8000/login.php](http://localhost:8000/login.php)

## 🔒 Segurança

> Este projeto foi desenvolvido para fins educacionais. Para uso em produção, recomenda-se:
> - Armazenar senhas com hash (`password_hash` / `bcrypt`)
> - Utilizar prepared statements para prevenir SQL Injection
> - Mover credenciais do banco para variáveis de ambiente (`.env`)
> - Implementar proteção contra CSRF

## 🛠️ Tecnologias

- PHP 7.4+
- PostgreSQL 14+
- CSS3
