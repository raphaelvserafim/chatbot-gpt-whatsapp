# Criando um chatbot automatizado: Classe PHP combina integração com ChatGPT e API do WhatsApp
 
## CONTATO 
 
<p>
<a href="https://wa.me/5566996852025" target="_blank"> 
 <img src="https://img.shields.io/badge/WhatsApp-25D366?style=for-the-badge&logo=whatsapp&logoColor=white" title="+55 66 99685-2025"/> 
</a>

 <a href="https://t.me/raphaelserafim" target="_blank">
  <img src="https://img.shields.io/badge/Telegram-2CA5E0?style=for-the-badge&logo=telegram&logoColor=white" target="_blank">
 </a>  

<a href="https://instagram.com/raphaelvserafim" target="_blank">
 <img src="https://img.shields.io/badge/-Instagram-%23E4405F?style=for-the-badge&logo=instagram&logoColor=white" target="_blank">
</a>
 
<a href="https://www.linkedin.com/in/raphaelvserafim" target="_blank">
 <img src="https://img.shields.io/badge/-LinkedIn-%230077B5?style=for-the-badge&logo=linkedin&logoColor=white" target="_blank">
</a>  
</p>
 


## Example of use:

<a href="https://beta.openai.com/account/api-keys" target="_blank">Key OpenAI</p>

<a href="https://api-wa.me/auth/registre-se" target="_blank">API Key WhatsApp</p>

## Installing composer
```
composer require cachesistemas/chatbot-gpt-whatsapp
```
### Connecting with Whatsapp
```php
use Cachesistemas\ClassePhpApiWame\WhatsApp;

include_once 'vendor/autoload.php';

$whatsapp     = new WhatsApp(["server" => "API server", "key" => "Your Key Instance"]);

echo $whatsapp->getQrCodeHTML();

```

### Updating webhook
```php
$body = ["allowWebhook" => true,
"webhookMessage" => "your-url.com/webhook.php",
"webhookGroup" => "",
"webhookConnection" => "",
"webhookQrCode" => ""];
$whatsapp->updateWebhook($body);
```


### your-url.com/webhook.php
```php
use Cachesistemas\ChatbotGptWhatsapp\Bot;
include 'vendor/autoload.php';
new Bot(["wpp_server" => "", "wpp_key" => "", "open_key" => " "]);

```
