var app = angular.module('schoolThirdPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.totalOneToFive = 0;
        $scope.femaleOneToFive = 0;
        $scope.totalSixToTen = 0;
        $scope.femaleSixToTen = 0;
        $scope.errorMessage = [];
        /*===========================Helper Functions==============================*/

        /*Auto Sum*/
        $scope.totalOneToFiveFn = function () {
            $scope.totalOneToFive = 0;
            $scope.femaleOneToFive = 0;
            var data = $scope.data.ageWisePrimaryStudentData;
            for (var i = 0; i < data.length; i++) {
                if (['1101', '1102', '1103', '1104', '1105'].includes(data[i].class_id)) {
                    if (!isNaN(parseInt(data[i].total_student))) {
                        $scope.totalOneToFive += parseInt(data[i].total_student);
                    }
                    if (!isNaN(parseInt(data[i].female_student))) {
                        $scope.femaleOneToFive += parseInt(data[i].female_student);
                    }
                }
            }
        };

        $scope.totalOneToFiveSingleFn = function (index) {
            let item = $scope.data.ageWisePrimaryStudentData[index];
            $scope.data.ageWisePrimaryStudentData[index].total_student = ""+((item.five_total * 1) + (item.six_total * 1) + (item.seven_total * 1) + (item.eight_total * 1) + (item.nine_total * 1) + (item.upper_nine_total * 1));
            $scope.data.ageWisePrimaryStudentData[index].female_student = ""+((item.five_female * 1) + (item.six_female * 1) + (item.seven_female * 1) + (item.eight_female * 1) + (item.nine_female * 1) + (item.upper_nine_female * 1));
            $scope.totalOneToFiveFn();
        };

        $scope.totalSixToTenFn = function () {
            $scope.totalSixToTen = 0;
            $scope.femaleSixToTen = 0;
            var data = $scope.data.ageWiseStudent;
            for (var i = 0; i < data.length; i++) {
                if (['1206', '1207', '1208', '1309', '1310'].includes(data[i].class_id)) {
                    if (!isNaN(parseInt(data[i].total_student))) {
                        $scope.totalSixToTen += parseInt(data[i].total_student);
                    }
                    if (!isNaN(parseInt(data[i].female_student))) {
                        $scope.femaleSixToTen += parseInt(data[i].female_student);
                    }
                }
            }
        };

        $scope.totalSixToTenSingleFn = function (index) {
            let item = $scope.data.ageWiseStudent[index];
            $scope.data.ageWiseStudent[index].total_student = ""+((item.ten_total * 1) + (item.eleven_total * 1) + (item.twelve_total * 1) + (item.thirteen_total * 1) + (item.fourteen_total * 1) + (item.fifteen_total * 1) + (item.sixteen_total * 1) + (item.seventeen_total * 1));
            $scope.data.ageWiseStudent[index].female_student = ""+((item.ten_female * 1) + (item.eleven_female * 1) + (item.twelve_female * 1) + (item.thirteen_female * 1) + (item.fourteen_female * 1) + (item.fifteen_female * 1) + (item.sixteen_female * 1) + (item.seventeen_female * 1));
            $scope.totalSixToTenFn();
        };
        /*Auto Sum*/

        /*****VALIDATION********/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];
         /*   if (parseInt($scope.totalOneToFive) !== parseInt($scope.data.studentSummaryTotal.one_five_total)) {
                $scope.errorMessage.push('২.১১ এর (১ম-৫ম) এর মোট শিক্ষার্থীর(' + parseInt($scope.totalOneToFive) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ১ম-৫ম মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.one_five_total) + ') মিল নেই।')
            }
            if (parseInt($scope.femaleOneToFive) !== parseInt($scope.data.studentSummaryTotal.one_five_girl)) {
                $scope.errorMessage.push('২.১১ এর (১ম-৫ম) এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.femaleOneToFive) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ১ম-৫ম এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.one_five_girl) + ') মিল নেই।')
            }*/

            if (parseInt($scope.totalSixToTen) !== parseInt($scope.data.studentSummaryTotal.six_ten_total)) {
                $scope.errorMessage.push('২.১২ এর (৬ষ্ঠ-১০ম) এর মোট শিক্ষার্থীর(' + parseInt($scope.totalSixToTen) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ৬ষ্ঠ-১০ম মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.six_ten_total) + ') মিল নেই।')
            }
            if (parseInt($scope.femaleSixToTen) !== parseInt($scope.data.studentSummaryTotal.six_ten_girl)) {
                $scope.errorMessage.push('২.১২ এর (৬ষ্ঠ-১০ম) এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.femaleSixToTen) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ৬ষ্ঠ-১০ম এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.six_ten_girl) + ') মিল নেই।')
            }
        };
        /*****VALIDATION********/

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
        };

        /*FInding primary age class name*/
        $scope.findPrimClassName = function (id) {
            var classList = $scope.data.primaryAgeClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*FInding school age class name*/
        $scope.findClassName = function (id) {
            var classList = $scope.data.secAgeclasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
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
            url: apiServer + '/schoolThirdPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.dataLoaded = true;
            $scope.totalOneToFiveFn();
            $scope.totalSixToTenFn();

        }).catch(function (error) {
            console.log(error);
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
