var app = angular.module('tecStdEightPage', []);
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

        /*qualiName finding*/
        $scope.qualiName = function (id) {
            var qualiList = $scope.data.qualiList;
            var qualificationName = null;
            qualiList.forEach(function (currentValue, index, arr) {
                if(currentValue.id == id){
                    return qualificationName = currentValue.name_bn;
                }
            });
            return qualificationName;
        }
        /*qualiName finding*/

        /*hdName finding*/
        $scope.hdName = function (id) {
            var hdList = $scope.data.hdList;
            var hdTrName = null;
            hdList.forEach(function (currentValue, index, arr) {
                if(currentValue.higher_degree_id == id){
                    return hdTrName = currentValue.bn_name;
                }
            });
            return hdTrName;
        }
        /*hdName finding*/

        /*hdTrName finding*/
        $scope.hdTrName = function (id) {
            var hdTrList = $scope.data.hdTrList;
            var hdTrEdName = null;
            hdTrList.forEach(function (currentValue, index, arr) {
                if(currentValue.higher_degree_id == id){
                    return hdTrEdName = currentValue.bn_name;
                }
            });
            return hdTrEdName;
        }
        /*hdTrName finding*/
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdEightPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.save = function () {
            console.log($scope.data.teachQualiSum);
            console.log($scope.data.hdTeachSum);
            console.log($scope.data.hdTrnSum);
            console.log($scope.data.teacherInservTr);
            console.log($scope.data.teacherTrainInfo);
            console.log($scope.data.teacherRetAwInfo);
        }

        $scope.submitData = function () {
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.teachQualiSum = $scope.data.teachQualiSum;
            dataToSend.hdTeachSum = $scope.data.hdTeachSum;
            dataToSend.hdTrnSum = $scope.data.hdTrnSum;
            dataToSend.teacherInservTr = $scope.data.teacherInservTr;
            dataToSend.teacherTrainInfo = $scope.data.teacherTrainInfo;
            dataToSend.teacherRetAwInfo = $scope.data.teacherRetAwInfo;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/tecStdEightPage/submitData',
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
