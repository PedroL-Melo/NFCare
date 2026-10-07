# NFCare - Fichas Médicas NFC 🏥⚡

NFCare é um sistema moderno de gestão de fichas médicas com integração direta a tecnologias NFC. Desenvolvido para permitir que médicos e profissionais de saúde criem perfis de emergência vitais para seus pacientes, gravando os dados de acesso rápido em pulseiras, cartões ou tags NFC.

Em caso de emergência, qualquer socorrista ou pessoa com um smartphone pode aproximar o celular da pulseira do paciente para visualizar instantaneamente seu perfil de saúde (alergias, tipo sanguíneo, contatos de emergência e condições crônicas).

## 🚀 Tecnologias Utilizadas

Este projeto foi construído com as melhores e mais modernas ferramentas do ecossistema PHP e Frontend:

*   **Framework:** [Laravel 11](https://laravel.com)
*   **Banco de Dados:** [Supabase](https://supabase.com) (PostgreSQL escalável e serverless)
*   **Frontend & UI:** [Tailwind CSS](https://tailwindcss.com), Blade Components e Alpine.js
*   **Integração de Hardware:** Web NFC API para gravação nativa de tags pelo navegador (Android)
*   **Hospedagem & Deploy:** [Vercel](https://vercel.com) (Serverless Functions via ercel-php)

## ✨ Principais Funcionalidades

*   **Painel do Médico (Dashboard):** Autenticação segura onde o médico pode gerenciar todos os seus pacientes.
*   **Criação de Fichas Médicas:** Cadastro detalhado de informações vitais (foto, tipo sanguíneo, alergias, laudos rápidos).
*   **Perfil Público de Emergência:** Uma rota otimizada e responsiva desenhada para leitura rápida em situações de emergência.
*   **Gravação NFC Direta:** Interface inteligente que permite ao médico gravar a URL de emergência na tag NFC do paciente usando o próprio smartphone (suporte a Web NFC ou fallback para apps como *NFC Tools* no iOS).
*   **Serverless Ready:** Arquitetura inteiramente adaptada para rodar em ambientes Serverless (AWS Lambda / Vercel), com tratamento especial para cache e file systems Read-Only.

## 🛠️ Como rodar o projeto localmente

### Pré-requisitos
*   PHP 8.2+
*   Composer
*   Node.js & NPM
*   Banco de Dados PostgreSQL (ou MySQL, mas o projeto usa extensões PostgreSQL para o Supabase)

### Passo a Passo

1. **Clone o repositório:**
   `ash
   git clone https://github.com/seu-usuario/nfcare.git
   cd nfcare
   `

2. **Instale as dependências do PHP:**
   `ash
   composer install
   `

3. **Instale e compile os assets do Frontend:**
   `ash
   npm install
   npm run build
   `

4. **Configure o ambiente:**
   Copie o arquivo .env.example para .env e configure suas variáveis, especialmente a conexão com o banco de dados.
   `ash
   cp .env.example .env
   php artisan key:generate
   `

5. **Execute as migrações (Criação do Banco de Dados):**
   `ash
   php artisan migrate
   `

6. **Inicie o servidor local:**
   `ash
   php artisan serve
   `
   Acesse a aplicação em http://localhost:8000.

## ☁️ Deploy no Vercel

Este projeto já inclui o arquivo ercel.json e adaptações no ootstrap/app.php para rodar sem problemas no Vercel usando o runtime ercel-php@0.6.2. 

**Variáveis de Ambiente Necessárias no Vercel:**
*   APP_KEY
*   DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
*   VIEW_COMPILED_PATH = /tmp/storage/framework/views (Obrigatório para contornar o sistema de arquivos Read-Only do Vercel).

## 🛡️ Segurança

O projeto não envia nenhuma credencial sensível ou chave de banco de dados para o repositório. O arquivo .env está devidamente listado no .gitignore. As senhas dos usuários são criptografadas via Bcrypt padrão do Laravel e as rotas públicas de emergência acessam os dados via identificadores únicos (UUID).

---
*Desenvolvido com dedicação para salvar vidas através da tecnologia.*
