var app = angular.module('profStdFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {
        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.first_yr_tot = 0;
        $scope.first_yr_fem = 0;
        /*============Helper Function==============*/
        /*FInding subjectName*/
        $scope.profSubjectName = function (id) {
            var profSubjectList = $scope.data.professionalClasses;
            var SubjectName = null;
            profSubjectList.forEach(function (currentValue, index) {
                if (currentValue.subject_id == id) {
                    return SubjectName = currentValue.subject_name_bangla;
                }
            });
            return SubjectName;
        };
        /*total_1st_year_std*/
        $scope.totalYrStdFn = function () {
            $scope.first_yr_tot = 0;
            $scope.first_yr_fem = 0;
            for (var i = 0; i < $scope.profStdSum.length; i++) {
                if (!isNaN(parseInt($scope.profStdSum[i].first_yr_tot))) {
                    $scope.first_yr_tot += parseInt($scope.profStdSum[i].first_yr_tot);
                }
                if (!isNaN(parseInt($scope.profStdSum[i].first_yr_fem))) {
                    $scope.first_yr_fem += parseInt($scope.profStdSum[i].first_yr_fem);
                }

            }
        };

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/profStdFirstPage/' + inst_id
        }).then(function (response) {
            console.log(response.data)
            $scope.data = response.data;
            $scope.profStdSum = $scope.data.profStdSum;
            $scope.totalYrStdFn();
            $scope.dataLoaded = true;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];

            if ($scope.first_yr_tot ===0) {
                $scope.errorMessage.push('২.১ এর ১ম বর্ষ মোট সংখ্যা 0 হতে পারে না।');
            }
            if (parseInt($scope.first_yr_tot) < parseInt($scope.first_yr_fem)) {
                $scope.errorMessage.push('২.১ এর ১ম বর্ষ ছাত্রী সংখ্যা থেকে মোট সংখ্যা কম হতে পারে না।')
            }
            if ($scope.first_yr_tot.length > 6) {
                $scope.errorMessage.push('২.১ এর ১ম বর্ষ মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.first_yr_fem.length > 6) {
                $scope.errorMessage.push('২.১ এর ১ম বর্ষ ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

        }

        $scope.submitData = function () {
            $scope.validate();
            console.log($scope.errorMessage)
            if ($scope.errorMessage.length > 0) {
                alert('এই পাতার Observation সম্পূর্ণ করে আবার Submit করুন');
                window.scrollTo(0, 0);
                return;
            }
            var ele = document.getElementsByClassName('locker');
            for (var i = 0; i < ele.length; i++) {
                ele[i].style.display = "block";
            }
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.profStdSum = $scope.data.profStdSum;
            dataToSend.certificateStudent = $scope.data.certificateStudent;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/profStdFirstPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Teachers First page data has been saved succesfull");
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
