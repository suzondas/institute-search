var app = angular.module('schoolSecondPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;

        /*===========================Helper Functions==============================*/

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
            url: apiServer + '/schoolSecondPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.dataLoaded = true;

        }).catch(function (error) {
            console.log(error);
            alert("Something went wrong please contact with BANBEIS.");
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
