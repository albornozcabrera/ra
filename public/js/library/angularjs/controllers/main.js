app.controller("ctrlMain", function ($scope, $http) {
//    alert("entre");
    console.log(C_SERVER);
    $scope.mostrarRegistrar = function (){
        location.href = C_SERVER + '/registrar/index';
    }
    $scope.mostrarConsultar = function (){
        location.href = C_SERVER + '/consultar/index';
    }
    $scope.mostrarImportar = function (){
        location.href = C_SERVER + '/importar/index';
    }
    $scope.salirRA = function (){
        location.href = C_SERVER + '/usuario/exit';
    }

});
