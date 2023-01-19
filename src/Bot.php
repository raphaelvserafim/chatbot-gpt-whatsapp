<?php

namespace Cachesistemas\ChatbotGptWhatsapp;

use Cachesistemas\ChatbotGptWhatsapp\OpenAI;

use Cachesistemas\ClassePhpApiWame\WhatsApp;


class Bot
{
    private $data;
    private $openAI;
    private $whatsapp;

    private  $wpp_server;
    private  $wpp_key;

    private  $open_key;

    public function __construct($dados)
    {
        $this->wpp_server     = $dados["wpp_server"];
        $this->wpp_key        = $dados["wpp_key"];
        $this->open_key        = $dados["open_key"];

        $this->data  = file_get_contents('php://input');
        if (isset($this->data)) {
            $this->start();
        }
    }

    public function start()
    {
        if (isset($this->data["data"]["key"]["remoteJid"])) {
            $this->openAI         = new OpenAI($this->open_key);
            $this->whatsapp       = new WhatsApp(["server" => $this->wpp_server, "key" => $this->wpp_key]);
        }
    }


    public function asking($text)
    {
        $result  = $this->openAI->generateText($text);
        if (sizeof($result["choices"]) > 0) {
        }
    }
}
