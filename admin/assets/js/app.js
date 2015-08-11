// base module
var admin = angular.module('bmpDash', ['ngRoute']);

// message service
admin.service('MsgService', function(){
  var msg = '';
  
  this.set = function(text){
    msg = text;
  }

  this.get = function(){
    return msg;
  }
  
});