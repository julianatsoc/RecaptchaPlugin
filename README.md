# reCAPTCHA para Formulários do WordPress  

Configurar uma vez e não voltar nunca mais nisso!


## 📌 Como Gerar as Chaves da API do reCAPTCHA  

Para utilizar este plugin, você precisa gerar a **Chave do Site** e a **Chave Secreta** no Google reCAPTCHA. Siga os passos abaixo:  

### 1️⃣ Acesse o Google reCAPTCHA Admin  
Acesse o site oficial do Google reCAPTCHA no link abaixo:  

👉 [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)  

### 2️⃣ Registre um Novo Site  
1. Faça login com sua conta do Google.  
2. Clique no botão **“+ Criar”** ou **“Registrar um novo site”**.  
3. No campo **“Etiqueta”**, insira um nome para identificar o site.  

### 3️⃣ Escolha o Tipo de reCAPTCHA  
- **reCAPTCHA v2** → Nessa primeira versão do puglin recomendo a opção **"Desafio de caixa de seleção ('Não sou um robô')"** para melhor compatibilidade.  

### 4️⃣ Configure os Domínios  
- No campo **"Domínios"**, adicione o domínio do seu site (exemplo: `meusite.com`).  
- Se estiver testando localmente, pode usar `localhost`.  

### 5️⃣ Aceite os Termos e Finalize  
- Marque a opção **"Aceito os Termos de Serviço do reCAPTCHA"**.  
- Clique em **“Enviar”** para gerar suas chaves.  

### 6️⃣ Copie as Chaves e Configure no Plugin  
Após a criação, você verá duas chaves:  
🔑 **Chave do Site (Site Key)**  
🔒 **Chave Secreta (Secret Key)**  

Com o puglin ativado no site, vá até **Configurações > reCAPTCHA** no painel do WordPress e cole as chaves nos campos correspondentes.  

## 🚀 Pronto!  
O reCAPTCHA agora está ativado em todos os formulários do site, ajudando a proteger contra spam e bots.  
