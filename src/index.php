<?php

namespace nononsensecode\KeyCloakAdminClient;

require_once '../vendor/autoload.php';

class Index
{
    public function greet($name = "anonymous") 
    {
        return "Hello " . $name;
    }
}