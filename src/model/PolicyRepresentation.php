<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class PolicyRepresentation
{
    public $config;
    public ?string $decisionStrategy;
    public ?string $description;
    public ?string $id;
    public ?string $logic;
    public ?string $name;
    public ?string $owner;
    public $policies;
    public $resources;
    public $scopes;
    public ?string $type;

    function __construct($config = [], $decisionStrategy = null, $description = null,
        $id = null, $logic = null, $name = null, $owner = null, $policies = [],
        $resources = [], $scopes = [], $type = null)
    {
        $this->$config =  $config;
        $this->$decisionStrategy = $decisionStrategy;
        $this->description = $description;
        $this->id = $id;
        $this->logic = $logic;
        $this->name = $name;
        $this->owner = $owner;
        $this->policies = $policies;
        $this->resources = $resources;
        $this->scopes = $scopes;
        $this->type = $type;
    }
}