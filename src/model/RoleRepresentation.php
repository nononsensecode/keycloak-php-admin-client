<?php

namespace nononsensecode\KeyCloakAdminClient\model;

use stdClass;

class RoleRepresentation
{
    public $attributes;
    public ?bool $clientRole;
    public ?bool $composite;
    public ?RoleRepresentationComposites $composites;
    public ?string $containerId;
    public ?string $description;
    public ?string $id;
    public string $name;

    function __construct($name, $attributes = [], $clientRole = true,
        $composite = false, $composites = null, $containerId = null,
        $description = null, $id = null)
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->clientRole = $clientRole;
        $this->composite = $composite;
        $this->composites = $composites;
        $this->containerId = $containerId;
        $this->description = $description;
        $this->id = $id;
    }
    
    public static function fromStdClass(stdClass $object): RoleRepresentation
    {
        return new RoleRepresentation($object->name, $object->attributes,
            $object->clientRole, $object->compisite,
            new RoleRepresentationComposites($object->composites->client, $object->composites->realm),
            $object->containerId, $object->description, $object->id);
    }
}