<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ClientRepresentation
{
    public $access;
    public ?string $adminUrl;
    public $attributes;
    public $authenticationFlowBindingOverrides;
    public bool $authorizationServicesEnabled;
    public ?ResourceServerRepresentation $authorizationSettings;
    public ?string $baseUrl;
    public ?bool $bearerOnly;
    public ?string $clientAuthenticatorType;
    public ?string $clientId;
    public ?bool $consentRequired;
    public $defaultClientScopes;
    public $defaultRoles;
    public ?string $description;
    public ?bool $directAccessGrantsEnabled;
    public ?bool $enabled;
    public ?bool $frontchannelLogout;
    public ?bool $fullScopeAllowed;
    public ?string $id;
    public ?bool $implicitFlowEnabled;
    public ?string $name;
    public ?int $nodeReRegistrationTimeout;
    public ?int $notBefore;
    public $optionalClientScopes;
    public ?string $origin;
    public ?string $protocol;
    public $protocolMappers;
    public $publicClient;
    public $redirectUris;
    public $registeredNodes;
    public ?string $registrationAccessToken;
    public ?string $rootUrl;
    public ?string $secret;
    public ?bool $serviceAccountsEnabled;
    public ?bool $standardFlowEnabled;
    public ?bool $surrogateAuthRequired;
    public $webOrigins;


    function __construct(ClientRepresentationBuilder $builder)
    {
        $this->access = $builder->getAccess();
        $this->adminUrl = $builder->getAdminUrl();    
        $this->attributes = $builder->getAttributes();    
        $this->authenticationFlowBindingOverrides = $builder->getAuthenticationFlowBindingOverrides();    
        $this->authorizationServicesEnabled = $builder->getAuthorizationServicesEnabled();    
        $this->authorizationSettings = $builder->getAuthorizationSettings();    
        $this->baseUrl = $builder->getBaseUrl();    
        $this->bearerOnly = $builder->getBearerOnly();    
        $this->clientAuthenticatorType = $builder->getClientAuthenticatorType();    
        $this->clientId = $builder->getClientId();    
        $this->consentRequired = $builder->getConsentRequired();    
        $this->defaultClientScopes = $builder->getDefaultClientScopes();    
        $this->defaultRoles = $builder->getDefaultRoles();    
        $this->description = $builder->getDescription();    
        $this->directAccessGrantsEnabled = $builder->getDirectAccessGrantsEnabled();    
        $this->enabled = $builder->getEnabled();    
        $this->frontchannelLogout = $builder->getFrontchannelLogout();    
        $this->fullScopeAllowed = $builder->getFullScopeAllowed();    
        $this->id = $builder->getId();    
        $this->implicitFlowEnabled = $builder->getImplicitFlowEnabled();    
        $this->name = $builder->getName();    
        $this->nodeReRegistrationTimeout = $builder->getNodeReRegistrationTimeout();    
        $this->notBefore = $builder->getNotBefore();    
        $this->optionalClientScopes = $builder->getOptionalClientScopes();    
        $this->origin = $builder->getOrigin();    
        $this->protocol = $builder->getProtocol();    
        $this->protocolMappers = $builder->getProtocolMappers();    
        $this->publicClient = $builder->getPublicClient();    
        $this->redirectUris = $builder->getRedirectUris();    
        $this->registeredNodes = $builder->getRegisteredNodes();    
        $this->registrationAccessToken = $builder->getRegistrationAccessToken();    
        $this->rootUrl = $builder->getRootUrl();    
        $this->secret = $builder->getSecret();    
        $this->serviceAccountsEnabled = $builder->getServiceAccountsEnabled();    
        $this->standardFlowEnabled = $builder->getStandardFlowEnabled();    
        $this->surrogateAuthRequired = $builder->getSurrogateAuthRequired();    
        $this->webOrigins = $builder->getWebOrigins();    
    }

    static function createBuilder()
    {
        return new ClientRepresentationBuilder();
    }
}