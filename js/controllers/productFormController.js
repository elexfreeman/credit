/**
 * Created by User on 23.02.2016.
 */

productApp.controller('productController',
    function AnswerController($scope){
        $scope.save = function (answer, productForm){
            if(productForm.$valid){
                // действия по сохранению
                John.NextStep();
            }
            else
            {
                console.info('error',answer);
            }

        };
    })