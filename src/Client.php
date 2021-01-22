<?php

namespace nononsensecode\KeyCloakAdminClient;

use GuzzleHttp\Client as GuzzleHttpClient;
use nononsensecode\KeyCloakAdminClient\model\ClientRepresentation;
use RuntimeException;

class Client
{
    private GuzzleHttpClient $http;

    function __construct()
    {
        $this->http = new GuzzleHttpClient();
    }

    public function createClient(ClientRepresentation $representation)
    {
        $url = $this->keycloakClientUrl();
        echo json_encode($representation) . "\n";
        $response = $this->http->post($url, [
            'debug'   => true,
            'data'    => '{"enabled": "true", "authorizationSettings": "testing-php-client"}',
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $_ENV['KEYCLOAK_ACCESS_TOKEN'],
            ]
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RuntimeException("Client not created!");
        } else {
            echo "Client created successfully";
        }
    }

    private function keycloakClientUrl(): string
    {
        $url = $_ENV["KEYCLOAK_URL"];
        $realm = $_ENV['KEYCLOAK_REALM'];
        return $url . '/' . $realm . '/clients';
    }
}