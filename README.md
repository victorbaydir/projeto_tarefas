# Gerenciador de Projetos

Um sistema prático e direto para o gerenciamento de projetos e tarefas, desenvolvido em PHP com o framework Laravel. Esta aplicação permite criar projetos com prazos definidos e adicionar múltiplas tarefas a cada um deles, com a possibilidade de alternar o status das tarefas entre "pendente" e "concluída".

## Tecnologias Utilizadas
* **PHP** e **Laravel**
* **PostgreSQL**
* **HTML5 e CSS3**

## Pré-requisitos
Antes de começar, você precisará ter instalado em sua máquina:

* Git
* PHP e Composer
* PostgreSQL

## Como rodar o projeto localmente

Siga o passo a passo abaixo no seu terminal para baixar e executar a aplicação na sua máquina:

**1. Clone o repositório e acesse a pasta**
```bash
git clone https://github.com/victorbaydir/projeto_tarefas.git
cd NOME_DO_REPOSITORIO
```

**2. Instale as dependências**
```bash
composer install
```

**3. Configure o ambiente e o banco de dados**
```bash
cp .env.example .env
```

Para criar um banco de dados use o comando:
```bash
psql -U seu_usuario -c "CREATE DATABASE nome_do_seu_banco;"
```

No arquivo .env configure o banco de dados
```bash
DB_CONNECTION=pgsql
DB_HOST=host_do_seu_banco
DB_PORT=porta_do_seu_banco
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

**4. Rode as migrations**
```bash
php artisan migrate
```

**5. Gere a chave de segurança da aplicação**
```bash
php artisan key:generate
```

**6. Insale as dependências do front-end**
```bash
npm install
```

**7. Compile os assets**
```bash
npm run dev
```

**7. Inicie o servidor local**
```bash
php artisan serve
```
