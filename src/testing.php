<?php

use Dotenv\Dotenv;
use nononsensecode\KeyCloakAdminClient\Client;
use nononsensecode\KeyCloakAdminClient\model\ClientRepresentation;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$client = new Client();

$representation = ClientRepresentation::createBuilder()
    ->clientId("test-one-more-client")->build();

$client->createClient($representation);