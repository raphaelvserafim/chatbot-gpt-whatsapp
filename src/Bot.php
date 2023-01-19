<?php

namespace Cachesistemas\ChatbotGptWhatsapp;



class Bot
{
    private $data;

    public function __construct()
    {
        $this->data  = file_get_contents('php://input');
    }

    public function start()
    {
        if (isset($this->data["data"]["key"]["remoteJid"])) {
        }
    }
}
