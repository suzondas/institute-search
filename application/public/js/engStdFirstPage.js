var app = angular.module('engStdFirstPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        $scope.total_student_play_st2=0,
        $scope.total_student_st3_st12=0,
        $scope.total_female_student_play_st2=0,
        $scope.total_female_student_st3_st12=0,
        $scope.total_agews_student_st3_st12=0,
        $scope.total_agews_female_student_st3_st12=0,
        $scope.total_student_cnt=0,
        $scope.total_female_student_cnt=0,
        $scope.errorMessage = [];
        /*===========================Helper Functions==============================*/
        // Console global
        $scope.console = function () {
            console.log($scope.studentSummery);
        };

        /*total_student_play_st2*/
        $scope.totalPlayToSt2Fn = function () {
            $scope.total_student_play_st2 = 0;
            $scope.total_female_student_play_st2 = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['9601', '9602', '9603', '9604', '9701', '9702'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.total_student_play_st2 += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.total_female_student_play_st2 += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*total_student_st3_st12*/
        $scope.totalSt3ToSt12Fn = function () {
            $scope.total_student_st3_st12 = 0;
            $scope.total_female_student_st3_st12 = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                if (['9703', '9704', '9705', '9706', '9707', '9708', '9709', '9710', '9811', '9812'].includes($scope.studentSummery[i].class_id)) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.total_student_st3_st12 += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.total_female_student_st3_st12 += parseInt($scope.studentSummery[i].female_student);
                    }
                }
            }
        };

        /*total_student_st3_st12 agewise*/
        $scope.totalSt3ToSt12AgeFn = function () {
            $scope.total_agews_student_st3_st12 = 0;
            $scope.total_agews_female_student_st3_st12 = 0;
            for (var i = 0; i < $scope.ageWiseStudent.length; i++) {
                if (['9703', '9704', '9705', '9706', '9707', '9708', '9709', '9710', '9811', '9812'].includes($scope.ageWiseStudent[i].class_id)) {
                    if (!isNaN(parseInt($scope.ageWiseStudent[i].total_student))) {
                        $scope.total_agews_student_st3_st12 += parseInt($scope.ageWiseStudent[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.data.ageWiseStudent[i].female_student))) {
                        $scope.total_agews_female_student_st3_st12 += parseInt($scope.ageWiseStudent[i].female_student);
                    }
                }
            }
        };

        $scope.totalSt3ToSt12SingleFn = function (index) {
            let item = $scope.ageWiseStudent[index];
            $scope.ageWiseStudent[index].total_student = ""+((item.ten_total * 1) + (item.eleven_total * 1) + (item.twelve_total * 1) + (item.thirteen_total * 1) + (item.fourteen_total * 1)
                + (item.fifteen_total * 1) + (item.sixteen_total * 1) + (item.seventeen_total * 1) + (item.eighteen_total * 1) + (item.nineteen_total * 1) + (item.twenty_total * 1));
            $scope.ageWiseStudent[index].female_student = ""+((item.ten_female * 1) + (item.eleven_female * 1) + (item.twelve_female * 1) + (item.thirteen_female * 1) + (item.fourteen_female * 1)
                + (item.fifteen_female * 1) + (item.sixteen_female * 1) + (item.seventeen_female * 1) + (item.eighteen_female * 1) + (item.nineteen_female * 1) + (item.twenty_female * 1));
            $scope.totalSt3ToSt12AgeFn();
        };

        /*totalOneToTwelve*/
        $scope.totalOneToTwelveFn = function () {
            $scope.total_student_cnt = 0;
            $scope.total_female_student_cnt = 0;
            for (var i = 0; i < $scope.studentSummery.length; i++) {
                    if (!isNaN(parseInt($scope.studentSummery[i].total_student))) {
                        $scope.total_student_cnt += parseInt($scope.studentSummery[i].total_student);
                    }
                    if (!isNaN(parseInt($scope.studentSummery[i].female_student))) {
                        $scope.total_female_student_cnt += parseInt($scope.studentSummery[i].female_student);
                    }

            }
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

        /*FInding school age class name*/
        $scope.findClassName = function (id) {
            var classList = $scope.data.ageClasses;
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
            url: apiServer+'/engStdFirstPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.studentSummery = $scope.data.studentSummery;
            $scope.ageWiseStudent = $scope.data.ageWiseStudent;
            $scope.totalOneToTwelveFn();
            $scope.totalPlayToSt2Fn();
            $scope.totalSt3ToSt12Fn();
            $scope.totalSt3ToSt12AgeFn();
            $scope.dataLoaded = true;
        }, function (error) {
            console.log(error);
            alert('Something went wrong! please contact BANBEIS Technical Team')
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        // $scope.save = function () {
        //     console.log($scope.studentSummery);
        //     console.log($scope.data.ageWiseStudent);
        // }
        $scope.validate = function () {
            $scope.errorMessage = null;
            $scope.errorMessage = [];
            //    1-12
            //console.log($scope.total_agews_student_st3_st12)
            //console.log($scope.total_female_student_cnt)
           // return;
            if (parseInt($scope.total_student_cnt) < parseInt($scope.total_female_student_cnt)) {
                $scope.errorMessage.push('২.১ এর ছা্ত্রী সংখ্যা থেকে মোট শিক্ষার্থী কম হতে পারে না।')
            }
            if ($scope.total_student_cnt.length > 6) {
                $scope.errorMessage.push('২.১ এর মোট শিক্ষার্থী Length 6 এর বেশি হতে পারেনা');
            }
           if ($scope.total_female_student_cnt.length > 6) {
                $scope.errorMessage.push('২.১ এর মোট ছাত্রী সংখ্যার Length 6 এর বেশি হতে পারেনা');
            }

            if (parseInt($scope.total_student_st3_st12) !== parseInt($scope.total_agews_student_st3_st12)) {
                $scope.errorMessage.push('২.২ এর মোট শিক্ষার্থীর(' + parseInt($scope.total_agews_student_st3_st12) + ')  ২.১ এর (স্টান্ডার্ড-৩ থেকে স্টান্ডার্ড-১২) মোট শিক্ষার্থী সংখ্যার(' + parseInt($scope.total_student_st3_st12) + ') মিল নেই।')
            }
            if (parseInt($scope.total_female_student_st3_st12) !== parseInt($scope.total_agews_female_student_st3_st12)) {
                $scope.errorMessage.push('২.২ এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.total_agews_female_student_st3_st12) + ') ২.১ এর (স্টান্ডার্ড-৩ থেকে স্টান্ডার্ড-১২) এর মোট ছাত্রী সংখ্যার(' + parseInt($scope.total_female_student_st3_st12) + ') মিল নেই।')
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
            dataToSend.ageWiseStudent = $scope.data.ageWiseStudent;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/engStdFirstPage/submitData',
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
                }).catch(
                function (response) {
                    console.log(response);
                    alert("Try again");
                    var ele = document.getElementsByClassName('locker');
                    for (var i = 0; i < ele.length; i++) {
                        ele[i].style.display = "none";
                    }
                });
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
