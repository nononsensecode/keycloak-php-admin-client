<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ScopeRepresentation
{
    public ?string $displayName;
    public ?string $iconUri;
    public ?string $id;
    public ?string $name;
    public $policies;
    public $resources;

    function __construct($displayName = null, $iconUri = null, $id = null, $name = null, $policies = [], $resources = [])
    {
        $this->displayName = $displayName;
        $this->iconUri = $iconUri;
        $this->id = $id;
        $this->name = $name;
        $this->policies = $policies;
        $this->resources = $resources;
    }
}