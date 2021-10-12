var app = angular.module('profStdSecondPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*===========================Helper Functions==============================*/
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
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/profStdSecondPage/' + inst_id
        }).then(function (response) {
             console.log(response.data)
            $scope.data = response.data;

        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.submitData = function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.instituteSpecialStudents = $scope.data.instituteSpecialStudents;
            dataToSend.categoryWiseDisableStudent = $scope.data.categoryWiseDisableStudent;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/profStdSecondPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Students Second page data has been saved successfully");
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
