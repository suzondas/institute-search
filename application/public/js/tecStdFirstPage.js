var app = angular.module('tecStdFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.errorMessage = [];
        $scope.totalSscStudent=0;
        $scope.totalSscFemale=0;
        $scope.totalHscStudent=0;
        $scope.totalHscFemale=0;

        /*===========================Helper Functions==============================*/
        // Console global

        /*FInding sscVocName*/
        $scope.sscVocName = function (id) {
            var svocClassList = $scope.data.sscVocClasses;
            var svocClsName = null;
            svocClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return svocClsName = currentValue.class_name_bangla;
                }
            });
            return svocClsName;
        }

        /*FInding hscVocName*/
        $scope.hscVocName = function (id) {
            var vocClassList = $scope.data.hscVocClasses;
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

        /*FInding oneYr Certificate Name*/
        $scope.oneYrName = function (id) {
            var oneYrClassList = $scope.data.oneYrClasses;
            var oneYrClsName = null;
            oneYrClassList.forEach(function (currentValue, index) {
                if (currentValue.class_id == id) {
                    return oneYrClsName = currentValue.class_name_bangla;
                }
            });
            return oneYrClsName;
        }
        /*Finding one yr adv certificate name oneYrAdvClasses*/

        $scope.oneYrAdvName = function (id) {
            var oneYrAdvClassList = $scope.data.oneYrAdvClasses;
            var oneYrAdvClassName = null;
            oneYrAdvClassList.forEach(function (currentValue, index) {
                    if (currentValue.class_id == id) {
                        return oneYrAdvClassName = currentValue.class_name_bangla;
                    }
                }
            );
            return oneYrAdvClassName;
        }
/*total SSC Student Calculation*/
        $scope.totalSscFn = function () {
            $scope.totalSscStudent = 0;
            $scope.totalSscFemale = 0;
          for(var i=0; i<$scope.data.sscVocStudent.length; i++){
              if(['5109','5110'].includes($scope.data.sscVocStudent[i].class_id)){
                  if (!isNaN(parseInt($scope.data.sscVocStudent[i].total_student))) {
                      $scope.totalSscStudent += parseInt($scope.data.sscVocStudent[i].total_student);
                  }
                  if (!isNaN(parseInt($scope.data.sscVocStudent[i].female_student))) {
                      $scope.totalSscFemale += parseInt($scope.data.sscVocStudent[i].female_student);
                  }

              }
          }
        };
        /*total HSC Student Calculation*/
        $scope.totalHscFn = function () {
            $scope.totalHscStudent = 0;
            $scope.totalHscFemale = 0;
            for(var i=0; i<$scope.data.hscVocStudent.length; i++){
                if(['5211','5212'].includes($scope.data.hscVocStudent[i].class_id)){
                    if (!isNaN(parseInt($scope.data.hscVocStudent[i].total_student))) {
                        $scope.totalHscStudent += parseInt($scope.data.hscVocStudent[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.data.hscVocStudent[i].female_student))) {
                        $scope.totalHscFemale += parseInt($scope.data.hscVocStudent[i].female_student);
                    }
                }
            }
            for(var i=0; i<$scope.data.hscBmStudent.length; i++){
                if(['5411','5412'].includes($scope.data.hscBmStudent[i].class_id)){
                    if (!isNaN(parseInt($scope.data.hscBmStudent[i].total_student))) {
                        $scope.totalHscStudent += parseInt($scope.data.hscBmStudent[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.data.hscBmStudent[i].female_student))) {
                        $scope.totalHscFemale += parseInt($scope.data.hscBmStudent[i].female_student);
                    }
                }
            }
            console.log($scope.totalHscStudent);
        };
        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/tecStdFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.dataLoaded = true;
            $scope.totalSscFn();
            $scope.totalHscFn();
        }, function (error) {
            console.log(error);
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/

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
            dataToSend.sscVocStudent = $scope.data.sscVocStudent;
            dataToSend.hscVocStudent = $scope.data.hscVocStudent;
            dataToSend.hscBmStudent = $scope.data.hscBmStudent;
            dataToSend.one_yr_certificate = $scope.data.one_yr_certificate;
            dataToSend.one_yr_adv_certificate = $scope.data.one_yr_adv_certificate;
            dataToSend.studentSummaryRepeater = $scope.data.studentSummaryRepeater;
            dataToSend.studentSummaryDropout = $scope.data.studentSummaryDropout;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/tecStdFirstPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("First page data has been saved succesfully");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                },
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
/*====validation====*/
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];
            //    SSC
            if (parseInt($scope.data.studentSummaryTotal.tec_ssc_total) < parseInt($scope.data.studentSummaryTotal.tec_ssc_girl)) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.tec_ssc_total === undefined || $scope.data.studentSummaryTotal.tec_ssc_total === null) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.tec_ssc_total.length > 6) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.tec_ssc_girl === undefined || $scope.data.studentSummaryTotal.tec_ssc_girl === null) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.tec_ssc_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            if (parseInt($scope.data.studentSummaryTotal.tec_ssc_total) !== parseInt($scope.totalSscStudent)) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান মোট শিক্ষার্থীর সাথে ২.২-এ প্রদত্ত  মোট শিক্ষার্থীর মিল নেই।');
            }
            if (parseInt($scope.data.studentSummaryTotal.tec_ssc_girl) !== parseInt($scope.totalSscFemale)) {
                $scope.errorMessage.push('২.১ এর এসএসসি বা সমমান এর ছাত্রী সংখ্যার সাথে ২.২-এ প্রদত্ত মোট ছাত্রী সংখ্যার মিল নেই।')
            }




            //HSC
            if (parseInt($scope.data.studentSummaryTotal.tec_hsc_total) < parseInt($scope.data.studentSummaryTotal.tec_hsc_girl)) {
                $scope.errorMessage.push('২.১ এর এইচএসসি  বা সমমান এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী  কম হতে পারে না।')
            }
            if ($scope.data.studentSummaryTotal.tec_hsc_total === undefined || $scope.data.studentSummaryTotal.tec_hsc_total === null) {
                $scope.errorMessage.push('২.১ এর এইচএসসি  বা সমমান এর মোট শিক্ষার্থী খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.tec_hsc_total.length > 6) {
                $scope.errorMessage.push('২.১ এর এইচএসসি  বা সমমান এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }
            if ($scope.data.studentSummaryTotal.tec_hsc_girl === undefined || $scope.data.studentSummaryTotal.tec_hsc_girl === null) {
                $scope.errorMessage.push('২.১ এর এইচএসসি  বা সমমান শ্রেণীর ছাত্রী সংখ্যা খালি থাকতে পারে না।');
            } else if ($scope.data.studentSummaryTotal.tec_hsc_girl.length > 6) {
                $scope.errorMessage.push('২.১ এর এইচএসসি  বা সমমান এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }
            if (parseInt($scope.data.studentSummaryTotal.tec_hsc_total) !== parseInt($scope.totalHscStudent)) {
                $scope.errorMessage.push('২.১ এর এইচএসসি বা সমমান মোট শিক্ষার্থীর সাথে ২.৩ ও ২.৪ -এ প্রদত্ত  মোট শিক্ষার্থীর মিল নেই।');
            }
            if (parseInt($scope.data.studentSummaryTotal.tec_hsc_girl) !== parseInt($scope.totalHscFemale)) {
                $scope.errorMessage.push('২.১ এর এইচএসসি বা সমমান এর ছাত্রী সংখ্যার সাথে ২.৩ ও ২.৪ -এ প্রদত্ত মোট ছাত্রী সংখ্যার মিল নেই।')
            }



        }
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
