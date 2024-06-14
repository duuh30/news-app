# Projeto Laravel Dockerizado - Guia de Configuração

Este guia visa ajudá-lo a configurar e executar um projeto Laravel Dockerizado em sua máquina local.

```bash
# Passos de Configuração

# 1. Clonar o Projeto:

# 2. Iniciar os Contêineres Docker:
docker compose up -d

# 3. Instalar Dependências do Composer:
docker compose exec laravel composer install

# 4. Configurar o Arquivo .env:
# Certifique-se de que o arquivo .env está presente no diretório raiz do projeto.
# Se não estiver, crie uma cópia do arquivo .env.example e renomeie-a para .env.
# Edite o arquivo .env para configurar as variáveis de ambiente necessárias, como as credenciais do banco de dados.

# 5. Gerar Chave do Laravel:
docker compose exec laravel php artisan key:generate

# 6. Iniciar os Contêineres Sail:
./vendor/bin/sail up -d

# 7. Migrar e Preencher o Banco de Dados:
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed

# 8. Acessar a Aplicação:
# Após seguir todos os passos acima, acesse sua aplicação Laravel em http://localhost/api/news
