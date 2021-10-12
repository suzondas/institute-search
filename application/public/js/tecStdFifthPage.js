var app = angular.module('tecStdFifthPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope. $scope.data.upajatiList);
        };

        /*FInding catStdName*/
        $scope.catStdName = function (id) {
            var catStdList = $scope.data.categoryWiseList;
            var catStdNm = null;
            catStdList.forEach(function (currentValue, index) {
                if (currentValue.category_id == id) {
                    return catStdNm = currentValue.details_bn;
                }
            });
            return catStdNm;
        }

        /*FInding catDisStdName*/
        $scope.catDisStdName = function (id) {
            var catDisStdList = $scope.data.disableCategory;
            var catDisStdNm = null;
            catDisStdList.forEach(function (currentValue, index) {
                if (currentValue.disable_type == id) {
                    return catDisStdNm = currentValue.disability_bn;
                }
            });
            return catDisStdNm;
        };

        /*upajatiName name finding*/
        $scope.findUpajaitName = function (id) {
            var upajatiList = $scope.data.upajatiList;
            var upajatiName = null;
            upajatiList.forEach(function (currentValue, index, arr) {
                if (currentValue.upajati_id == id) {
                    return upajatiName = currentValue.name_bn;
                }
            });
            return upajatiName;
        }

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdFifthPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;

        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.save = function () {
            console.log($scope.data.instituteSpecialStudents);
            console.log($scope.data.categoryWiseStudent);
            console.log($scope.data.categoryWiseDisableStudent);
            console.log($scope.data.categoryWiseUpajati);
        }

        $scope.submitData = function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.instituteSpecialStudents = $scope.data.instituteSpecialStudents;
            dataToSend.categoryWiseStudent = $scope.data.categoryWiseStudent;
            dataToSend.categoryWiseDisableStudent = $scope.data.categoryWiseDisableStudent;
            dataToSend.categoryWiseUpajati = $scope.data.categoryWiseUpajati;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/tecStdFifthPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Fifth page data has been saved succesfull");
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
