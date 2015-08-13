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

// popup service
admin.service('popupService', function($window){

  this.showPopup=function(message){
    return $window.confirm(message);
  }
});