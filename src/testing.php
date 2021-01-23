<?php

use Dotenv\Dotenv;
use nononsensecode\KeyCloakAdminClient\Client;
use nononsensecode\KeyCloakAdminClient\model\ClientRepresentation;
use nononsensecode\KeyCloakAdminClient\model\RoleRepresentation;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$client = new Client();

$representation = ClientRepresentation::createBuilder()
    ->createPublicClient("test-one-more-client")->build();

$id = $client->createClient($representation);


// $client->addRoles($id, [
//     new RoleRepresentation("admin"),
//     new RoleRepresentation("user")
// ]);

// $client->removeRoles($id, ['user']);

$client->setRoles($id, [
    new RoleRepresentation("hero"),
    new RoleRepresentation("villain")
]);