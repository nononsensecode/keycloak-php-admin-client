<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class RoleRepresentationComposites
{
    public $client;
    public $realm;

    function __construct($client, $realm)
    {
        $this->client = $client;
        $this->realm = $realm;
    }    
}