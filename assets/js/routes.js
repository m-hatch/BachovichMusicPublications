
// configure routes
app.config(function($routeProvider, $locationProvider){
  $routeProvider

    // main nav pages
    .when('/', {
      templateUrl: 'pages/home.html',
      controller: 'mainCtrl',
      activetab: 'home'
    })
    .when('/media', {
      templateUrl: 'pages/media.html',
      controller: 'mediasCtrl',
      activetab: 'media'
    })
    .when('/media/:id', {
      templateUrl: 'pages/media-detail.html',
      controller: 'mediaCtrl',
      activetab: 'media'
    })
    .when('/artists', {
      templateUrl: 'pages/artists.html',
      controller: 'artistsCtrl',
      activetab: 'artists'
    })
    .when('/artist/:id', {
      templateUrl: 'pages/artist.html',
      controller: 'artistCtrl',
      activetab: 'artists'
    })
    .when('/rentals', {
      templateUrl: 'pages/rentals.html',
      controller: 'rentalCtrl',
      activetab: 'rentals'
    })
    .when('/contact', {
      templateUrl: 'pages/contact.html',
      controller: 'contactCtrl',
      activetab: 'contact'
    })
    .when('/signup', {
      templateUrl: 'pages/signup.html',
      controller: 'signupCtrl',
      activetab: 'signup'
    })
    .when('/search', {
      templateUrl: 'pages/search.html',
      controller: 'searchResultCtrl',
    })
    .when('/thankyou', {
      templateUrl: 'pages/thankyou.html',
      activetab: 'contact'
    })

    // sheet music detail
    .when('/music/:id', {
      templateUrl: 'pages/music-detail.html',
      controller: 'musicCtrl'
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
      controller: 'duetTimpCtrl'
    })
    .when('/duets/timpani-piano', {
      templateUrl: 'pages/music.html',
      controller: 'duetTimpPnoCtrl'
    })
    .when('/duets/timpani-woodwinds', {
      templateUrl: 'pages/music.html',
      controller: 'duetTimpWwCtrl'
    })
    .when('/duets/timpani-perc', {
      templateUrl: 'pages/music.html',
      controller: 'duetTimpPercCtrl'
    })
    .when('/duets/vibes-piano', {
      templateUrl: 'pages/music.html',
      controller: 'duetVibePnoCtrl'
    })
    .when('/duets/vibes-strings', {
      templateUrl: 'pages/music.html',
      controller: 'duetVibeStrCtrl'
    })
    .when('/duets/multi', {
      templateUrl: 'pages/music.html',
      controller: 'duetMultiCtrl'
    })
    .when('/duets/multi-strings', {
      templateUrl: 'pages/music.html',
      controller: 'duetMultiStrCtrl'
    })
    .when('/duets/multi-voice', {
      templateUrl: 'pages/music.html',
      controller: 'duetMultiVoxCtrl'
    })
    .when('/duets/multi-woodwinds', {
      templateUrl: 'pages/music.html',
      controller: 'duetMultiWwCtrl'
    })
    .when('/duets/drumset-brass', {
      templateUrl: 'pages/music.html',
      controller: 'duetDrumsetBrassCtrl'
    })

    // non sub-menu
    .when('/trios', {
      templateUrl: 'pages/music.html',
      controller: 'triosCtrl'
    })
    .when('/quartets', {
      templateUrl: 'pages/music.html',
      controller: 'quartetsCtrl'
    })
    .when('/ensemble', {
      templateUrl: 'pages/music.html',
      controller: 'ensCtrl'
    })
    .when('/steelband', {
      templateUrl: 'pages/music.html',
      controller: 'steelCtrl'
    })
    .when('/orchestra', {
      templateUrl: 'pages/music.html',
      controller: 'orchCtrl'
    })
    .when('/band', {
      templateUrl: 'pages/music.html',
      controller: 'bandCtrl'
    })
    .when('/mixed', {
      templateUrl: 'pages/music.html',
      controller: 'mixedCtrl'
    })
    .when('/strings', {
      templateUrl: 'pages/music.html',
      controller: 'stringsCtrl'
    })
    .when('/choral', {
      templateUrl: 'pages/music.html',
      controller: 'choralCtrl'
    })

    // books
    .when('/books/mallets', {
      templateUrl: 'pages/music.html',
      controller: 'bookMalletsCtrl'
    })
    .when('/books/snare', {
      templateUrl: 'pages/music.html',
      controller: 'bookSnareCtrl'
    })
    .when('/books/timpani', {
      templateUrl: 'pages/music.html',
      controller: 'bookTimpCtrl'
    })
    .when('/books/world', {
      templateUrl: 'pages/music.html',
      controller: 'bookWorldCtrl'
    })
    .when('/books/general', {
      templateUrl: 'pages/music.html',
      controller: 'bookGeneralCtrl'
    })

    // catch all
    .otherwise({ redirectTo: '/' });

    // HTML5 History API
    $locationProvider.html5Mode(true);
});