<?php

use Cachesistemas\ClassePhpApiWame\WhatsApp;

include_once 'vendor/autoload.php';

$whatsapp     = new WhatsApp(["server" => "API server", "key" => "Your Key Instance"]);

$body = [
    "allowWebhook" => true,
    "webhookMessage" => "your-url.com/webhook.php",
    "webhookGroup" => "",
    "webhookConnection" => "",
    "webhookQrCode" => ""
];

$whatsapp->updateWebhook($body);

