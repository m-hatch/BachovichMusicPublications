<?php
// for composer ---
//require "../../autoload.php"; ##from root vendors/autoload.php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

include 'functions/db.php';
include 'functions/medias.php';
include 'functions/artists.php';
include 'functions/rentals.php';
include 'functions/solos.php';

// initialize app
$app = new \Slim\Slim();

/* define service endpoints */
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "This is the service root";
});

// main nav pages
$app->get('/medias', 'getMedias');
$app->get('/artists', 'getArtists');
$app->get('/artist/:id', 'getArtist');
$app->post('/add/artist', 'addArtist');
$app->put('/update/artist/:id', 'updateArtist');
$app->delete('/delete/artist/:id', 'deleteArtist');
$app->get('/rentals', 'getRentals');

// sheet music solos
$app->get('/solos/marimba', 'getMarimbaSolos');
$app->get('/solos/marimba-vibes', 'getMarimbaVibesSolos');
$app->get('/solos/xylophone', 'getXyloSolos');
$app->get('/solos/gyil', 'getGyilSolos');
$app->get('/solos/hand-drum', 'getHandDrSolos');
$app->get('/solos/vibes', 'getVibeSolos');
$app->get('/solos/timpani', 'getTimpSolos');
$app->get('/solos/drumset', 'getDrumsetSolos');
$app->get('/solos/multi', 'getMultiSolos');
$app->get('/solos/snare', 'getSnareSolos');
$app->get('/solos/pan', 'getPanSolos');


$app->run();