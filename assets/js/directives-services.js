/* ========================= directives ========================== */

// dynamic url for audio tags
app.directive('dynamicUrl', function () {
    return {
        restrict: 'A',
        link: function postLink(scope, element, attr) {
            element.attr('src', 'assets/audio/' + attr.dynamicUrlSrc);
        }
    };
});

/* ========================== services ============================ */

// search service
app.service('SearchService', function(){
  var search_query = '';
  
  this.set = function(query){
    search_query = query;
  }

  this.get = function(){
    return search_query;
  }
});