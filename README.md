# 👨‍⚕️ Sickstem - Sistema de Gerenciamento de Clínicas

## 📃 Sobre o Sistema:
O **Sickstem** é uma aplicação web dedicada ao gerenciamento de clínicas, facilitando o controle de pacientes, médicos e consultas. 
Com funcionalidades que vão desde o cadastro e edição de informações até a visualização de relatórios completos, o sistema permite um acompanhamento eficiente da rotina clínica. 
Ele oferece uma interface intuitiva para a administração de dados essenciais, como médicos, pacientes e especialidades, garantindo uma gestão organizada e precisa.

## 🎬 Aplicação Completa:

Veja o funcionamento detalhado da nossa aplicação através do vídeo de apresentação:

[![YouTube](https://img.shields.io/badge/-YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://www.youtube.com/watch?v=bw5WJRNXQVI)

## 📐 Diagrama de Componentes:

![Diagrama Componentes](/img/componentes.png)

Para mais informações sobre especificação de requisitos, projeto arquitetural e diagramas, vá para a pasta [Documentação do TP](Documentação_do_TP)

## 👩‍💻 Ferramentas Necessárias para o Funcionamento do Sistema:

[![PHP](https://img.shields.io/badge/-PHP-6959CD?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)

[![Bootstrap](https://img.shields.io/badge/-Bootstrap-8A2BE2?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

[![Composer](https://img.shields.io/badge/-Composer-885630?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org/)

[![Eloquent](https://img.shields.io/badge/-Eloquent-FF6F61?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/docs/eloquent)

[![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

[![MySQL](https://img.shields.io/badge/-MySQL-001F3F?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

## 🖥️ Instruções de execução do sistema:
Siga os passos abaixo para configurar e executar o projeto localmente.

1. Para começar, faça o clone do repositório para a sua máquina local usando o comando:

```bash
git clone https://github.com/seu-usuario/sickstem.git
```
2. Após clonar o repositório, navegue até o diretório do projeto:
```bash
cd sickstem
```
3. Este projeto utiliza o Composer para gerenciar dependências. Para instalar todas as dependências necessárias, execute:
```bash
composer install
```
4. Certifique-se de que o banco de dados MySQL está configurado e rodando. Atualize as credenciais de conexão no arquivo `.env` ou no arquivo de configuração correspondente para o banco de dados.

5. Após configurar o banco de dados, execute as migrações para criar as tabelas necessárias no banco de dados:
```bash
php artisan migrate
```
6. Por fim, para iniciar o servidor localmente, utilize o comando do Composer:
``` bash
composer start
```

## ✍️ Autores:

- [Mateus Henrique dos Santos](https://github.com/MateusSaantos)
- [Emanuelle Ferraz Lima](https://github.com/emanuelleferraz)


## 📲 Contato:
- mateus_saantos@outlook.com
- emanuelle.ferrazlm@gmail.com

