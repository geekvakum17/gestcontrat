<?php
// Déclaration des fichiers
require './main/models/connexion/Database.php';
require './main/models/request/UserRequest.php';

// Instanciation des classes
$Database = new Database(); // Chaine de connexion
$UserRequest = new UserRequest($Database->getconnexion());