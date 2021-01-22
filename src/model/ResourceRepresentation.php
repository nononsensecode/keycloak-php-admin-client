<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ResourceRepresentation
{
    public ?string $id;
    public $attributes;
    public ?string $displayName;
    public ?string $icon_uri;
    public ?string $name;
    public ?bool $ownerManagedAccess;
    public $scopes;
    public ?string $type;
    public $uris;

    function __construct($id = null, $attributes = [], $displayName = null, $icon_uri = null,
         $name = null, $ownerManagedAccess = false, $scopes = [], $type = null, $uris = [])
    {
        $this->id = $id;
        $this->attributes = $attributes;
        $this->displayName = $displayName;
        $this->icon_uri = $icon_uri;
        $this->name = $name;
        $this->ownerManagedAccess = $ownerManagedAccess;
        $this->scopes = $scopes;
        $this->type = $type;
        $this->uris = $uris;
    }
}