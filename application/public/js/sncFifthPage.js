var app = angular.module('sncFifthPage', []);
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
        //Finding exam Class Index
        $scope.findExIndex = function (classId, levId) {
            var idy = null;
            for (var i = 0; i < $scope.studentSummeryPrevYr.length; i++) {
                if ($scope.studentSummeryPrevYr[i].class_id == classId && $scope.studentSummeryPrevYr[i].education_level_id == levId) {
                    idy = i;
                    break;
                }
            }
            //console.log(idy);
            return idy;
        };

        /*finding index*/
        $scope.findIndex = function(groupId, classId){
            var idx = null;
            for(var i =0;i<$scope.studentSummeryPrevYr.length;i++){
                if($scope.studentSummeryPrevYr[i].class_id == classId && $scope.studentSummeryPrevYr[i].group_id == groupId){
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*finding Col index*/
        $scope.findColIndex = function(groupId, classId){
            var idx = null;
            for(var i =0;i<$scope.studentSummeryColPrevYr.length;i++){
                if($scope.studentSummeryColPrevYr[i].class_id == classId && $scope.studentSummeryColPrevYr[i].group_id == groupId){
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*find idx of board result*/
        $scope.findIndexEx = function(examId, subId){
            var idx = null;
            for(var i =0;i<$scope.boardWiseExamResults.length;i++){
                if($scope.boardWiseExamResults[i].exam_id == examId && $scope.boardWiseExamResults[i].subject == subId){
                    idx = i;
                    break;
                }
            }
            return idx;
        };
        /*find idx of board result*/
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/SnCFifthPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.studentSummeryPrevYr = $scope.data.studentSummeryPrevYr;
            $scope.studentSummeryColPrevYr = $scope.data.studentSummeryColPrevYr;
            $scope.boardWiseExamResults = $scope.data.boardWiseExamResults;
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
