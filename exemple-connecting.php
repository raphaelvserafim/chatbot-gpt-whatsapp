<?php


use Cachesistemas\ClassePhpApiWame\WhatsApp;

include_once 'vendor/autoload.php';

$whatsapp     = new WhatsApp(["server" => "API server", "key" => "Your Key Instance"]);

echo $whatsapp->getQrCodeHTML();
