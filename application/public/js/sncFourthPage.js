var app = angular.module('sncFourthPage', []);
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

        /*Occupation name finding*/
        $scope.occupationName = function (id) {
            var occupationsList = $scope.data.occupationsList;
            var occupationName = null;
            occupationsList.forEach(function (currentValue, index, arr) {
                if (currentValue.occupation_id == id) {
                    return occupationName = currentValue.details_bn;
                }
            });
            return occupationName;
        };

        /*FInding school age class name*/
        $scope.findClassName = function (id) {
            var classList = $scope.data.schAgeClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*FInding college age class name*/
        $scope.findColClassName = function (id) {
            var classList = $scope.data.colClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*subjectName finding*/
        $scope.subjectName = function (id) {
            var subjtList = $scope.data.subjectList;
            var subjectName = null;
            subjtList.forEach(function (currentValue, index, arr) {
                if(currentValue.subjectdtl_id == id){
                    return subjectName = currentValue.subject_name_ban;
                }
            });
            return subjectName;
        }
        /*subjectName finding*/
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/SnCFourthPage/' + inst_id
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
