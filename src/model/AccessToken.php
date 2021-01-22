<?php

namespace nononsensecode\KeyCloakAdminClient\model;

use stdClass;

class AccessToken
{
    private string $accessToken;
    private int $expiresIn;
    private int $refreshExpiresIn;
    private string $tokenType;
    private int $notBefore;
    private $scopes;

    function __construct(stdClass $jsonObject)
    {
        $this->accessToken = $jsonObject->access_token;
        $this->expiresIn = $jsonObject->expires_in;
        $this->refreshExpiresIn = $jsonObject->refresh_expires_in;
        $this->tokenType = $jsonObject->token_type;
        $this->notBefore = $jsonObject->{'not-before-policy'};
        $this->scopes = explode($jsonObject->scope, " ");
    }

    function getAccessToken(): string {
        return $this->accessToken;
    }

    function __toString()
    {
        return $this->accessToken;
    }
}