/**
 * Created by User on 23.02.2016.
 */

var questApp = angular.module('questApp', []);

questApp.controller('productController',
    function AnswerController($scope){
        $scope.save = function (answer, productForm){
            if(productForm.$valid){
                // действия по сохранению
                console.info(answer);
            }
        };
    })