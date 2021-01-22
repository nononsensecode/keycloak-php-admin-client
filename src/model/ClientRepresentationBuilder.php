<?php

namespace nononsensecode\KeyCloakAdminClient\model;

class ClientRepresentationBuilder
{
    private $access;
    private ?string $adminUrl;
    private $attributes;
    private $authenticationFlowBindingOverrides;
    private bool $authorizationServicesEnabled;
    private ?ResourceServerRepresentation $authorizationSettings;
    private ?string $baseUrl;
    private ?bool $bearerOnly;
    private ?string $clientAuthenticatorType;
    private ?string $clientId;
    private ?bool $consentRequired;
    private $defaultClientScopes;
    private $defaultRoles;
    private ?string $description;
    private ?bool $directAccessGrantsEnabled;
    private ?bool $enabled;
    private ?bool $frontchannelLogout;
    private ?bool $fullScopeAllowed;
    private ?string $id;
    private ?bool $implicitFlowEnabled;
    private ?string $name;
    private ?int $nodeReRegistrationTimeout;
    private ?int $notBefore;
    private $optionalClientScopes;
    private ?string $origin;
    private ?string $protocol;
    private $protocolMappers;
    private $publicClient;
    private $redirectUris;
    private $registeredNodes;
    private ?string $registrationAccessToken;
    private ?string $rootUrl;
    private ?string $secret;
    private ?bool $serviceAccountsEnabled;
    private ?bool $standardFlowEnabled;
    private ?bool $surrogateAuthRequired;
    private $webOrigins;

    function __construct()
    {
        $this->access = [];
        $this->adminUrl = null;
        $this->attributes = [];
        $this->authenticationFlowBindingOverrides = [];
        $this->authorizationServicesEnabled = false;
        $this->authorizationSettings = null;
        $this->baseUrl = null;
        $this->bearerOnly = false;
        $this->clientAuthenticatorType = null;
        $this->clientId = null;
        $this->consentRequired = false;
        $this->defaultClientScopes = [];
        $this->defaultRoles = [];
        $this->description = null;
        $this->directAccessGrantsEnabled = false;
        $this->enabled = true;
        $this->frontchannelLogout = false;
        $this->fullScopeAllowed = false;
        $this->id = null;
        $this->implicitFlowEnabled = false;
        $this->name = null;
        $this->nodeReRegistrationTimeout = 5;
        $this->notBefore = 5;
        $this->optionalClientScopes = [];
        $this->origin = null;
        $this->protocol = null;
        $this->protocolMappers = [];
        $this->publicClient = false;
        $this->redirectUris = [];
        $this->registeredNodes = [];
        $this->registrationAccessToken = null;
        $this->rootUrl = null;
        $this->secret = null;
        $this->serviceAccountsEnabled = false;
        $this->standardFlowEnabled = true;
        $this->surrogateAuthRequired = false;
        $this->webOrigins = [];
    }

    public function access($access): ClientRepresentationBuilder
    {
        $this->access = $access;
        return $this;
    }

    public function adminUrl($adminUrl): ClientRepresentationBuilder
    {
        $this->adminUrl = $adminUrl;
        return $this;
    }

    public function attributes($attributes): ClientRepresentationBuilder
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function authenticationFlowBindingOverrides($authenticationFlowBindingOverrides): ClientRepresentationBuilder
    {
        $this->authenticationFlowBindingOverrides = $authenticationFlowBindingOverrides;
        return $this;
    }

    public function authorizationServicesEnabled($authorizationServicesEnabled): ClientRepresentationBuilder
    {
        $this->authorizationServicesEnabled = $authorizationServicesEnabled;
        return $this;
    }

    public function authorizationSettings($authorizationSettings): ClientRepresentationBuilder
    {
        $this->authorizationSettings = $authorizationSettings;
        return $this;
    }

    public function baseUrl($baseUrl): ClientRepresentationBuilder
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    public function bearerOnly($bearerOnly): ClientRepresentationBuilder
    {
        $this->bearerOnly = $bearerOnly;
        return $this;
    }

    public function clientAuthenticatorType($clientAuthenticatorType): ClientRepresentationBuilder
    {
        $this->clientAuthenticatorType = $clientAuthenticatorType;
        return $this;
    }

    public function clientId($clientId): ClientRepresentationBuilder
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function consentRequired($consentRequired): ClientRepresentationBuilder
    {
        $this->consentRequired = $consentRequired;
        return $this;
    }

    public function defaultClientScopes($defaultClientScopes): ClientRepresentationBuilder
    {
        $this->defaultClientScopes = $defaultClientScopes;
        return $this;
    }

    public function defaultRoles($defaultRoles): ClientRepresentationBuilder
    {
        $this->defaultRoles = $defaultRoles;
        return $this;
    }

    public function description($description): ClientRepresentationBuilder
    {
        $this->description = $description;
        return $this;
    }

    public function directAccessGrantsEnabled($directAccessGrantsEnabled): ClientRepresentationBuilder
    {
        $this->directAccessGrantsEnabled = $directAccessGrantsEnabled;
        return $this;
    }

    public function enabled($enabled): ClientRepresentationBuilder
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function frontchannelLogout($frontchannelLogout): ClientRepresentationBuilder
    {
        $this->frontchannelLogout = $frontchannelLogout;
        return $this;
    }

