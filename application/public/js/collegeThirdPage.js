var app = angular.module('collegeThirdPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        var eleven_twelve_total = 0;
        var eleven_twelve_girl = 0;
        var check_eleven_twelve_total = 0;
        var check_eleven_twelve_girl = 0;

        var degree_total = 0;
        var degree_girl = 0;
        var check_degree_total = 0;
        var check_degree_girl = 0;

        var hon_total = 0;
        var hon_girl = 0;
        var check_hon_total = 0;
        var check_hon_girl = 0;

        var ms_total = 0;
        var ms_girl = 0;
        var check_ms_total = 0;
        var check_ms_girl = 0;

        $scope.errorMessage = [];

        /*===========================Helper Functions==============================*/

        /*Age based students sum*/
        $scope.totalAgeBasedStud = function (index) {
            let item = $scope.data.ageWiseStudent[index];
            $scope.data.ageWiseStudent[index].total_student = "" + ((item.under_fifteen_total * 1) + (item.sixteen_total * 1) + (item.seventeen_total * 1) + (item.eighteen_total * 1) + (item.nineteen_total * 1) + (item.twenty_total * 1) + (item.upper_twentyone_total * 1));
            $scope.data.ageWiseStudent[index].female_student = "" + ((item.under_fifteen_female * 1) + (item.sixteen_female * 1) + (item.seventeen_female * 1) + (item.eighteen_female * 1) + (item.nineteen_female * 1) + (item.twenty_female * 1) + (item.upper_twentyone_female * 1));

        };
        /*Ends Age based students sum*/

        /*FInding class name*/
        $scope.findClassName = function (id) {
            var classList = $scope.data.classes;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*Occupation name finding*/
        $scope.occupationName = function (id) {
            var occupationsList = $scope.data.occupationsList;
            var occupationName = null;
            occupationsList.forEach(function (currentValue, index, arr) {
                if (currentValue.occupation_id == id) {
                    return occupationName = currentValue.details_bn;
                }
            });
            return occupationName;
        }

        /*Index finding*/
        $scope.findIndex = function (groupId, classId) {
            var idx = null;
            for (var i = 0; i < $scope.studentSummeryPrevYr.length; i++) {
                if ($scope.studentSummeryPrevYr[i].class_id == classId && $scope.studentSummeryPrevYr[i].group_id == groupId) {
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*subjectName finding*/
        $scope.subjectName = function (id) {
            var subjtList = $scope.data.subjectList;
            var subjectName = null;
            subjtList.forEach(function (currentValue, index, arr) {
                if (currentValue.subjectdtl_id == id) {
                    return subjectName = currentValue.subject_name_ban;
                }
            });
            return subjectName;
        }
        /*subjectName finding*/

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer + '/collegeThirdPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
            $scope.studentSummeryPrevYr = $scope.data.studentSummeryPrevYr;
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        /*****VALIDATION********/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];

            /*Eleven - Twelve*/
            eleven_twelve_total = parseInt($scope.data.studentSummaryTotal.eleven_twelve_total);
            eleven_twelve_girl = parseInt($scope.data.studentSummaryTotal.eleven_twelve_girl);
            check_eleven_twelve_total = 0;
            check_eleven_twelve_girl = 0;
            for (let i = 0; i < $scope.data.ageWiseStudent.length; i++) {
                if ($scope.data.ageWiseStudent[i].class_id === "3111") {
                    check_eleven_twelve_total = check_eleven_twelve_total + parseInt($scope.data.ageWiseStudent[i].total_student);
                    check_eleven_twelve_girl = check_eleven_twelve_girl + parseInt($scope.data.ageWiseStudent[i].female_student);
                }
                if ($scope.data.ageWiseStudent[i].class_id === "3112") {
                    check_eleven_twelve_total = check_eleven_twelve_total + parseInt($scope.data.ageWiseStudent[i].total_student);
                    check_eleven_twelve_girl = check_eleven_twelve_girl + parseInt($scope.data.ageWiseStudent[i].female_student);
                }

            }
            if (parseInt(eleven_twelve_total) !== parseInt(check_eleven_twelve_total)) {
                $scope.errorMessage.push('২.১১ এর একাদশ-দ্বাদশ শ্রেণীর মোট শিক্ষার্থীর(' + parseInt(check_eleven_twelve_total) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর একাদশ-দ্বাদশ শ্রেণীর মোট শিক্ষার্থী সংখ্যার(' + parseInt(eleven_twelve_total) + ') মিল নেই।')
            }
            if (parseInt(eleven_twelve_girl) !== parseInt(check_eleven_twelve_girl)) {
                $scope.errorMessage.push('২.১১ এর একাদশ-দ্বাদশ শ্রেণীর ছাত্রী সংখ্যা(' + parseInt(check_eleven_twelve_girl) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর একাদশ-দ্বাদশ শ্রেণীর ছাত্রী সংখ্যার(' + parseInt(eleven_twelve_girl) + ') মিল নেই।')
            }

            /*   console.log($scope.data.studentSummaryTotal.eleven_twelve_total)
               console.log(eleven_twelve_girl)
               console.log(check_eleven_twelve_total)
               console.log(check_eleven_twelve_girl); return;*/
            /*Eleven - Twelve*/
        };
        /*****VALIDATION********/
        
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
