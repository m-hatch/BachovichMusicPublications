// base module
var app = angular.module('bmpApp', ['ngRoute']);

// configure routes
app.config(function($routeProvider, $locationProvider){
  $routeProvider

    // main nav pages
    .when('/', {
      templateUrl: 'pages/home.html',
      controller: 'mainCtrl'
    })
    .when('/media', {
      templateUrl: 'pages/media.html',
      controller: 'mediaCtrl'
    })
    .when('/artists', {
      templateUrl: 'pages/artists.html',
      controller: 'artistsCtrl'
    })
    .when('/artist/:id', {
      templateUrl: 'pages/artist.html',
      controller: 'artistCtrl'
    })
    .when('/rentals', {
      templateUrl: 'pages/rentals.html',
      controller: 'rentalCtrl'
    })
    .when('/contact', {
      templateUrl: 'pages/contact.html',
      controller: 'contactCtrl'
    })

    // solos
    .when('/solos/marimba', {
      templateUrl: 'pages/music.html',
      controller: 'soloMarCtrl'
    })
    .when('/solos/marimba-vibes', {
      templateUrl: 'pages/music.html',
      controller: 'soloMvCtrl'
    })
    .when('/solos/xylophone', {
      templateUrl: 'pages/music.html',
      controller: 'soloXyloCtrl'
    })
    .when('/solos/gyil', {
      templateUrl: 'pages/music.html',
      controller: 'soloGyilCtrl'
    })
    .when('/solos/hand-drum', {
      templateUrl: 'pages/music.html',
      controller: 'soloHdCtrl'
    })
    .when('/solos/vibes', {
      templateUrl: 'pages/music.html',
      controller: 'soloVibeCtrl'
    })
    .when('/solos/timpani', {
      templateUrl: 'pages/music.html',
      controller: 'soloTimpCtrl'
    })
    .when('/solos/drumset', {
      templateUrl: 'pages/music.html',
      controller: 'soloDsCtrl'
    })
    .when('/solos/multi', {
      templateUrl: 'pages/music.html',
      controller: 'soloMultiCtrl'
    })
    .when('/solos/snare', {
      templateUrl: 'pages/music.html',
      controller: 'soloSdCtrl'
    })
    .when('/solos/pan', {
      templateUrl: 'pages/music.html',
      controller: 'soloPanCtrl'
    })

    // duets
    .when('/duets/snare', {
      templateUrl: 'pages/music.html',
      controller: 'duetSnareCtrl'
    })
    .when('/duets/marimba-harp', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarHpCtrl'
    })
    .when('/duets/marimba', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarCtrl'
    })
    .when('/duets/marimba-vibes', {
      templateUrl: 'pages/music.html',
      controller: 'duetMvCtrl'
    })
    .when('/duets/marimba-strings', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarStrCtrl'
    })
    .when('/duets/marimba-guitar', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarGuitarCtrl'
    })
    .when('/duets/marimba-voice', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarVoxCtrl'
    })
    .when('/duets/marimba-timpani', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarTimpCtrl'
    })
    .when('/duets/marimba-perc', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarPercCtrl'
    })
    .when('/duets/marimba-woodwinds', {
      templateUrl: 'pages/music.html',
      controller: 'duetMarWwCtrl'
    })
    .when('/duets/timpani', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/timpani-piano', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/timpani-woodwinds', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/timpani-perc', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/vibes-piano', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/vibes-strings', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/multi', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/multi-voice', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })
    .when('/duets/multi-woodwinds', {
      templateUrl: 'pages/music.html',
      controller: 'mainCtrl'
    })

    // catch all
    .otherwise({ redirectTo: '/' });

    // HTML5 History API
    $locationProvider.html5Mode(true);
});