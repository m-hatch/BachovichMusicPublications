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

    // catch all
    .otherwise({ redirectTo: '/' });

    // HTML5 History API
    $locationProvider.html5Mode(true);
});