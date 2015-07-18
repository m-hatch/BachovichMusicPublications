// base module
var app = angular.module('bmpApp', ['ngRoute']);

// configure routes
app.config(function($routeProvider, $locationProvider){
  $routeProvider

    // home
    .when('/', {
      templateUrl: 'pages/home.html',
      controller: 'mainCtrl'
    })
    // media
    .when('/media', {
      templateUrl: 'pages/media.html',
      controller: 'mediaCtrl'
    })
    // artists
    .when('/artists', {
      templateUrl: 'pages/artists.html',
      controller: 'artistsCtrl'
    })
    // artist detail
    .when('/artist/:id', {
      templateUrl: 'pages/artist.html',
      controller: 'artistCtrl'
    })
    // rentals
    .when('/rentals', {
      templateUrl: 'pages/rentals.html',
      controller: 'rentalCtrl'
    })
    // contact
    .when('/contact', {
      templateUrl: 'pages/contact.html',
      controller: 'contactCtrl'
    })
    // catch all
    .otherwise({ redirectTo: '/' });

    // HTML5 History API
    $locationProvider.html5Mode(true);
});

// controllers
app.controller('mainCtrl', function($scope){
  $scope.message = 'Home';
});
app.controller('mediaCtrl', function($scope, $http){
  $http.get('api/medias')
  .success(function(response) {
    $scope.medias = response;
  });
});
app.controller('artistsCtrl', function($scope, $http){
  $http.get('api/artists')
  .success(function(response) {
    $scope.artists = response;
  });
});
app.controller('artistCtrl', function($scope, $http, $routeParams){
  $http.get('api/artist/' + $routeParams.id)
  .success(function(response) {
      $scope.artist = response;
    });
});
app.controller('rentalCtrl', function($scope, $http){
  $http.get('api/rentals')
  .success(function(response) {
    $scope.rentals = response;
  });
});
app.controller('contactCtrl', function($scope){
  $scope.message = 'Contact';
});