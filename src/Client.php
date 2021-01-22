<?php

namespace nononsensecode\KeyCloakAdminClient;

use GuzzleHttp\Client as GuzzleHttpClient;
use nononsensecode\KeyCloakAdminClient\model\AccessToken;
use nononsensecode\KeyCloakAdminClient\model\ClientRepresentation;
use RuntimeException;

class Client
{
    private GuzzleHttpClient $http;
    private string $realm;
    private string $clientSecret;
    private string $accessTokenUri;
    private string $clientManagementUri;
    private string $realmManagementClientId;

    function __construct()
    {
        $this->http = new GuzzleHttpClient([
            'base_uri' => $_ENV['KEYCLOAK_BASE_URL'],
            'timeout'  => 2.0
        ]);
        $this->realm = $_ENV['KEYCLOAK_REALM'];
        $this->clientSecret = $_ENV['KEYCLOAK_CLIENT_SECRET'];
        $this->accessTokenUri = $this->getAccessTokenUri();
        $this->clientManagementUri = $this->getClientManagementUri();
        $this->realmManagementClientId = $_ENV['KEYCLOAK_REALM_MANAGEMENT_CLIENT_ID'];
    }

    public function createClient(ClientRepresentation $representation): ?string
    {
        $jsonString = $this->getJsonString($representation);
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}",
        ];
        $response = $this->http->post($this->clientManagementUri,
            [
                'headers' => $headers,
                'body'    => $jsonString
            ]);
        if ($response->getStatusCode() != 201) {
            throw new RuntimeException("Client not created!");
        } else {
            echo "Client created successfully";
        }

        if (!empty($response->getHeader('Location'))) {
            $location = $response->getHeader('Location')[0];
            return basename($location);        
        } else {
            return null;
        }
    }

    public function updateClient(string $id, ClientRepresentation $representation)
    {
        $updateUri = $this->getClientManagementUri() . "/{$id}";
        $jsonString = $this->getJsonString($representation);
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}"
        ];
        $updateResponse = $this->http->put($updateUri, [
            'body' => $jsonString,
            'headers' => $headers
        ]);
        if ($updateResponse->getStatusCode() !== 204)
        {
            throw new RuntimeException("Client not updated");
        }
    }

    public function addRoles($id, $roles)
    {
        $updateUri = $this->getClientManagementUri() . "/{$id}";
        $headers = [
            'Authorization' => "Bearer {$this->getAccessToken()}"
        ];
        $updatedResponse = $this->http->put($updateUri, [
            'headers' => $headers,
            'json' => [
                'defaultRoles' => $roles
            ]
        ]);
        if ($updatedResponse->getStatusCode() !== 204) {
            throw new RuntimeException("Roles not added");
        }
    }

    public function setRoles($id, $roles)
    {

    }

    public function removeRoles($id, $roles)
    {

    }

    private function getAccessToken(): AccessToken
    {
        $grantType = 'client_credentials';
        $accessTokenResponse = $this->http->post($this->accessTokenUri, [
            'form_params' => [
                'client_id' => $this->realmManagementClientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => $grantType
            ]
        ]);
        if ($accessTokenResponse->getStatusCode() !== 200) {
            throw new RuntimeException("Access token is not received");
        }
        $accessTokenBody = json_decode($accessTokenResponse->getBody());
        return new AccessToken($accessTokenBody);
    }

    private function getJsonString($jsonObject): string {
        $object = (object) array_filter((array) $jsonObject);
        return json_encode($object);
    }

    private function getClientManagementUri(): string {
        return sprintf($_ENV['KEYCLOAK_CLIENT_MANAGEMENT_URI'], $this->realm);
    }

    private function getAccessTokenUri(): string {
        return sprintf($_ENV['KEYCLOAK_ACCESS_TOKEN_URI'], $this->realm);
    }
}