    public function fullScopeAllowed($fullScopeAllowed): ClientRepresentationBuilder
    {
        $this->fullScopeAllowed = $fullScopeAllowed;
        return $this;
    }

    public function id($id): ClientRepresentationBuilder
    {
        $this->id = $id;
        return $this;
    }

    public function implicitFlowEnabled($implicitFlowEnabled): ClientRepresentationBuilder
    {
        $this->implicitFlowEnabled = $implicitFlowEnabled;
        return $this;
    }

    public function name($name): ClientRepresentationBuilder
    {
        $this->name = $name;
        return $this;
    }

    public function nodeReRegistrationTimeout($nodeReRegistrationTimeout): ClientRepresentationBuilder
    {
        $this->nodeReRegistrationTimeout = $nodeReRegistrationTimeout;
        return $this;
    }

    public function notBefore($notBefore): ClientRepresentationBuilder
    {
        $this->notBefore = $notBefore;
        return $this;
    }

    public function optionalClientScopes($optionalClientScopes): ClientRepresentationBuilder
    {
        $this->optionalClientScopes = $optionalClientScopes;
        return $this;
    }

    public function origin($origin): ClientRepresentationBuilder
    {
        $this->origin = $origin;
        return $this;
    }

    public function protocol($protocol): ClientRepresentationBuilder
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function protocolMappers($protocolMappers): ClientRepresentationBuilder
    {
        $this->protocolMappers = $protocolMappers;
        return $this;
    }

    public function publicClient($publicClient): ClientRepresentationBuilder
    {
        $this->publicClient = $publicClient;
        return $this;
    }

    public function redirectUris($redirectUris): ClientRepresentationBuilder
    {
        $this->redirectUris = $redirectUris;
        return $this;
    }

    public function registeredNodes($registeredNodes): ClientRepresentationBuilder
    {
        $this->registeredNodes = $registeredNodes;
        return $this;
    }

    public function registrationAccessToken($registrationAccessToken): ClientRepresentationBuilder
    {
        $this->registrationAccessToken = $registrationAccessToken;
        return $this;
    }

    public function rootUrl($rootUrl): ClientRepresentationBuilder
    {
        $this->rootUrl = $rootUrl;
        return $this;
    }

    public function secret($secret): ClientRepresentationBuilder
    {
        $this->secret = $secret;
        return $this;
    }

    public function serviceAccountsEnabled($serviceAccountsEnabled): ClientRepresentationBuilder
    {
        $this->serviceAccountsEnabled = $serviceAccountsEnabled;
        return $this;
    }

    public function standardFlowEnabled($standardFlowEnabled): ClientRepresentationBuilder
    {
        $this->standardFlowEnabled = $standardFlowEnabled;
        return $this;
    }

    public function surrogateAuthRequired($surrogateAuthRequired): ClientRepresentationBuilder
    {
        $this->surrogateAuthRequired = $surrogateAuthRequired;
        return $this;
    }

    public function webOrigins($webOrigins): ClientRepresentationBuilder
    {
        $this->webOrigins = $webOrigins;
        return $this;
    }


    public function getAccess()
    {
        return $this->access;
    }

    public function getAdminUrl()
    {
        return $this->adminUrl;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getAuthenticationFlowBindingOverrides()
    {
        return $this->authenticationFlowBindingOverrides;
    }

    public function getAuthorizationServicesEnabled()
    {
        return $this->authorizationServicesEnabled;
    }

    public function getAuthorizationSettings()
    {
        return $this->authorizationSettings;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getBearerOnly()
    {
        return $this->bearerOnly;
    }

    public function getClientAuthenticatorType()
    {
        return $this->clientAuthenticatorType;
    }

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getConsentRequired()
    {
        return $this->consentRequired;
    }

    public function getDefaultClientScopes()
    {
        return $this->defaultClientScopes;
    }

    public function getDefaultRoles()
    {
        return $this->defaultRoles;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDirectAccessGrantsEnabled()
    {
        return $this->directAccessGrantsEnabled;
    }

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function getFrontchannelLogout()
    {
        return $this->frontchannelLogout;
    }

    public function getFullScopeAllowed()
    {
        return $this->fullScopeAllowed;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImplicitFlowEnabled()
    {
        return $this->implicitFlowEnabled;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNodeReRegistrationTimeout()
    {
        return $this->nodeReRegistrationTimeout;
    }

    public function getNotBefore()
    {
        return $this->notBefore;
    }

    public function getOptionalClientScopes()
    {
        return $this->optionalClientScopes;
    }

    public function getOrigin()
    {
        return $this->origin;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function getProtocolMappers()
    {
        return $this->protocolMappers;
    }

    public function getPublicClient()
    {
        return $this->publicClient;
    }

    public function getRedirectUris()
    {
        return $this->redirectUris;
    }

    public function getRegisteredNodes()
    {
        return $this->registeredNodes;
    }

    public function getRegistrationAccessToken()
    {
        return $this->registrationAccessToken;
    }

    public function getRootUrl()
    {
        return $this->rootUrl;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getServiceAccountsEnabled()
    {
        return $this->serviceAccountsEnabled;
    }

    public function getStandardFlowEnabled()
    {
        return $this->standardFlowEnabled;
    }

    public function getSurrogateAuthRequired()
    {
        return $this->surrogateAuthRequired;
    }

    public function getWebOrigins()
    {
        return $this->webOrigins;
    }

    public function build(): ClientRepresentation
    {
        return new ClientRepresentation($this);
    }
}