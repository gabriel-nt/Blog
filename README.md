<p align="center">
    <img src="https://github.com/Gabriel-Teixeira/Blog/blob/master/public/img/logo.svg" alt="logo.svg" height="100"/>
</p>
<h1 align="center">
    🚀 Blog com Laravel
</h1>
<p align="center">Desafio do 3º Semestre do Curso Técnico de Informática</p>

<p align="center">
  <img src="https://img.shields.io/badge/laravel%20version-5.8.*-important"/>
  <img src="https://img.shields.io/badge/php%20version-7.1.3-informational" />
  <img src="https://img.shields.io/badge/last%20commit-september-yellow" />
  <img src="https://img.shields.io/badge/license-MIT-success"/>
</p>

<p align="center">
  <a href="#-features">Features</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-pré-requisitos">Pré-Requisitos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-configurações">Configurações</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-licença">Lincença</a>
</p>

<h3 align="center"> 
🚧  Finalizado  🚧
</h3>

### 📎 Features

- [x] Listar notícias
- [x] Ler as notícias
- [x] Realizar Comentários
- [x] Sistema de Autenticação
- [x] Cadastrar Notícias
- [x] Atualizar uma notícia
- [x] Deletar uma notícia
- [x] Cadastrar na newsletter
- [x] Notificação de Email
- [x] Upload de Imagens
- [x] Gerador de XML das notícias

### ✅ Demonstração
<img src="https://github.com/Gabriel-Teixeira/Blog/blob/master/public/img/news.PNG" alt="news" />

### ⚙ Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Node.js](https://nodejs.org/en/) e/ou [Yarn](https://https://yarnpkg.com/), [Composer](https://getcomposer.org/)
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)
<br/>
Também precisará ter instalado em sua máquina, um apache. Algumas opções são:

- [Wampp](https://sourceforge.net/projects/wampserver/)
- [Xampp](https://www.apachefriends.org/pt_br/index.html)
- [Vertrigo](https://www.vswamp.com/?lang=pt)

### 🎲 Instalando as Dependências 

```bash
# Clone este repositório
$ git clone https://github.com/Gabriel-Teixeira/Blog

# Instale as dependências
$ yarn ou npm install

```

### 🛠 Configurações
Algumas configurações devem ser feitas primeiramente:

- Editar as variaveis do arquivo .env para as suas variáveis
- Permitir o envio de emails em seu Gmail
- Criar o banco e definir o mesmo no seu arquivo .env

### 📂 Rodando as Migrations

```bash
# Rodar as migrations
$ php artisan migrate

# Deletar migrations
$ php artisan migrate:reset

# Criar novas migrations
$ php artisan make:migration migration-name

# Ajuda
$ php artisan -v

```


### 🚀 Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- Laravel
- PHP
- Materialize
- Jquery
- SASS
- Axios
- MySQL

### 📝 Licença

Esse projeto está sob a licença MIT.

<hr/>

Feito por Gabriel Teixeira
