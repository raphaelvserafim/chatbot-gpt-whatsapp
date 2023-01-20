<?php

use Cachesistemas\ChatbotGptWhatsapp\Bot;

include 'vendor/autoload.php';


new Bot(["wpp_server" => "https://server.api-wa.me", "wpp_key" => "", "open_key" => ""]);
