<?php
// for composer ---
//require "../../autoload.php"; ##from root vendors/autoload.php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

include 'functions/db.php';
include 'functions/medias.php';
include 'functions/artists.php';
include 'functions/rentals.php';

// initialize app
$app = new \Slim\Slim();

// define service endpoints
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "This is the service root";
});
$app->get('/medias', 'getMedias');
$app->get('/artists', 'getArtists');
$app->get('/artist/:id', 'getArtist');
$app->post('/add/artist', 'addArtist');
$app->put('/update/artist/:id', 'updateArtist');
$app->delete('/delete/artist/:id', 'deleteArtist');
$app->get('/rentals', 'getRentals');


$app->run();