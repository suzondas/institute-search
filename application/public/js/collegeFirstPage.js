var app = angular.module('collegeFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.errorMessage = [];
        $scope.totalElevenTwelve = 0;
        $scope.femaleElevenTwelve = 0;
        $scope.totalDegree = 0;
        $scope.femaleDegree = 0;
        $scope.totalHons = 0;
        $scope.femaleHons = 0;
        $scope.totalMs = 0;
        $scope.femaleMs = 0;
        $scope.studentSummary = null;

        /*===========================Helper Functions==============================*/
        $scope.changeStudents = function () {
            $scope.totalElevenTwelve = 0;
            $scope.femaleElevenTwelve = 0;
            $scope.totalDegree = 0;
            $scope.femaleDegree = 0;
            $scope.totalHons = 0;
            $scope.femaleHons = 0;
            $scope.totalMs = 0;
            $scope.femaleMs = 0;
            for (var i = 0; i < $scope.studentSummary.length; i++) {
                /*11-12*/
                if (['3111', '3112'].includes($scope.studentSummary[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummary[i].total_student))) {
                        $scope.totalElevenTwelve += parseInt($scope.studentSummary[i].total_student);
                        console.log($scope.totalElevenTwelve)

                    }
                    if (!isNaN(parseInt($scope.studentSummary[i].female_student))) {
                        $scope.femaleElevenTwelve += parseInt($scope.studentSummary[i].female_student);
                    }
                }
                /*Degree*/
                if (['3213', '3214', '3215'].includes($scope.studentSummary[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummary[i].total_student))) {
                        $scope.totalDegree += parseInt($scope.studentSummary[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummary[i].female_student))) {
                        $scope.femaleDegree += parseInt($scope.studentSummary[i].female_student);
                    }
                }
                /*Hons*/
                if (['3316'].includes($scope.studentSummary[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummary[i].total_student))) {
                        $scope.totalHons += parseInt($scope.studentSummary[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummary[i].female_student))) {
                        $scope.femaleHons += parseInt($scope.studentSummary[i].female_student);
                    }
                }
                /*MS*/
                if (['3422'].includes($scope.studentSummary[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummary[i].total_student))) {
                        $scope.totalMs += parseInt($scope.studentSummary[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummary[i].female_student))) {
                        $scope.femaleMs += parseInt($scope.studentSummary[i].female_student);
                    }
                }
            }
        };

        //Finding Class Index
        //$scope.studentSummary = $scope.data.studentSummary;
        $scope.findIndex = function (groupId, classId) {
            var idx = null;
            for (var i = 0; i < $scope.studentSummary.length; i++) {
                if ($scope.studentSummary[i].class_id == classId && $scope.studentSummary[i].group_id == groupId) {
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

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer + '/collegeFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.studentSummary = $scope.data.studentSummary;
            $scope.dataLoaded = true;
            $scope.changeStudents();

        }, function (error) {
            console.log(error);
            alert('Something went wrong! please contact BANBEIS')
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];

            /*11-12 validation*/

            //Total
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_total) < parseInt($scope.data.studentSummaryTotal.eleven_twelve_girl)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.eleven_twelve_total === undefined || $scope.data.studentSummaryTotal.eleven_twelve_total === null) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.eleven_twelve_total.length > 6) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }

            //Girls
            if ($scope.data.studentSummaryTotal.eleven_twelve_girl === undefined || $scope.data.studentSummaryTotal.eleven_twelve_girl === null) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.eleven_twelve_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //Cross Check
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_total) !== parseInt($scope.totalElevenTwelve)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত ১১শ-১২শ শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.eleven_twelve_girl) !== parseInt($scope.femaleElevenTwelve)) {
                $scope.errorMessage.push('২.১ এর ১১শ-১২শ এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত ১১শ-১২শ শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            /*Ends 11-12 validation*/

            /*Degree validation*/

            //Total
            if (parseInt($scope.data.studentSummaryTotal.bachelor_pass_total) < parseInt($scope.data.studentSummaryTotal.bachelor_pass_girl)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.bachelor_pass_total === undefined || $scope.data.studentSummaryTotal.bachelor_pass_total === null) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ)  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.bachelor_pass_total.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }

            //Girls
            if ($scope.data.studentSummaryTotal.bachelor_pass_girl === undefined || $scope.data.studentSummaryTotal.bachelor_pass_girl === null) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.bachelor_pass_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //Cross Check
            if (parseInt($scope.data.studentSummaryTotal.bachelor_pass_total) !== parseInt($scope.totalDegree)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত স্নাতক(পাশ) শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.bachelor_pass_girl) !== parseInt($scope.femaleDegree)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(পাশ) এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত স্নাতক(পাশ) শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            /*Ends Degree validation*/

            /*Honours validation*/

            //Total
            if (parseInt($scope.data.studentSummaryTotal.bachelor_honors_total) < parseInt($scope.data.studentSummaryTotal.bachelor_honors_girl)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.bachelor_honors_total === undefined || $scope.data.studentSummaryTotal.bachelor_honors_total === null) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান)  এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.bachelor_honors_total.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }

            //Girls
            if ($scope.data.studentSummaryTotal.bachelor_honors_girl === undefined || $scope.data.studentSummaryTotal.bachelor_honors_girl === null) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.bachelor_honors_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //Cross Check
            if (parseInt($scope.data.studentSummaryTotal.bachelor_honors_total) !== parseInt($scope.totalHons)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত স্নাতক(সম্মান) শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.bachelor_honors_girl) !== parseInt($scope.femaleHons)) {
                $scope.errorMessage.push('২.১ এর স্নাতক(সম্মান) এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত স্নাতক(সম্মান) শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            /*Honours  validation*/

            /*Masters validation*/

            //Total
            if (parseInt($scope.data.studentSummaryTotal.masters_total) < parseInt($scope.data.studentSummaryTotal.masters_girl)) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.masters_total === undefined || $scope.data.studentSummaryTotal.masters_total === null) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.masters_total.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }

            //Girls
            if ($scope.data.studentSummaryTotal.masters_girl === undefined || $scope.data.studentSummaryTotal.masters_girl === null) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.masters_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            //Cross Check
            if (parseInt($scope.data.studentSummaryTotal.masters_total) !== parseInt($scope.totalMs)) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর শ্রেণীর মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত স্নাতকোত্তর শ্রেণীর মোট শিক্ষার্থীর মিল নেই।')
            }
            if (parseInt($scope.data.studentSummaryTotal.masters_girl) !== parseInt($scope.femaleMs)) {
                $scope.errorMessage.push('২.১ এর স্নাতকোত্তর এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত স্নাতকোত্তর শ্রেণীর মোট ছাত্রী সংখ্যার মিল নেই।')
            }
            /*Masters validation*/

            /*Total 0 validation*/
            let total = $scope.totalElevenTwelve + $scope.totalDegree + $scope.totalHons + $scope.totalMs;
            if(total === 0){
                $scope.errorMessage.push('২.২ অংশে কোন শিক্ষার্থী সংখ্যা প্রদান করা হয়নি।')
            }
            /*Total 0 validation*/

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
            dataToSend.studentSummaryTotal = $scope.data.studentSummaryTotal;
            dataToSend.studentSummary = $scope.studentSummary;
            dataToSend.studentSummaryRepeater = $scope.data.studentSummaryRepeater;
            dataToSend.studentSummaryDropout = $scope.data.studentSummaryDropout;
            dataToSend.hscVocStudent = $scope.data.hscVocStudent;
            dataToSend.hscBmStudent = $scope.data.hscBmStudent;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer + '/collegeFirstPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("First page data has been saved successfully");
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
