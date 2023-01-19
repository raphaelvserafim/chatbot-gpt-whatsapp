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

    private $to;

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


            $this->to             = preg_replace('/[^\d\-]/', '', $this->data["data"]["key"]["remoteJid"]);

            if (isset($this->data["msgContent"]["conversation"])) {

                $text                 = $this->data["msgContent"]["conversation"];

                $this->openAI         = new OpenAI($this->open_key);

                $this->whatsapp       = new WhatsApp(["server" => $this->wpp_server, "key" => $this->wpp_key]);

                $r = $this->asking($text);
                if (isset($r)) {
                    $this->sendMessage($r);
                }
            }
        }
    }


    public function asking($text)
    {
        $asking     = "";
        $result     = $this->openAI->generateText($text);
        if (sizeof($result["choices"]) > 0) {
            for ($i = 0; sizeof($result["choices"]) > $i; $i++) {
                $asking  .= $result["choices"][$i]["text"] . "\n";
            }
        }
        return $asking;
    }


    public function sendMessage($msg)
    {
        $this->whatsapp->sendPresence($this->to, 'composing');
        sleep(1);
        $this->whatsapp->sendText($this->to, $msg);
    }
}
