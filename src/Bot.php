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

        $this->data  = json_decode(file_get_contents('php://input'), true);
        if (isset($this->data)) {
            $this->start();
        }
    }

    public function start()
    {


        if (isset($this->data["data"]["key"]["remoteJid"])) {

            $this->to             = preg_replace('/[^\d\-]/', '', $this->data["data"]["key"]["remoteJid"]);

            if (isset($this->data["data"]["msgContent"]["conversation"])) {

                $text                 = $this->data["data"]["msgContent"]["conversation"];

                $this->openAI         = new OpenAI($this->open_key);

                $this->whatsapp       = new WhatsApp(["server" => $this->wpp_server, "key" => $this->wpp_key]);

                $r                    = $this->asking($text);

                if (isset($r)) {
                    $this->sendMessage($r);
                }
            }
        }
    }


    public function asking($text)
    {

        $result      = $this->openAI->generateText($text);
        $asking      = $result["choices"][0]["text"];
        $fp          = fopen('assets/log.json', 'a+');
        fwrite($fp,  "\n\n\n\n" .  ($asking) .  "\n\n\n");
        fclose($fp);
        return $asking;
    }


    public function sendMessage($msg)
    {
        $this->whatsapp->sendPresence($this->to, 'composing');
        sleep(1);
        $this->whatsapp->sendText($this->to, $msg);
    }
}
