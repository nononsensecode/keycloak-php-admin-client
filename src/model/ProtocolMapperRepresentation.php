<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ProtocolMapperRepresentation
{
    public $config;
    public ?string $id;
    public ?string $name;
    public ?string $protocol;
    public ?string $protocolMapper;

    function __construct($config = [], $id = null, $name = null, $protocol = null, $protocolMapper = null)
    {
        $this->config = $config;
        $this->id = $id;
        $this->name = $name;
        $this->protocol = $protocol;
        $this->protocolMapper = $protocolMapper;
    }
}