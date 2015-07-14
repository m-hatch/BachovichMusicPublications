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
app.controller('mediaCtrl', function($scope){
  $scope.message = 'Media';
});
app.controller('artistCtrl', function($scope){
  $scope.message = 'Artists';
});
app.controller('rentalCtrl', function($scope, $http){
  $http.get("api/rentals")
  .success(function(response) {
    $scope.rentals = response;
  });
});
app.controller('contactCtrl', function($scope){
  $scope.message = 'Contact';
});