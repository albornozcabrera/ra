var app = angular.module("app", ['ngIdle'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.config(['KeepaliveProvider', 'IdleProvider', function(KeepaliveProvider, IdleProvider) {
  IdleProvider.idle(3600);//1 hora
  IdleProvider.timeout(10);// espera de mensaje
  KeepaliveProvider.interval(600); // pulsacion 10 min 
}]);

app.run(['Idle', function(Idle) {
  Idle.watch();
}]);

app.controller("ctrl", ['$scope', '$http', 'Idle' ,'Keepalive',function(scope, http, Idle, Keepalive){
	scope.model =0;
  //window.onbeforeunload = preguntarAntesDeSalir;

	scope.$on('IdleTimeout', function() {
        var url = C_SERVER + '/usuario/exit';
        http.get(url)
          .success(function(data){
            alert("SESSION EXPIRADA");
            window.location = url;

        }).error(function(status){
      });
    });

      function preguntarAntesDeSalir() {

      var message = 'hola';
      if (typeof event == 'undefined') {
        event = window.event;
      }
      if (event) {
        event.returnValue = message;
      }
      return message;

    }

  scope.$on('$locationChangeStart', function( event ) {    
    if (!scope.form.$dirty) return;
    var answer = confirm('If you leave this page you are going to lose all unsaved changes, are you sure you want to leave?')
    if (!answer) {
      event.preventDefault();
    }
  });
 // scope.$on('$locationChangeStart',function(event) {
 //    if($scope.formsubmitted && $scope.myForm.$dirty){   
 //        var answer = confirm("Are you sure you want to leave this page?")
 //            if (!answer) {
 //            var url = C_SERVER + '/usuario/exit';
 //            http.get(url)
 //            event.preventDefault();
 //        }else{
 //            var url = C_SERVER + '/usuario/exit';
 //            http.get(url)
 //            $cookieStore.remove('user');
 //        }
 //    }
 // });




}]);

