var app = angular.module('sncThirdPage', []);
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
            url: apiServer+'/SnCThirdPage/' + inst_id
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
