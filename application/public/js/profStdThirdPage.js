var app = angular.module('profStdThirdPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/profStdThirdPage/' + inst_id
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
            dataToSend.profRes = $scope.data.profRes;
            dataToSend.certficateRes = $scope.data.certficateRes;
            dataToSend.instOtherInfo = $scope.data.instOtherInfo;
            dataToSend.openUnStd = $scope.data.openUnStd;
            dataToSend.openUnRes = $scope.data.openUnRes;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/profStdThirdPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Students Third page data has been saved successfully");
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
