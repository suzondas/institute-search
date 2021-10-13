var app = angular.module('collegeFourthPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        /*find idx of board result*/
        $scope.findIndexEx = function (examId, subId) {
            var idx = null;
            for (var i = 0; i < $scope.boardWiseExamResults.length; i++) {
                if ($scope.boardWiseExamResults[i].exam_id == examId && $scope.boardWiseExamResults[i].subject == subId) {
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
            url: apiServer+'/collegeFourthPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
            $scope.boardWiseExamResults = $scope.data.boardWiseExamResults;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

    });
})(app);
app.directive('numberConverter', function () {
    return {
        priority: 1,
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attr, ngModel) {
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
