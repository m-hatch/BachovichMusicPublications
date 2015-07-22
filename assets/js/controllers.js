// main nav controllers
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

// solos controllers
app.controller('soloMarCtrl', function($scope, $http){
  $http.get('api/solos/marimba')
  .success(function(response) {
    $scope.heading = 'Solos - Marimba'
    $scope.musics = response;
  });
});
app.controller('soloMvCtrl', function($scope, $http){
  $http.get('api/solos/marimba-vibes')
  .success(function(response) {
    $scope.heading = 'Solos - Marimba/Vibes'
    $scope.musics = response;
  });
});
app.controller('soloXyloCtrl', function($scope, $http){
  $http.get('api/solos/xylophone')
  .success(function(response) {
    $scope.heading = 'Solos - Xylophone'
    $scope.musics = response;
  });
});
app.controller('soloGyilCtrl', function($scope, $http){
  $http.get('api/solos/gyil')
  .success(function(response) {
    $scope.heading = 'Solos - Gyil'
    $scope.musics = response;
  });
});
app.controller('soloHdCtrl', function($scope, $http){
  $http.get('api/solos/hand-drum')
  .success(function(response) {
    $scope.heading = 'Solos - Hand Drum'
    $scope.musics = response;
  });
});
app.controller('soloVibeCtrl', function($scope, $http){
  $http.get('api/solos/vibes')
  .success(function(response) {
    $scope.heading = 'Solos - Vibes'
    $scope.musics = response;
  });
});
app.controller('soloTimpCtrl', function($scope, $http){
  $http.get('api/solos/timpani')
  .success(function(response) {
    $scope.heading = 'Solos - Timpani'
    $scope.musics = response;
  });
});
app.controller('soloDsCtrl', function($scope, $http){
  $http.get('api/solos/drumset')
  .success(function(response) {
    $scope.heading = 'Solos - Drum Set'
    $scope.musics = response;
  });
});
app.controller('soloMultiCtrl', function($scope, $http){
  $http.get('api/solos/multi')
  .success(function(response) {
    $scope.heading = 'Solos - Multi-Percussion'
    $scope.musics = response;
  });
});
app.controller('soloSdCtrl', function($scope, $http){
  $http.get('api/solos/snare')
  .success(function(response) {
    $scope.heading = 'Solos - Snare Drum'
    $scope.musics = response;
  });
});
app.controller('soloPanCtrl', function($scope, $http){
  $http.get('api/solos/pan')
  .success(function(response) {
    $scope.heading = 'Solos - Steel Pan'
    $scope.musics = response;
  });
});

// duets controllers
app.controller('duetSnareCtrl', function($scope, $http){
  $http.get('api/duets/snare')
  .success(function(response) {
    $scope.heading = 'Duets - Snare Drum'
    $scope.musics = response;
  });
});
app.controller('duetMarHpCtrl', function($scope, $http){
  $http.get('api/duets/marimba-harp')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Harp'
    $scope.musics = response;
  });
});
app.controller('duetMarCtrl', function($scope, $http){
  $http.get('api/duets/marimba')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba'
    $scope.musics = response;
  });
});
app.controller('duetMvCtrl', function($scope, $http){
  $http.get('api/duets/marimba-vibes')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Vibes'
    $scope.musics = response;
  });
});
app.controller('duetMarStrCtrl', function($scope, $http){
  $http.get('api/duets/marimba-strings')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Strings'
    $scope.musics = response;
  });
});
app.controller('duetMarGuitarCtrl', function($scope, $http){
  $http.get('api/duets/marimba-guitar')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Guitar'
    $scope.musics = response;
  });
});
app.controller('duetMarVoxCtrl', function($scope, $http){
  $http.get('api/duets/marimba-voice')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Voice'
    $scope.musics = response;
  });
});
app.controller('duetMarTimpCtrl', function($scope, $http){
  $http.get('api/duets/marimba-timpani')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Timpani'
    $scope.musics = response;
  });
});
app.controller('duetMarPercCtrl', function($scope, $http){
  $http.get('api/duets/marimba-perc')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Percussion'
    $scope.musics = response;
  });
});
app.controller('duetMarWwCtrl', function($scope, $http){
  $http.get('api/duets/marimba-woodwinds')
  .success(function(response) {
    $scope.heading = 'Duets - Marimba/Woodwinds'
    $scope.musics = response;
  });
});