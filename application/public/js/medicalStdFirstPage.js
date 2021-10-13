var app = angular.module('medicalStdFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {
        /*Initial Variables*/
        $scope.data = null;

        /*Helper function*/
       $scope.catDisStdName =function(id){
           var disCatList=$scope.data.disableCategory;
           var disCatName=null;
           disCatList.forEach( function(currentValue,index){
               if(currentValue.disable_type==id){
                   return disCatName=currentValue.disability_bn;
               }
               }
           )
           return disCatName;
        }
        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/medicalStdFirstPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/


    });
})(app);
app.directive('numberConverter', function() {
    return {
        priority: 1,
        restrict: 'A',
        require: 'ngModel',
        link: function(scope, element, attr, ngModel) {
            function toModel(value) {
                if (!isNaN(parseInt(value))) {
                    return "" + value; // convert to string
                } else {
                    return "";
                }
            }

            function toView(value) {
                return parseInt(value); // convert to number
            }

            ngModel.$formatters.push(toView);
            ngModel.$parsers.push(toModel);
        }
    };
});
