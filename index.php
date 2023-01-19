<?php

use Cachesistemas\ChatbotGptWhatsapp\OpenAI;

use Cachesistemas\ClassePhpApiWame\WhatsApp;


include 'vendor/autoload.php';


$openAI         = new OpenAI('Your Key');

$whatsapp       = new WhatsApp(["server" => "API server", "key" => "Your Key Instance"]);

$result         = $openAI->generateText("quantos dias na semana é bom para ir para academia ?");



$resposta = '';

if (sizeof($result["choices"]) > 0) {

    for ($i = 0; sizeof($result["choices"]) > $i; $i++) {
        $resposta .= $result["choices"][$i]["text"];
    }
}




echo $resposta;
