var app = angular.module('engTeachFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.teachers_in_service = 0;
        $scope.female_teachers_in_service = 0;
        /*===========================Helper Functions==============================*/
        /*desigName finding*/
        $scope.desigName = function (id) {
            var desigList = $scope.data.desigList;
            var designationtName = null;
            desigList.forEach(function (currentValue, index, arr) {
                if (currentValue.designation_id == id) {
                    return designationtName = currentValue.designation_name_bn;
                }
            });
            return designationtName;
        }
        /*desigName finding*/

        /*total_techer_staff*/
        $scope.totalTeacherStaffGenFn = function () {
            $scope.teachers_in_service = 0;
            $scope.female_teachers_in_service = 0;
            for (var i = 0; i < $scope.teachStafSum.length; i++) {
                    if (!isNaN(parseInt($scope.teachStafSum[i].teachers_in_service))) {
                        $scope.teachers_in_service += parseInt($scope.teachStafSum[i].teachers_in_service);
                    }
                    if (!isNaN(parseInt($scope.teachStafSum[i].female_teachers_in_service))) {
                        $scope.female_teachers_in_service += parseInt($scope.teachStafSum[i].female_teachers_in_service);
                    }

            }
        };

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/engTeachFirstPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
            $scope.teachStafSum = $scope.data.teachStafSum;
            $scope.totalTeacherStaffGenFn();
            $scope.dataLoaded = true;
        }, function (error) {
            console.log(error);
            alert('Something went wrong! please contact BANBEIS Technical Team')
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];

            if ($scope.teachers_in_service ===0) {
                $scope.errorMessage.push('২.৭ এর কর্মরত মোট সংখ্যা 0 হতে পারে না।');
            }
            if (parseInt($scope.teachers_in_service) < parseInt($scope.female_teachers_in_service)) {
                $scope.errorMessage.push('২.৭ এর কর্মরত মহিলা সংখ্যা থেকে কর্মরত মোট সংখ্যা কম হতে পারে না।')
            }
            if ($scope.teachers_in_service.length > 6) {
                $scope.errorMessage.push('২.৭ এর মোট কর্মরত সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.female_teachers_in_service.length > 6) {
                $scope.errorMessage.push('২.৭ এর মোট কর্মরত মহিলা সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

        }

        /*==========================Data Saving Ends=======================================*/
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
