var app = angular.module('madStdFirstPage', []);
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
        $scope.totalAlim = 0;
        $scope.femaleAlim = 0;
        $scope.totalFazilPs = 0;
        $scope.femaleFazilPs = 0;
        $scope.totalFazilHn = 0;
        $scope.femaleFazilHn = 0;
        $scope.totalKamil = 0;
        $scope.femaleKamil = 0;
        $scope.totalMasters = 0;
        $scope.femaleMasters = 0;
        $scope.studentSummery = null;
        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.studentSummery);
        };

        //Finding Class Index
        //$scope.stuentSummery = $scope.data.studentSummery;
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
        //Finding ClassGroup Index
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


        /*===========================Helper Functions Ends==============================*/
        /*totalOneToFive*/
        $scope.totalOneToFiveFn = function () {
            $scope.totalOneToFive = 0;
            $scope.femaleOneToFive = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2001', '2002', '2003', '2004', '2005'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalOneToFive += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleOneToFive += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalSixToTen*/
        $scope.totalSixTotenFn = function () {
            $scope.totalSixToten = 0;
            $scope.femaleSixToten = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2106', '2107', '2108', '2109', '2110'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalSixToten += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleSixToten += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalAlim*/
        $scope.totalAlimFn = function () {
            $scope.totalAlim = 0;
            $scope.femaleAlim = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2211', '2212'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalAlim += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleAlim += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalFazilPsFn*/
        $scope.totalFazilPsFn = function () {
            $scope.totalFazilPs = 0;
            $scope.femaleFazilPs = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2313', '2314', '2315'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalFazilPs += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleFazilPs += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalFazilHnFn*/
        $scope.totalFazilHnFn = function () {
            $scope.totalFazilHn = 0;
            $scope.femaleFazilHn = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2316', '2317', '2318', '2319'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalFazilHn += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleFazilHn += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalKamilFn*/
        $scope.totalKamilFn = function () {
            $scope.totalKamil = 0;
            $scope.femaleKamil = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2415', '2416'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalKamil += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleKamil += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*totalMastersFn*/
        $scope.totalMastersFn = function () {
            $scope.totalMasters = 0;
            $scope.femaleMasters = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['2518'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.totalMasters += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.femaleMasters += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/madStdFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.studentSummery = $scope.data.studentSummery;
            $scope.studentSummeryCol = $scope.data.studentSummeryCol;
            $scope.totalOneToFiveFn();
            $scope.totalSixTotenFn();
            $scope.totalAlimFn();
            $scope.totalFazilPsFn();
            $scope.totalFazilHnFn();
            $scope.totalKamilFn();
            $scope.totalMastersFn();
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

            //    6-10
            if (parseInt($scope.data.studentSummaryTotal.six_ten_total) !== parseInt($scope.totalSixToten)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ৬ষ্ঠ-১০ম শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.six_ten_girl) !== parseInt($scope.femaleSixToten)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ৬ষ্ঠ-১০ম শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.six_ten_total) < parseInt($scope.data.studentSummaryTotal.six_ten_girl)) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.six_ten_total === undefined || $scope.data.studentSummaryTotal.six_ten_total===null) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.six_ten_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.six_ten_girl === undefined || $scope.data.studentSummaryTotal.six_ten_girl===null) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.six_ten_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ৬ষ্ঠ-১০ম এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //    Alim
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_total) !== parseInt($scope.totalAlim)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ১১শ-১২শ শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_girl) !== parseInt($scope.femaleAlim)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ১১শ-১২শ শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_total) < parseInt($scope.data.studentSummaryTotal.eleven_twelve_girl)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.eleven_twelve_total === undefined || $scope.data.studentSummaryTotal.eleven_twelve_total===null) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.six_ten_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ  এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.eleven_twelve_girl === undefined || $scope.data.studentSummaryTotal.eleven_twelve_girl===null) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ  এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.eleven_twelve_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //    Fazil Pass
            if (parseInt($scope.data.studentSummaryTotal.fazil_pass_total) !== parseInt($scope.totalFazilPs)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস) শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ফাজিল(পাস) শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.fazil_pass_girl) !== parseInt($scope.femaleFazilPs)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস) শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ফাজিল(পাস) শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.fazil_pass_total) < parseInt($scope.data.studentSummaryTotal.fazil_pass_girl)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস) এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.fazil_pass_total === undefined || $scope.data.studentSummaryTotal.fazil_pass_total===null) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস)  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.fazil_pass_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস)  এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.fazil_pass_girl === undefined || $scope.data.studentSummaryTotal.fazil_pass_girl===null) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস)  এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.fazil_pass_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ফাজিল(পাস) এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //    Fazil Hnrs
            if (parseInt($scope.data.studentSummaryTotal.fazil_honors_total) !== parseInt($scope.totalFazilHn)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান) শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ফাজিল(সম্মান) শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.fazil_honors_girl) !== parseInt($scope.femaleFazilHn)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান) শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ফাজিল(সম্মান) শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.fazil_honors_total) < parseInt($scope.data.studentSummaryTotal.fazil_honors_girl)) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান) এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.fazil_honors_total === undefined || $scope.data.studentSummaryTotal.fazil_honors_total===null) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান)  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.fazil_honors_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান)  এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.fazil_honors_girl === undefined || $scope.data.studentSummaryTotal.fazil_honors_girl===null) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান)  এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.fazil_honors_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ফাজিল(সম্মান) এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //   kamil
            if (parseInt($scope.data.studentSummaryTotal.kamil_total) !== parseInt($scope.totalKamil)) {
                $scope.errorMessage.push('২.১ এর কামিল শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত কামিল শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.kamil_girl) !== parseInt($scope.femaleKamil)) {
                $scope.errorMessage.push('২.১ এর কামিল শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত কামিল শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.kamil_total) < parseInt($scope.data.studentSummaryTotal.kamil_girl)) {
                $scope.errorMessage.push('২.১ এর কামিল এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.kamil_total === undefined || $scope.data.studentSummaryTotal.kamil_total===null) {
                $scope.errorMessage.push('২.১ এর কামিল  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.kamil_total.length > 6) {
                $scope.errorMessage.push('২.১ এর কামিল  এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.kamil_girl === undefined || $scope.data.studentSummaryTotal.kamil_girl===null) {
                $scope.errorMessage.push('২.১ এর কামিল  এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.kamil_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর কামিল এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //   Masters
            if (parseInt($scope.data.studentSummaryTotal.masters_total) !== parseInt($scope.totalMasters)) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত মাস্টার্স শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.masters_girl) !== parseInt($scope.femaleMasters)) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স শ্রেণীর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত মাস্টার্স শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.masters_total) < parseInt($scope.data.studentSummaryTotal.masters_girl)) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.masters_total === undefined || $scope.data.studentSummaryTotal.masters_total===null) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.masters_total.length > 6) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স  এর মোট সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.masters_girl === undefined || $scope.data.studentSummaryTotal.masters_girl===null) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স  এর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.masters_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর মাস্টার্স এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
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
            dataToSend.studentSummery = $scope.data.studentSummery;
            dataToSend.studentSummeryCol = $scope.data.studentSummeryCol;
            dataToSend.studentSummaryTotal = $scope.data.studentSummaryTotal;
            dataToSend.studentSummaryRepeater = $scope.data.studentSummaryRepeater;
            dataToSend.studentSummaryDropout = $scope.data.studentSummaryDropout;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/madStdFirstPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("First page data has been saved succesfull");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                })
                .catch(
                    function (error) {
                        alert("Try again");
                        console.log(error)
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
