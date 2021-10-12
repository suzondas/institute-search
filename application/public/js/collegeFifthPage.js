var app = angular.module('collegeFifthPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.teachers_in_service = 0;
        $scope.female_teachers_in_service = 0;
        $scope.errorMessage = [];

        /*===========================Helper Functions==============================*/
        /*desigName finding*/
        $scope.teacherStaffCount = function () {
            var self = $scope;
            self.teachers_in_service = 0;
            self.female_teachers_in_service = 0;
            let data = self.data.teachStafSum;
            for (var i = 0; i < data.length; i++) {
                if (!isNaN(parseInt(data[i].teachers_in_service))) {
                    try {
                        self.teachers_in_service += parseInt(data[i].teachers_in_service);
                    } catch (e) {/**/
                    }
                }
                if (!isNaN(parseInt(data[i].female_teachers_in_service))) {
                    try {
                        self.female_teachers_in_service += parseInt(data[i].female_teachers_in_service);
                    } catch (e) {/**/
                    }
                }
            }
        };

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

        /*desigVocName finding*/
        $scope.desigVocName = function (id) {
            var desigVocList = $scope.data.desigVocList;
            var designationVocName = null;
            desigVocList.forEach(function (currentValue, index, arr) {
                if (currentValue.designation_id == id) {
                    return designationVocName = currentValue.designation_name;
                }
            });
            return designationVocName;
        }
        /*desigVocName finding*/

        /*qualiName finding*/
        $scope.qualiName = function (id) {
            var qualiList = $scope.data.qualiList;
            var qualificationName = null;
            qualiList.forEach(function (currentValue, index, arr) {
                if (currentValue.id == id) {
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
                if (currentValue.higher_degree_id == id) {
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
                if (currentValue.higher_degree_id == id) {
                    return hdTrEdName = currentValue.bn_name;
                }
            });
            return hdTrEdName;
        };
        /*hdTrName finding*/

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer + '/collegeFifthPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
            $scope.teacherStaffCount();
        }).catch(function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.save = function () {
            console.log($scope.data.teachStafSum);
            console.log($scope.data.teachVocStafSum);
            console.log($scope.data.teachQualiSum);
            console.log($scope.data.hdTeachSum);
            console.log($scope.data.hdTrnSum);
            console.log($scope.data.teacherInservTr);
            console.log($scope.data.teacherTrainInfo);
            console.log($scope.data.teacherRetAwInfo);
        };
        $scope.validate = function () {
            if ($scope.teachers_in_service === 0) {
                alert("২.১৮ এর কর্মরত মোট সংখ্যা 0 হতে পারে না।");
                window.scrollTo(0, 0);
                return false;
            }
            if ($scope.female_teachers_in_service > $scope.teachers_in_service) {
                alert("২.১৮ এর কর্মরত মহিলা সংখ্যা থেকে কর্মরত মোট সংখ্যা কম হতে পারে না।");
                window.scrollTo(0, 0);
                return false;
            }
            $scope.submitData();
        };

        $scope.submitData = function () {
            var ele = document.getElementsByClassName('locker');
            for (var i = 0; i < ele.length; i++) {
                ele[i].style.display = "block";
            }
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.teachStafSum = $scope.data.teachStafSum;
            dataToSend.teachVocStafSum = $scope.data.teachVocStafSum;
            dataToSend.teachQualiSum = $scope.data.teachQualiSum;
            dataToSend.hdTeachSum = $scope.data.hdTeachSum;
            dataToSend.hdTrnSum = $scope.data.hdTrnSum;
            dataToSend.teacherInservTr = $scope.data.teacherInservTr;
            dataToSend.teacherTrainInfo = $scope.data.teacherTrainInfo;
            dataToSend.teacherRetAwInfo = $scope.data.teacherRetAwInfo;

            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer + '/collegeFifthPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Fifth page data has been saved succesfull");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                }).catch(
                function (response) {
                    console.log(response);
                    alert("Try again");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                }
            );
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
