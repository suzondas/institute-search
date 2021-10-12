var app = angular.module('tecStdSecondPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        // Console global
/*Finding diploma level names*/
        $scope.diplomaName = function (id) {
            var diplomaClassList = $scope.data.diplomaClasses;
            var diplomaClsName = null;
            diplomaClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return diplomaClsName = currentValue.class_name_bangla;
                }
            });
            return diplomaClsName;
        }

        /*FInding sscVocName*/
        $scope.sscVocName = function (id) {
            var svocClassList = $scope.data.sscVocClasses;
            var svocClsName = null;
            svocClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return svocClsName = currentValue.class_name_bangla;
                }
            });
            return svocClsName;
        }

        /*FInding hscVocName*/
        $scope.hscVocName = function (id) {
            var vocClassList = $scope.data.hscVocClasses;
            var vocClsName = null;
            vocClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return vocClsName = currentValue.class_name_bangla;
                }
            });
            return vocClsName;
        }

        /*FInding hscBmName*/
        $scope.hscBmName = function (id) {
            var bmClassList = $scope.data.bmClasses;
            var bmClsName = null;
            bmClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return bmClsName = currentValue.class_name_bangla;
                }
            });
            return bmClsName;
        }


        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdSecondPage/' + inst_id
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
            dataToSend.dipStudentData = $scope.data.dipStudentData;
            dataToSend.stdBasicCrsdata = $scope.data.stdBasicCrsdata;
            dataToSend.sscVocStd = $scope.data.sscVocStd;
            dataToSend.hscVocStdData = $scope.data.hscVocStdData;
            dataToSend.hscBmStdData = $scope.data.hscBmStdData;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/tecStdSecondPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Second page data has been saved succesfull");
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
