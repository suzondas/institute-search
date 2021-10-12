var app = angular.module('schoolFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.errorMessage = [];
        $scope.totalOneToFive = 0;
        $scope.femaleOneToFive = 0;
        $scope.totalSixToten = 0;
        $scope.femaleSixToten = 0;
        $scope.studentSummery = null;
        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.studentSummery);
        };

        //Finding Class Index
        $scope.findClIndex = function (classId, levId) {
            var idy = null;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if ($scope.studentSummery[i].class_id == classId && $scope.studentSummery[i].education_level_id == levId) {
                    idy = i;
                    break;
                }
            }
            //console.log(idy);
            return idy;
        };

        //Finding Class Group Index
        //$scope.stuentsSummery = $scope.data.studentSummery;
        $scope.findIndex = function (groupId, classId) {
            var idx = null;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if ($scope.studentSummery[i].class_id == classId && $scope.studentSummery[i].group_id == groupId) {
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*FInding hscVocName*/
        $scope.hscVocName = function (id) {
            var vocClassList = $scope.data.vocClasses;
            var vocClsName = null;
            vocClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return vocClsName = currentValue.class_name_bangla;
                }
            });
            return vocClsName;
        }

        /*FInding hscBmName*/
        $scope.hscBmName = function (id) {
            var bmClassList = $scope.data.bmClasses;
            var bmClsName = null;
            bmClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return bmClsName = currentValue.class_name_bangla;
                }
            });
            return bmClsName;
        }
        /*===========================Helper Functions Ends==============================*/
        /*totalOneToFive*/
        $scope.totalOneToFiveFn = function () {
            $scope.totalOneToFive = 0;
            $scope.femaleOneToFive = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['1101', '1102', '1103', '1104', '1105'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalOneToFive += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleOneToFive += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };
        /*totalOneToFive*/
        $scope.totalSixTotenFn = function () {
            $scope.totalSixToten = 0;
            $scope.femaleSixToten = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['1206', '1207', '1208', '1309', '1310'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalSixToten += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleSixToten += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer + '/schoolFirstPage/' + inst_id
        }).then(function (response) {
            $scope.data = response.data;
            $scope.studentSummery = $scope.data.studentSummery;
            // console.log(response.data)
            $scope.totalOneToFiveFn();
            $scope.totalSixTotenFn();
            $scope.dataLoaded = true;

        }, function (error) {
            console.log(error);
            alert('Something went wrong! please contact BANBEIS')
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/

        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];
            //    1-5
            if (parseInt($scope.data.studentSummaryTotal.one_five_total) < parseInt($scope.data.studentSummaryTotal.one_five_girl)) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.one_five_total === undefined || $scope.data.studentSummaryTotal.one_five_total === null) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.one_five_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.one_five_girl === undefined || $scope.data.studentSummaryTotal.one_five_girl === null) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.one_five_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if (parseInt($scope.data.studentSummaryTotal.one_five_total) !== parseInt($scope.totalOneToFive)) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ১-৫ শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.one_five_girl) !== parseInt($scope.femaleOneToFive)) {
                $scope.errorMessage.push('২.১ এর ১ম-৫ম এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ১-৫ শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.six_ten_total) !== parseInt($scope.totalSixToten)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ৬ষ্ঠ-১০ম শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.six_ten_girl) !== parseInt($scope.femaleSixToten)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ৬ষ্ঠ-১০ম শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }

            //    6-10
            if (parseInt($scope.data.studentSummaryTotal.six_ten_total) < parseInt($scope.data.studentSummaryTotal.six_ten_girl)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.six_ten_total === undefined || $scope.data.studentSummaryTotal.six_ten_total === null || $scope.data.studentSummaryTotal.six_ten_total == "0") {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.six_ten_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.six_ten_girl === undefined || $scope.data.studentSummaryTotal.six_ten_girl === null) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.six_ten_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
        };



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
