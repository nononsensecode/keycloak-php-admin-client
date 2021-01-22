<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ResourceServerRepresentation
{
    public ?bool $allowRemoteResourceManagement;
    public ?string $clientId;
    public ?string $decisionStrategy;
    public ?string $id;
    public ?string $name;
    public $policies;
    public ?string $policyEnforcementMode;
    public $resources;
    public $scopes;

    function __construct($allowRemoteResourceManagement = false, $clientId = null,
        $decisionStrategy = null, $id = null, $name = null, $policies = [],
        $policyEnforcementMode = null, $resources = [], $scopes = [])
    {
        $this->allowRemoteResourceManagement = $allowRemoteResourceManagement;
        $this->clientId = $clientId;
        $this->decisionStrategy = $decisionStrategy;
        $this->id = $id;
        $this->name = $name;
        $this->policies = $policies;
        $this->policyEnforcementMode = $policyEnforcementMode;
        $this->resources = $resources;
        $this->scopes = $scopes;
    }
}