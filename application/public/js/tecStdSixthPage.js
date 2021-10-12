var app = angular.module('tecStdSixthPage', []);
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

        /*FInding  age class name*/
        $scope.findClassName = function (id) {
            var classList = $scope.data.ageClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdSixthPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/

        $scope.submitData = function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.guardianOccupation = $scope.data.guardianOccupation;
            dataToSend.ageWiseStudent = $scope.data.ageWiseStudent;
            dataToSend.enterprenerData = $scope.data.enterprenerData;
            dataToSend.instOtherInfo = $scope.data.instOtherInfo;
            dataToSend.openUnStd = $scope.data.openUnStd;
            dataToSend.openUnRes = $scope.data.openUnRes;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/tecStdSixthPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Sixth page data has been saved succesfull");
                },
                function (response) {
                    console.log(response);
                    alert("Try again");
                }
            );
        }
        /*==========================Data Saving END=======================================*/
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
