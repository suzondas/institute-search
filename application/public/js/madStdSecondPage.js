var app = angular.module('madStdSecondPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        // Console global

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
            var vocClassList = $scope.data.vocClasses;
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
        /*FInding dipFName*/
        $scope.dipFName = function (id) {
            var dipFClassList = $scope.data.diplomaFisheriesClasses;
            var dipFClsName = null;
            dipFClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return dipFClsName = currentValue.class_name_bangla;
                }
            });
            return dipFClsName;
        }

        /*FInding dipAgName*/
        $scope.dipAgName = function (id) {
            var dipAgClassList = $scope.data.diplomaAgriClasses;
            var dipAgClsName = null;
            //console.log(dipAgClassList);
            dipAgClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return dipAgClsName = currentValue.class_name_bangla;
                }
            });
            return dipAgClsName;
        }
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/madStdSecondPage/' + inst_id
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
            dataToSend.secWsStd = $scope.data.secWsStd;
            dataToSend.sscVocStudent = $scope.data.sscVocStudent;
            dataToSend.dakhilVocStudentData = $scope.data.dakhilVocStudentData;
            //dataToSend.hscVocStudent = $scope.data.hscVocStudent;
            //dataToSend.alimVocStudentData = $scope.data.alimVocStudentData;
            dataToSend.hscBmStudent = $scope.data.hscBmStudent;
            dataToSend.hscDiplomaFisheries = $scope.data.hscDiplomaFisheries;
            dataToSend.hscDiplomaAgriculture = $scope.data.hscDiplomaAgriculture;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/madStdSecondPage/submitData',
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
