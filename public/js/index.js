'use strict';

var indexApp = angular.module('indexApp', [],function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

indexApp.controller('indexPageCtrl',IndexPageCtrl);
function IndexPageCtrl($scope,$http){
    $scope.indexPage={
        productData:[],
        user:null,
        categoryTour:[],
        categoryDestination:[],
        init: function (){
            $http.get('/getCurrentUser').success(function(data){
                $scope.user=data;
            }).error(function (data, status) {
                console.log(data);
            });
        }
    }
}
