# 🗃️ Prog3_Framework

Este projeto foi desenvolvido para a disciplina de **Programação III**, do curso de **Ciência da Computação** (5ª fase) no **Campus São Miguel do Oeste da UNOESC**. Nosso foco foi a aplicação prática de frameworks PHP para criar um **Sistema de Controle de Estoque**.

## 👨‍🎓 Alunos
- Marco Antonio Borghetti
- Maria Isabel Wirth Marafon
- Vinicius Andrei Wille

## ✨ Funcionalidades do Sistema de Controle de Estoque

O Sistema de Controle de Estoque é uma aplicação web completa para gerenciamento de produtos e suas movimentações, incluindo:

-   **Cadastro de Produtos**: Permite adicionar, editar e remover produtos do sistema.
-   **Registro de Movimentações**: Gerencia entradas (compras, recebimentos) e saídas (vendas, expedições) de produtos no estoque.
-   **Dashboard em Tempo Real**: Apresenta um painel visual com o saldo atual do estoque.
-   **Gráfico de Movimentações**: Exibe visualizações das movimentações de entrada e saída ao longo do tempo.

## 🛠️ Framework Escolhido: Yii2

Optamos pelo framework **Yii2** devido às suas principais vantagens:

-   **Alta Produtividade**: Facilita o desenvolvimento ágil com o uso de geradores de código como o Gii.
-   **Estrutura Robusta**: Oferece um ambiente estável e seguro para o desenvolvimento de aplicações web.
-   **CRUD Eficiente**: Possui excelente suporte para operações de Criação, Leitura, Atualização e Exclusão de dados.
-   **Manutenção e Escalabilidade**: Projetado para facilitar a manutenção do código e a expansão do sistema conforme as necessidades crescem.

## 🚀 Como Executar o Sistema de Controle de Estoque (Localmente)

Para colocar o sistema em funcionamento na sua máquina, siga os passos abaixo:

### Requisitos Prévios

Certifique-se de ter os seguintes softwares instalados e configurados:

-   **PHP**: Versão 7.4 ou superior.
-   **Composer**: Gerenciador de dependências para PHP.
-   **XAMPP**: Servidor local que inclui Apache, MySQL e PHP.
-   **MySQL**: Sistema de gerenciamento de banco de dados (já incluso no XAMPP).

### Passos de Configuração e Execução

1.  **Clone o Repositório:**
    Abra seu terminal ou Git Bash e clone o projeto para sua máquina:
    ```bash
    git clone [https://github.com/Wyllye/Prog3_Framework.git](https://github.com/Wyllye/Prog3_Framework.git)
    ```

2.  **Acesse a Pasta do Projeto:**
    Navegue até o diretório principal do projeto clonado:
    ```bash
    cd Prog3_Framework
    ```

3.  **Ajuste de Caminhos (se necessário):**
    Se você estiver usando a estrutura `C:\Faculdade\Programacao\estoque` no seu ambiente de desenvolvimento, certifique-se de que o Git esteja apontando para a raiz correta. Caso contrário, ignore.

4.  **Instale as Dependências do Composer:**
    Dentro da pasta `Prog3_Framework`, execute o Composer para baixar todas as bibliotecas e pacotes necessários para o Yii2:
    ```bash
    composer install
    ```

5.  **Configure o Banco de Dados:**
    * Inicie o **Apache** e o **MySQL** no seu painel de controle do XAMPP.
    * Acesse o `phpMyAdmin` (geralmente em `http://localhost/phpmyadmin`) e crie um novo banco de dados. Sugerimos o nome `prog3_estoque` (você pode usar outro nome, mas lembre-se de ajustá-lo).
    * No terminal, na raiz do projeto (`Prog3_Framework`), copie o arquivo de configuração do banco de dados de exemplo:
        ```bash
        copy common\config\main-local.php.sample common\config\main-local.php
        copy common\config\params-local.php.sample common\config\params-local.php
        copy backend\config\main-local.php.sample backend\config\main-local.php
        copy backend\config\params-local.php.sample backend\config\params-local.php
        copy frontend\config\main-local.php.sample frontend\config\main-local.php
        copy frontend\config\params-local.php.sample frontend\config\params-local.php
        ```
    * Edite o arquivo `common\config\main-local.php` e configure as credenciais do seu banco de dados MySQL:
        ```php
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=prog3_estoque', // Ajuste 'prog3_estoque' se usou outro nome
            'username' => 'root', // Seu usuário do MySQL (padrão XAMPP é 'root')
            'password' => '',     // Sua senha do MySQL (padrão XAMPP é vazia)
            'charset' => 'utf8',
        ],
        ```

6.  **Inicialize o Projeto Yii:**
    Ainda no terminal, na raiz do projeto, execute o comando de inicialização do Yii. Escolha `0` para o ambiente de desenvolvimento (dev):
    ```bash
    php init
    ```
    Digite `yes` e pressione Enter para confirmar a inicialização.

7.  **Aplique as Migrations do Banco de Dados:**
    As migrations criam as tabelas necessárias no seu banco de dados. No terminal, execute:
    ```bash
    php yii migrate
    ```
    Digite `yes` e pressione Enter para confirmar a aplicação das migrations.

8.  **Configure Permissões (Linux/macOS):**
    *Se você estiver no Windows, pode pular este passo.*
    ```bash
    chmod -R 777 frontend/web/assets
    chmod -R 777 backend/web/assets
    chmod -R 777 console/runtime
    chmod -R 777 frontend/runtime
    chmod -R 777 backend/runtime
    ```

9.  **Acesse o Sistema:**
    Com o Apache e MySQL do XAMPP iniciados, você pode acessar as interfaces do sistema:
    * **Backend (Administração):** `http://localhost/prog3_framework/backend/web/`
    * **Frontend (Usuário):** `http://localhost/prog3_framework/frontend/web/`

    *Nota: Se você clonou o projeto em um subdiretório do `htdocs` do XAMPP (por exemplo, `C:\xampp\htdocs\prog3_framework`), ajuste o caminho da URL de acordo.*
