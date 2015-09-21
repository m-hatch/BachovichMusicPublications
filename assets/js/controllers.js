/* --------------------------------------------------------------- *
*                                                                  *
*                              main nav                            *
*                                                                  *
* -----------------------------------------------------------------*/
// main nav controllers
app.controller('mainCtrl', function($scope, $http, $route, $sce){
  $http.get('api/featured')
  .success(function(response) {
    $scope.feat_comp = response['composition'];
    $scope.feat_book = response['book'];
    $scope.feat_media = response['media'];
    $scope.feat_artist = response['artist'];
  });
  $scope.renderHtml = function(html_code){
    return $sce.trustAsHtml(html_code);
  };
  $scope.$route = $route; // for top nav highlighting
});
app.controller('mediasCtrl', function($scope, $http, $route){
  $http.get('api/medias')
  .success(function(response) {
    $scope.medias = response;
  });
  $scope.$route = $route;
});
app.controller('mediaCtrl', function($scope, $http, $routeParams, $sce){
  $http.get('api/media/' + $routeParams.id)
  .success(function(response) {
    $scope.media_detail = response;
  });
  $scope.renderHtml = function(html_code){
    return $sce.trustAsHtml(html_code);
  };
});
app.controller('artistsCtrl', function($scope, $http, $route){
  $http.get('api/artists')
  .success(function(response) {
    $scope.artists = response;
  });
  $scope.$route = $route;
});
app.controller('artistCtrl', function($scope, $http, $routeParams, $sce){
  $http.get('api/artist/' + $routeParams.id)
  .success(function(response) {
      $scope.artist = response;
    });
  $scope.renderHtml = function(html_code){
    return $sce.trustAsHtml(html_code);
  };
});
app.controller('rentalCtrl', function($scope, $http, $route){
  $http.get('api/rentals')
  .success(function(response) {
    $scope.rentals = response;
  });
  $scope.$route = $route;
});
app.controller('contactCtrl', function($scope, $route){
  $scope.$route = $route;
});
// search music input
app.controller('searchCtrl', function($scope, $route, $location, SearchService){
  $scope.saveSearch = function(query){
    SearchService.set(query);
    $location.path('/search');
    $route.reload();
  };
});
// search results
app.controller('searchResultCtrl', function($scope, $http, $timeout, SearchService){
  $scope.search_music = SearchService.get();
  $scope.ready_msg = false;
  $http.get('api/search')
  .success(function(response) {
    $scope.musics = response;
  });
  $timeout(callReady,1000);
  function callReady() {
    $scope.ready_msg = true;
  }
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              solos                               *
*                                                                  *
* -----------------------------------------------------------------*/
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

/* --------------------------------------------------------------- *
*                                                                  *
*                              duets                               *
*                                                                  *
* -----------------------------------------------------------------*/
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
app.controller('duetTimpCtrl', function($scope, $http){
  $http.get('api/duets/timpani')
  .success(function(response) {
    $scope.heading = 'Duets - Timpani'
    $scope.musics = response;
  });
});
app.controller('duetTimpPnoCtrl', function($scope, $http){
  $http.get('api/duets/timpani-piano')
  .success(function(response) {
    $scope.heading = 'Duets - Timpani/Piano'
    $scope.musics = response;
  });
});
app.controller('duetTimpWwCtrl', function($scope, $http){
  $http.get('api/duets/timpani-woodwinds')
  .success(function(response) {
    $scope.heading = 'Duets - Timpani/Woodwinds'
    $scope.musics = response;
  });
});
app.controller('duetTimpPercCtrl', function($scope, $http){
  $http.get('api/duets/timpani-perc')
  .success(function(response) {
    $scope.heading = 'Duets - Timpani/Percussion'
    $scope.musics = response;
  });
});
app.controller('duetVibePnoCtrl', function($scope, $http){
  $http.get('api/duets/vibes-piano')
  .success(function(response) {
    $scope.heading = 'Duets - Vibes/Piano'
    $scope.musics = response;
  });
});
app.controller('duetVibeStrCtrl', function($scope, $http){
  $http.get('api/duets/vibes-strings')
  .success(function(response) {
    $scope.heading = 'Duets - Vibes/Strings'
    $scope.musics = response;
  });
});
app.controller('duetMultiCtrl', function($scope, $http){
  $http.get('api/duets/multi')
  .success(function(response) {
    $scope.heading = 'Duets - Multi-Percussion'
    $scope.musics = response;
  });
});
app.controller('duetMultiStrCtrl', function($scope, $http){
  $http.get('api/duets/multi-strings')
  .success(function(response) {
    $scope.heading = 'Duets - Multi-Percussion/Strings'
    $scope.musics = response;
  });
});
app.controller('duetMultiVoxCtrl', function($scope, $http){
  $http.get('api/duets/multi-voice')
  .success(function(response) {
    $scope.heading = 'Duets - Multi-Percussion/Voice'
    $scope.musics = response;
  });
});
app.controller('duetMultiWwCtrl', function($scope, $http){
  $http.get('api/duets/multi-woodwinds')
  .success(function(response) {
    $scope.heading = 'Duets - Multi-Percussion/Woodwinds'
    $scope.musics = response;
  });
});

/* --------------------------------------------------------------- *
*                                                                  *
*                           no sub-menu                            *
*                                                                  *
* -----------------------------------------------------------------*/

// music detail controller
app.controller('musicCtrl', function($scope, $http, $routeParams, $sce){
  $http.get('api/music/' + $routeParams.id)
  .success(function(response) {
    $scope.music_detail = response;
  });
  $scope.renderHtml = function(html_code){
    return $sce.trustAsHtml(html_code);
  };
});

// no sub-menu controllers
app.controller('triosCtrl', function($scope, $http){
  $http.get('api/trios')
  .success(function(response) {
    $scope.heading = 'Trios'
    $scope.musics = response;
  });
});
app.controller('quartetsCtrl', function($scope, $http){
  $http.get('api/quartets')
  .success(function(response) {
    $scope.heading = 'Quartets'
    $scope.musics = response;
  });
});
app.controller('ensCtrl', function($scope, $http){
  $http.get('api/ensemble')
  .success(function(response) {
    $scope.heading = 'Percussion Ensemble'
    $scope.musics = response;
  });
});
app.controller('steelCtrl', function($scope, $http){
  $http.get('api/steelband')
  .success(function(response) {
    $scope.heading = 'Steel Band'
    $scope.musics = response;
  });
});
app.controller('orchCtrl', function($scope, $http){
  $http.get('api/orchestra')
  .success(function(response) {
    $scope.heading = 'Orchestra'
    $scope.musics = response;
  });
});
app.controller('bandCtrl', function($scope, $http){
  $http.get('api/band')
  .success(function(response) {
    $scope.heading = 'Concert Band'
    $scope.musics = response;
  });
});
app.controller('mixedCtrl', function($scope, $http){
  $http.get('api/mixed')
  .success(function(response) {
    $scope.heading = 'Mixed Ensemble'
    $scope.musics = response;
  });
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              books                               *
*                                                                  *
* -----------------------------------------------------------------*/
// method books controllers
app.controller('bookMalletsCtrl', function($scope, $http){
  $http.get('api/books/mallets')
  .success(function(response) {
    $scope.heading = 'Method Books - Mallets'
    $scope.musics = response;
  });
});
app.controller('bookSnareCtrl', function($scope, $http){
  $http.get('api/books/snare')
  .success(function(response) {
    $scope.heading = 'Method Books - Snare Drum'
    $scope.musics = response;
  });
});
app.controller('bookTimpCtrl', function($scope, $http){
  $http.get('api/books/timpani')
  .success(function(response) {
    $scope.heading = 'Method Books - Timpani'
    $scope.musics = response;
  });
});
app.controller('bookWorldCtrl', function($scope, $http){
  $http.get('api/books/world')
  .success(function(response) {
    $scope.heading = 'Method Books - World'
    $scope.musics = response;
  });
});
app.controller('bookGeneralCtrl', function($scope, $http){
  $http.get('api/books/general')
  .success(function(response) {
    $scope.heading = 'Method Books - General'
    $scope.musics = response;
  });
});