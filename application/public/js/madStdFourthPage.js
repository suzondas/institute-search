var app = angular.module('madStdFourthPage', []);
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
        $scope.totalAlimToMas = 0;
        $scope.femaleAlimToMas = 0;
        $scope.errorMessage = [];
        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.data.occupationsList);
        };

        /*Auto Sum*/
        /*totalOneToFive*/
        $scope.totalOneToFiveFn = function () {
            $scope.totalOneToFive = 0;
            $scope.femaleOneToFive = 0;
            var data = $scope.data.ageWiseEbtStudentData;
            for (var i = 0; i < data.length; i++) {
                if (['2000', '2001', '2002', '2003', '2004', '2005'].includes(data[i].class_id)) {
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
            let item = $scope.data.ageWiseEbtStudentData[index];
            $scope.data.ageWiseEbtStudentData[index].total_student = ""+((item.five_total * 1) + (item.six_total * 1) + (item.seven_total * 1) + (item.eight_total * 1) + (item.nine_total * 1) + (item.ten_total * 1) + (item.eleven_total * 1) + (item.twelve_total * 1));
            $scope.data.ageWiseEbtStudentData[index].female_student = ""+((item.five_female * 1) + (item.six_female * 1) + (item.seven_female * 1) + (item.eight_female * 1) + (item.nine_female * 1) + (item.ten_female * 1) + (item.eleven_female * 1) + + (item.twelve_female * 1));
            $scope.totalOneToFiveFn();
        };

        $scope.totalSixToTenFn = function () {
            $scope.totalSixToTen = 0;
            $scope.femaleSixToTen = 0;
            var data = $scope.data.ageWiseSecStudentData;
            for (var i = 0; i < data.length; i++) {
                if (['2106', '2107', '2108', '2109', '2110'].includes(data[i].class_id)) {
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
            let item = $scope.data.ageWiseSecStudentData[index];
            $scope.data.ageWiseSecStudentData[index].total_student = ""+((item.ten_total * 1) + (item.eleven_total * 1) + (item.twelve_total * 1) + (item.thirteen_total * 1) + (item.fourteen_total * 1) + (item.fifteen_total * 1) + (item.sixteen_total * 1) + (item.seventeen_total * 1));
            $scope.data.ageWiseSecStudentData[index].female_student = ""+((item.ten_female * 1) + (item.eleven_female * 1) + (item.twelve_female * 1) + (item.thirteen_female * 1) + (item.fourteen_female * 1) + (item.fifteen_female * 1) + (item.sixteen_female * 1) + (item.seventeen_female * 1));
            $scope.totalSixToTenFn();
        };

        $scope.totalAlimToMasFn = function () {
            $scope.totalAlimToMas = 0;
            $scope.femaleAlimToMas = 0;
            var data = $scope.data.ageWiseStudent;
            for (var i = 0; i < data.length; i++) {
                if (['2211','2212','2313','2314','2315','2316','2317','2318','2319','2415','2416','2518'].includes(data[i].class_id)) {
                    if (!isNaN(parseInt(data[i].total_student))) {
                        $scope.totalAlimToMas += parseInt(data[i].total_student);
                    }
                    if (!isNaN(parseInt(data[i].female_student))) {
                        $scope.femaleAlimToMas += parseInt(data[i].female_student);
                    }
                }
            }
        };

        $scope.totalAlimToMasSingleFn = function (index) {
            let item = $scope.data.ageWiseStudent[index];
            $scope.data.ageWiseStudent[index].total_student = ""+((item.under_fifteen_total * 1) + (item.sixteen_total * 1) + (item.seventeen_total * 1) + (item.eighteen_total * 1) + (item.nineteen_total * 1) + (item.twenty_total * 1) + (item.upper_twentyone_total * 1));
            $scope.data.ageWiseStudent[index].female_student = ""+((item.under_fifteen_female * 1) + (item.sixteen_female * 1) + (item.seventeen_female * 1) + (item.eighteen_female * 1) + (item.nineteen_female * 1) + (item.twenty_female * 1) + (item.upper_twentyone_female * 1));
            $scope.totalAlimToMasFn();
        };
        /*Auto Sum*/

        /*****VALIDATION********/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];
            if (parseInt($scope.totalOneToFive) !== parseInt($scope.data.studentSummaryTotal.one_five_total)) {
                $scope.errorMessage.push('২.২০ এর (১ম-৫ম) এর মোট শিক্ষার্থীর(' + parseInt($scope.totalOneToFive) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ১ম-৫ম মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.one_five_total) + ') মিল নেই।')
            }
            if (parseInt($scope.femaleOneToFive) !== parseInt($scope.data.studentSummaryTotal.one_five_girl)) {
                $scope.errorMessage.push('২.২০ এর (১ম-৫ম) এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.femaleOneToFive) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ১ম-৫ম এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.one_five_girl) + ') মিল নেই।')
            }

            if (parseInt($scope.totalSixToTen) !== parseInt($scope.data.studentSummaryTotal.six_ten_total)) {
                $scope.errorMessage.push('২.২১ এর (৬ষ্ঠ-১০ম) এর মোট শিক্ষার্থীর(' + parseInt($scope.totalSixToTen) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ৬ষ্ঠ-১০ম মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.six_ten_total) + ') মিল নেই।')
            }
            if (parseInt($scope.femaleSixToTen) !== parseInt($scope.data.studentSummaryTotal.six_ten_girl)) {
                $scope.errorMessage.push('২.২১ এর (৬ষ্ঠ-১০ম) এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.femaleSixToTen) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর ৬ষ্ঠ-১০ম এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.six_ten_girl) + ') মিল নেই।')
            }

            if (parseInt($scope.totalAlimToMas) !== parseInt($scope.data.studentSummaryTotal.totAlimToMas)) {
                $scope.errorMessage.push('২.২২ এর আলিম- সর্বোচ্চ স্তরের মোট শিক্ষার্থীর(' + parseInt($scope.totalAlimToMas) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর (১১শ-১২শ), ফাজিল(পাস), ফাজিল(সম্মান), কামিল এবং মাস্টার্স মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.totAlimToMas) + ') মিল নেই।')
            }
            if (parseInt($scope.femaleAlimToMas) !== parseInt($scope.data.studentSummaryTotal.femAlimToMas)) {
                $scope.errorMessage.push('২.২২ এর আলিম- সর্বোচ্চ স্তরের মোট ছাত্রী সংখ্যার(' + parseInt($scope.femaleAlimToMas) + ') সাথে শিক্ষার্থী-১ পাতার ২.১ এর (১১শ-১২শ), ফাজিল(পাস), ফাজিল(সম্মান), কামিল এবং মাস্টার্স এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.data.studentSummaryTotal.femAlimToMas) + ') মিল নেই।')
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

        /*FInding ebt age class name*/
        $scope.findEbtClassName = function (id) {
            var classList = $scope.data.ebtClasses;
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
            var classList = $scope.data.schClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*FInding college age class name*/
        $scope.findColClassName = function (id) {
            var classList = $scope.data.colClasses;
            var clsName = null;
            classList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return clsName = currentValue.class_name_bangla;
                }
            });
            return clsName;
        };

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/madStdFourthPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.dataLoaded = true;
            $scope.totalOneToFiveFn();
            $scope.totalSixToTenFn();
            $scope.totalAlimToMasFn();

        }).catch(function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.submitData = function () {
            $scope.validate();
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
            dataToSend.guardianOccupation = $scope.data.guardianOccupation;
            dataToSend.ageWiseEbtStudentData = $scope.data.ageWiseEbtStudentData;
            dataToSend.ageWiseSecStudentData = $scope.data.ageWiseSecStudentData;
            dataToSend.ageWiseStudent = $scope.data.ageWiseStudent;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/madStdFourthPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    alert("Fourth page data has been saved successfully");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                }).catch(
                function (error) {
                    console.log(error.response)
                    alert("Something went wrong. Try again");
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
