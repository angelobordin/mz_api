<h1>APP ROUTES</h1>

<h2>Descrição</h2>
Projeto de uma api em PHP com registros de pessoas e contatos.<br>

<h2>Funcionalidades & endpoints</h2>
<h3>Implementadas :heavy_check_mark:</h3>

- `Listagem de pessoas`:
  - 'Mètodo': GET
  - 'Endpoint': /person/list.
- `Listagem de contatos`:
  - 'Mètodo': GET
  - 'Endpoint': /contact/list.
- `Cadastro de pessoas`:
  - 'Mètodo': POST
  - 'Endpoint': /person/register.
- `Cadastro de contatos`:
  - 'Mètodo': POST
  - 'Endpoint': /contact/register.
- `Edição/Atualização de pessoas`:
  - 'Mètodo': POST
  - 'Endpoint': /edit/person/:id.
- `Edição/Atualização de contatos`:
  - 'Mètodo': POST
  - 'Endpoint': /edit/contact/:id.
- `Exclusão de pessoas`:
  - 'Mètodo': DELETE
  - 'Endpoint': /delete/person/:id.
- `Exclusão de contatos`:
  - 'Mètodo': DELETE
  - 'Endpoint': /delete/contact/:id.


<h2>Rodando o projeto 🛠️</h2>
<h3>Pré-Requisitos</h3>

⚠️ [PHP](https://www.php.net/downloads.php)<br>
⚠️ [Composer](https://getcomposer.org/)<br>
⚠️ [MySQL](https://dev.mysql.com/downloads/installer/)<br>

<h3>VS Code</h3>

- Instale o MySQL no seu ambiente;
- Após a instalação ser concluída você deve criar um banco de dados;
  - Poser ser através do MySQL WorkBecnh (Windows) ou logando no mysql através do terminal e executar o comando "CREATE DATABASE sua_database_aqui" (Linux);

Após pode abri-lo no VS Code.<br>
Para isso abra o VS Code em seu dispositivo, após clique em:

<h3>VS Code</h3>

- **File >> Open Folder...** ou digite **Ctrl+K** / **Ctrl+O**;
- Abra o terminal em **Terminal >> New Terminal**;
- Digite **composer install** para realizar a instalação das dependências do projeto;;
- Em seguida execute o comando **Vendor/bin/doctrine orm:schema-tool:update --force** no terminal para gerar as tabelas das entidades do projeto;
- Após exceute o comando **php -S localhost:8000 -t public** no seu terminal para iniciar o servidor local na porta **8000**;

<h2>Tecnologias Utilizadas</h2>

<ul>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-plain.svg" width="20" height="20"/><b> Visual Studio Code</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" width="20" height="20"/><b> Bootstrap 5</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/composer/composer-original.svg" width="20" height="20"/><b> Composer</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="20" height="20"/><b> PHP</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/doctrine/doctrine-original.svg" width="20" height="20"/><b> Doctrine</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" width="20" height="20"/><b> Git</b></li>
  <li><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="20" height="20"/><b> MySQL</b></li>
</ul>

# Autores

| [<img src="https://avatars.githubusercontent.com/u/70332789?s=400&u=c6b947894c97e0e941f64aafeb22719ff49589ac&v=4" width=115><br><sub>Angelo Bordin</sub>](https://github.com/angelobordin) |
| :----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------: |
