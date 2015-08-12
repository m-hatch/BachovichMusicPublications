// home controller
admin.controller('mainCtrl', function($scope, $route){
  $scope.$route = $route; // for top nav highlighting
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              artists                             *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('artistCtrl', function($scope, $http, $route){
  $http.get('/api/artists')
  .success(function(response) {
    $scope.artists = response;
  });
  $scope.delete = function(id) {
    $http.delete('/api/delete/artist/' + id);
    /*
    .success(function() {
      $scope.msg = 'Deleted!';
    });*/
    $route.reload();
  };
});

admin.controller('addArtistCtrl', function($scope, $http, $route, $location, MsgService){
  $scope.formData = {
    "fname": null,
    "lname": null,
    "bio": null,
    "img": null
  };
  MsgService.set('');
  // process the form
  $scope.submit = function() {
    $http.post('/api/add/artist', $scope.formData)
    .success(function() {
      MsgService.set('Success!');
    });
    $location.path('artists');
  };
  $scope.message = MsgService.get();
  $scope.$route = $route;
});

admin.controller('editArtistCtrl', function($scope, $http, $route, $routeParams, $location){
  $scope.formData = {};
  $scope.msg = '';
  // get artist data
  $http.get('/api/artist/' + $routeParams.id)
  .success(function(response) {
    $scope.artist = response;
    $scope.formData.fname = response.fname;
    $scope.formData.lname = response.lname;
    $scope.formData.bio = response.bio;
    $scope.formData.img = response.img;
  });
  // process the form
  $scope.submit = function() {
    $http.put('/api/update/artist/' + $routeParams.id, $scope.formData)
    .success(function() {
      $scope.msg = 'Success!';
    });
    $location.path('artists');
  };
  $scope.$route = $route;
});

/* --------------------------------------------------------------- *
*                                                                  *
*                            sheet music                           *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('musicCtrl', function($scope, $http, $route){
  $http.get('api/medias')
  .success(function(response) {
    $scope.medias = response;
  });
  $scope.$route = $route;
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              media                               *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('mediaCtrl', function($scope, $http, $route){
  $http.get('/api/medias')
  .success(function(response) {
    $scope.medias = response;
  });
  $scope.delete = function(id) {
    $http.delete('/api/delete/media/' + id);
    /*
    .success(function() {
      $scope.msg = 'Deleted!';
    });*/
    $route.reload();
  };
});

admin.controller('addMediaCtrl', function($scope, $http, $route, $location, MsgService){
  $scope.formData = {
    "media_id": null,
    "artist_id": null,
    "type": null,
    "title": null,
    "description": null,
    "price": null,
    "img": null,
    "shipping": null
  };
  MsgService.set('');
  // process the form
  $scope.submit = function() {
    $http.post('/api/add/media', $scope.formData)
    .success(function() {
      MsgService.set('Success!');
    });
    $location.path('media');
  };
  $scope.message = MsgService.get();
  $scope.$route = $route;
});

admin.controller('editMediaCtrl', function($scope, $http, $route, $routeParams, $location){
  $scope.formData = {};
  $scope.msg = '';
  // get rental data
  $http.get('/api/media/' + $routeParams.id)
  .success(function(response) {
    $scope.media = response;
    $scope.formData.artist_id = response.artist_id;
    $scope.formData.type = response.type;
    $scope.formData.title = response.title;
    $scope.formData.description = response.description;
    $scope.formData.price = response.price;
    $scope.formData.img = response.img;
    $scope.formData.shipping = response.shipping;
  });
  // process the form
  $scope.submit = function() {
    $http.put('/api/update/media/' + $routeParams.id, $scope.formData)
    .success(function() {
      $scope.msg = 'Success!';
    });
    $location.path('media');
  };
  $scope.$route = $route;
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              rentals                             *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('rentalCtrl', function($scope, $http, $route){
  $http.get('/api/rentals')
  .success(function(response) {
    $scope.rentals = response;
  });
  $scope.delete = function(id) {
    $http.delete('/api/delete/rental/' + id);
    /*
    .success(function() {
      $scope.msg = 'Deleted!';
    });*/
    $route.reload();
  };
  $scope.$route = $route;
});

admin.controller('addRentalCtrl', function($scope, $http, $route, $location, MsgService){
  $scope.formData = {
    "rental_id": null,
    "artist_id": null,
    "composer": null,
    "title": null,
    "duration": null,
    "contents": null
  };
  MsgService.set('');
  // process the form
  $scope.submit = function() {
    $http.post('/api/add/rental', $scope.formData)
    .success(function() {
      MsgService.set('Success!');
    });
    $location.path('rentals');
  };
  $scope.message = MsgService.get();
  $scope.$route = $route;
});

admin.controller('editRentalCtrl', function($scope, $http, $route, $routeParams, $location){
  $scope.formData = {};
  $scope.msg = '';
  // get rental data
  $http.get('/api/rental/' + $routeParams.id)
  .success(function(response) {
    $scope.rental = response;
    $scope.formData.artist_id = response.artist_id;
    $scope.formData.composer = response.composer;
    $scope.formData.title = response.title;
    $scope.formData.duration = response.duration;
    $scope.formData.contents = response.contents;
  });
  // process the form
  $scope.submit = function() {
    $http.put('/api/update/rental/' + $routeParams.id, $scope.formData)
    .success(function() {
      $scope.msg = 'Success!';
    });
    $location.path('rentals');
  };
  $scope.$route = $route;
});

/* --------------------------------------------------------------- *
*                                                                  *
*                            audio/video                           *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('avCtrl', function($scope, $http, $route){
  $http.get('api/rentals')
  .success(function(response) {
    $scope.rentals = response;
  });
  $scope.$route = $route;
});

/* --------------------------------------------------------------- *
*                                                                  *
*                              featured                            *
*                                                                  *
* -----------------------------------------------------------------*/
admin.controller('featCtrl', function($scope, $http, $route){
  $scope.formData = {};
  $http.get('/api/featured')
  .success(function(response) {
    $scope.feat = response;
    $scope.formData.composition = response.composition.music_id;
    $scope.formData.book = response.book.music_id;
    $scope.formData.media = response.media.media_id;
    $scope.formData.artist = response.artist.artist_id;
  });
  $scope.edit = function() {
    $http.put('/api/update/features', $scope.formData)
    .success(function() {
      $route.reload();
    });
  };
  $scope.$route = $route;
});