var app = angular.module('ttcStdFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.total_trainee = 0;
        $scope.female_trainee = 0;
        /*===========================Helper Functions==============================*/
        // Console global
        /*FInding trainname*/
        $scope.className = function (class_id) {
            var classList = $scope.data.trainName;
            var classNm = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == class_id) {
                    return classNm = currentValue.class_name_bangla;
                }
            });
            return classNm;
        }

        /*FInding bedtrainname*/
        $scope.bedClassName = function (class_id) {
            var bedClassList = $scope.data.bedTrainName;
            var bedClassNm = null;
            bedClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == class_id) {
                    return bedClassNm = currentValue.class_name_bangla;
                }
            });
            return bedClassNm;
        }
        /*total_trainee std*/
        $scope.totalYrStdFn = function () {
            $scope.total_trainee = 0;
            $scope.female_trainee = 0;
            for (var i = 0; i < $scope.ttc_trainee_summaries.length; i++) {
                if (!isNaN(parseInt($scope.ttc_trainee_summaries[i].total_trainee))) {
                    $scope.total_trainee += parseInt($scope.ttc_trainee_summaries[i].total_trainee);
                }
                if (!isNaN(parseInt($scope.ttc_trainee_summaries[i].female_trainee))) {
                    $scope.female_trainee += parseInt($scope.ttc_trainee_summaries[i].female_trainee);
                }

            }
        };
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer + '/ttcStdFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.ttc_trainee_summaries = $scope.data.ttc_trainee_summaries;
            $scope.bed_trainee_summaries = $scope.data.bed_trainee_summaries;
            $scope.instOtherInfo = $scope.data.instOtherInfo;
            $scope.openUnStd = $scope.data.openUnStd;
            $scope.openUnRes = $scope.data.openUnRes;
            $scope.totalYrStdFn();
            $scope.dataLoaded = true;
        }).catch(function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];

            if ($scope.total_trainee ===0) {
                $scope.errorMessage.push('২.১ এর মোট সংখ্যা 0 হতে পারে না।');
            }
            if (parseInt($scope.total_trainee) < parseInt($scope.female_trainee)) {
                $scope.errorMessage.push('২.১ এর ছাত্রী সংখ্যা থেকে মোট সংখ্যা কম হতে পারে না।')
            }
            if ($scope.total_trainee.length > 6) {
                $scope.errorMessage.push('২.১ এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.female_trainee.length > 6) {
                $scope.errorMessage.push('২.১ এর ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

        }
        /*==========================Data Saving END=======================================*/

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
