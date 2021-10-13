var app = angular.module('tecStdEightPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.data.occupationsList);
        };

        /*qualiName finding*/
        $scope.qualiName = function (id) {
            var qualiList = $scope.data.qualiList;
            var qualificationName = null;
            qualiList.forEach(function (currentValue, index, arr) {
                if(currentValue.id == id){
                    return qualificationName = currentValue.name_bn;
                }
            });
            return qualificationName;
        }
        /*qualiName finding*/

        /*hdName finding*/
        $scope.hdName = function (id) {
            var hdList = $scope.data.hdList;
            var hdTrName = null;
            hdList.forEach(function (currentValue, index, arr) {
                if(currentValue.higher_degree_id == id){
                    return hdTrName = currentValue.bn_name;
                }
            });
            return hdTrName;
        }
        /*hdName finding*/

        /*hdTrName finding*/
        $scope.hdTrName = function (id) {
            var hdTrList = $scope.data.hdTrList;
            var hdTrEdName = null;
            hdTrList.forEach(function (currentValue, index, arr) {
                if(currentValue.higher_degree_id == id){
                    return hdTrEdName = currentValue.bn_name;
                }
            });
            return hdTrEdName;
        }
        /*hdTrName finding*/
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdEightPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
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
