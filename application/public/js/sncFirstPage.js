var app = angular.module('sncFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.studentSummery);
        };

        //Finding Class Index
        //$scope.stuentSummery = $scope.data.studentSummery;
        $scope.findClIndex = function (classId, levId) {
            var idy = null;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if ($scope.studentSummery[i].class_id == classId && $scope.studentSummery[i].education_level_id == levId) {
                    idy = i;
                    break;
                }
            }
            //console.log(idy);
            return idy;
        };
        //Finding ClassGroup Index
        //$scope.stuentsSummery = $scope.data.studentSummery;
        $scope.findIndex = function (groupId, classId) {
            var idx = null;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if ($scope.studentSummery[i].class_id == classId && $scope.studentSummery[i].group_id == groupId) {
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        //Finding ClassGroup Index for college
        //$scope.studentSummeryCol = $scope.data.studentSummeryCol;
        $scope.findColIndex = function (groupId, classId) {
            var idx = null;
            for (var i = 0; i < $scope.studentSummeryCol.length; i++) {
                if ($scope.studentSummeryCol[i].class_id == classId && $scope.studentSummeryCol[i].group_id == groupId) {
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/SnCFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.studentSummery = $scope.data.studentSummery;
            $scope.studentSummeryCol = $scope.data.studentSummeryCol;
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
