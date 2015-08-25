<?php
// for composer ---
//require "../autoload.php"; ##from root vendors/autoload.php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

include 'functions/db.php';
include 'functions/sql_stmts.php';
include 'functions/data_functions.php';
include 'functions/featured.php';
include 'functions/medias.php';
include 'functions/artists.php';
include 'functions/rentals.php';
include 'functions/solos.php';
include 'functions/duos.php';
include 'functions/sheetmusic.php';
include 'functions/books.php';
include 'functions/dashboard.php';

// initialize app
$app = new \Slim\Slim();

/* --------------------------------------------------------------- *
*                     define service endpoints                     *
* ---------------------------------------------------------------- */
$app->get('/', function() use($app) {
    $app->response->setStatus(200);
    echo "This is the service root";
});

// main nav pages
$app->get('/featured', 'getFeatures');
$app->get('/medias', 'getMedias');
$app->get('/media/:id', 'getMediaDetail');
$app->get('/artists', 'getArtists');
$app->get('/artist/:id', 'getArtist');
$app->get('/rentals', 'getRentals');

// sheet music general
$app->get('/search', 'getAllMusic');
$app->get('/music/:id', 'getMusicDetail');

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

// sheet music duets
$app->get('/duets/snare', 'getSnareDuos');
$app->get('/duets/marimba-harp', 'getMarimbaHarp');
$app->get('/duets/marimba', 'getMarimbaDuos');
$app->get('/duets/marimba-vibes', 'getMarimbaVibes');
$app->get('/duets/marimba-strings', 'getMarimbaStr');
$app->get('/duets/marimba-guitar', 'getMarimbaGuitar');
$app->get('/duets/marimba-voice', 'getMarimbaVoice');
$app->get('/duets/marimba-timpani', 'getMarimbaTimp');
$app->get('/duets/marimba-perc', 'getMarimbaPerc');
$app->get('/duets/marimba-woodwinds', 'getMarimbaWw');
$app->get('/duets/timpani', 'getTimpDuos');
$app->get('/duets/timpani-piano', 'getTimpPno');
$app->get('/duets/timpani-woodwinds', 'getTimpWw');
$app->get('/duets/timpani-perc', 'getTimpPerc');
$app->get('/duets/vibes-piano', 'getVibePno');
$app->get('/duets/vibes-strings', 'getVibeStr');
$app->get('/duets/multi', 'getMultiDuos');
$app->get('/duets/multi-voice', 'getMultiVox');
$app->get('/duets/multi-woodwinds', 'getMultiWw');

// sheet music (no sub-menu)
$app->get('/trios', 'getTrios');
$app->get('/quartets', 'getQuartets');
$app->get('/ensemble', 'getEns');
$app->get('/steelband', 'getSteel');
$app->get('/orchestra', 'getOrch');
$app->get('/band', 'getBand');
$app->get('/mixed', 'getMixed');

// sheet music method books
$app->get('/books/mallets', 'getMalletBooks');
$app->get('/books/snare', 'getSnareBooks');
$app->get('/books/timpani', 'getTimpBooks');
$app->get('/books/world', 'getWorldBooks');
$app->get('/books/general', 'getGeneralBooks');

/* --------------------------------------------------------------- *
*                      admin service endpoints                     *
* ---------------------------------------------------------------- */
// artists
$app->post('/add/artist', 'addArtist');
$app->put('/update/artist/:id', 'updateArtist');
$app->delete('/delete/artist/:id', 'deleteArtist');

// rentals
$app->get('/rental/:id', 'getRental');
$app->post('/add/rental', 'addRental');
$app->put('/update/rental/:id', 'updateRental');
$app->delete('/delete/rental/:id', 'deleteRental');

// medias
$app->post('/add/media', 'addMedia');
$app->put('/update/media/:id', 'updateMedia');
$app->delete('/delete/media/:id', 'deleteMedia');

// sheet music
$app->post('/add/music', 'addMusic');
$app->put('/update/music/:id', 'updateMusic');
$app->delete('/delete/music/:id', 'deleteMusic');

// audio/video
$app->get('/av', 'getAVs');
$app->get('/av/:id', 'getAV');
$app->post('/add/av', 'addAV');
$app->put('/update/av/:id', 'updateAV');
$app->delete('/delete/av/:id', 'deleteAV');

// featured
$app->put('/update/features', 'updateFeatures');

// run app
$app->run();