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
        $this->realmManagementClientId = $_ENV['KEYCLOAK_REALM_MANAGEMENT_CLIENT_ID'];
    }

    public function createClient(ClientRepresentation $representation): ?string
    {
        $jsonString = json_encode($this->removeNulls($representation));
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}",
        ];
        $response = $this->http->post($this->getClientManagementUri(null),
            [
                'headers' => $headers,
                'body'    => $jsonString
            ]);
        if ($response->getStatusCode() != 201) {
            throw new RuntimeException("Client not created!");
        } else {
            echo "Client created successfully\n";
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
        $updateUri = $this->getClientManagementUri($id);
        $jsonString = json_encode($this->removeNulls($representation));
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
        $rolesUri = $this->getRolesManagmentUri($id, null);
        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => "Bearer {$this->getAccessToken()}"
        ];
        foreach($roles as $role)
        {
            $jsonString = json_encode($this->removeNulls($role));
            $updatedResponse = $this->http->post($rolesUri, [
                'headers' => $headers,
                'body' => $jsonString
            ]);
            if ($updatedResponse->getStatusCode() !== 201) {
                throw new RuntimeException("Role {$role->name} cannot be added");
            }
            echo "Role {$role->name} added successfully\n";
        }
    }

    public function setRoles($id, $newRoles)
    {
        $rolesUri = $this->getRolesManagmentUri($id, null);
        $headers = [
            'Authorization' => "Bearer {$this->getAccessToken()}"
        ];
        $rolesResponse = $this->http->get($rolesUri, ['headers' => $headers]);
        $roles = json_decode($rolesResponse->getBody());
        $roleNames = array_map(function($role) {
            return $role->name;
        }, $roles);
        $this->removeRoles($id, $roleNames);
        $this->addRoles($id, $newRoles);
    }

    public function removeRoles($id, $roleNames)
    {
        foreach($roleNames as $roleName)
        {
            $rolesUri = $this->getRolesManagmentUri($id, $roleName);
            $headers = [
                'Authorization' => "Bearer {$this->getAccessToken()}"
            ];
            $roleResponse = $this->http->get($rolesUri, ['headers' => $headers]);
            if ($roleResponse->getStatusCode() != 200)
            {
                throw new RuntimeException("Role {$roleName} does not exist!");
            }
            $deleteResponse = $this->http->delete($rolesUri, ['headers' => $headers]);
            if ($deleteResponse->getStatusCode() != 204)
            {
                throw new RuntimeException("Role {$roleName} cannot be deleted");
            }
            echo "Role {$roleName} deleted successfully\n";
        }
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

    private function removeNulls($jsonObject): object    {
        return (object) array_filter((array) $jsonObject);
    }

    private function getClientManagementUri(?string $id): string {
        return sprintf($_ENV['KEYCLOAK_CLIENT_MANAGEMENT_URI'], $this->realm, $id);
    }

    private function getAccessTokenUri(): string {
        return sprintf($_ENV['KEYCLOAK_ACCESS_TOKEN_URI'], $this->realm);
    }

    private function getRolesManagmentUri(string $id, ?string $roleName)
    {
        return sprintf($_ENV['KEYCLOAK_ROLE_MGMT_URI'], $this->realm, $id, $roleName);
    }
}