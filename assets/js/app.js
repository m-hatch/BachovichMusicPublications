// base module
var app = angular.module('bmpApp', ['ngRoute']);

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