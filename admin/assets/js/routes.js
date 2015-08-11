
// configure routes
admin.config(function($routeProvider, $locationProvider){
  $routeProvider

    // main nav pages
    .when('/', {
      templateUrl: 'views/home.html',
      controller: 'mainCtrl',
      activetab: 'home'
    })
    .when('/artists', {
      templateUrl: 'views/artists.html',
      controller: 'artistCtrl',
      activetab: 'artists'
    })
    .when('/artists/add', {
      templateUrl: 'views/artist-add.html',
      controller: 'addArtistCtrl',
      activetab: 'artists'
    })
    .when('/artists/:id', {
      templateUrl: 'views/artist-edit.html',
      controller: 'editArtistCtrl',
      activetab: 'artists'
    })
    .when('/sheetmusic', {
      templateUrl: 'views/sheetmusic.html',
      controller: 'musicCtrl',
      activetab: 'sheetmusic'
    })
    .when('/media', {
      templateUrl: 'views/media.html',
      controller: 'mediaCtrl',
      activetab: 'media'
    })
    .when('/rentals', {
      templateUrl: 'views/rentals.html',
      controller: 'rentalCtrl',
      activetab: 'rentals'
    })
    .when('/rentals/add', {
      templateUrl: 'views/rental-add.html',
      controller: 'addRentalCtrl',
      activetab: 'rentals'
    })
    .when('/rentals/:id', {
      templateUrl: 'views/rental-edit.html',
      controller: 'editRentalCtrl',
      activetab: 'rentals'
    })
    .when('/audio-video', {
      templateUrl: 'views/audio-video.html',
      controller: 'avCtrl',
      activetab: 'audiovideo'
    })
    .when('/featured', {
      templateUrl: 'views/featured.html',
      controller: 'featCtrl',
      activetab: 'featured'
    })

    // catch all
    .otherwise({ redirectTo: '/' });

    // HTML5 History API
    $locationProvider.html5Mode(true);
});