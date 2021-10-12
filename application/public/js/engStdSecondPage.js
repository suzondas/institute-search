var app = angular.module('engStdSecondPage', []);
(function (app) {
    "use strict";
    app.controller('myCtrl', function ($scope, $http) {

        /*Initial Variables*/
        $scope.data = null;
        $scope.dataLoaded = false;
        /*===========================Helper Functions==============================*/

        /*FInding catStdName*/
        $scope.catStdName = function (id) {
            var catStdList = $scope.data.categoryWiseList;
            var catStdNm = null;
            catStdList.forEach(function (currentValue, index) {
                if (currentValue.category_id == id) {
                    return catStdNm = currentValue.details_bn;
                }
            });
            return catStdNm;
        }

        /*FInding catDisStdName*/
        $scope.catDisStdName = function (id) {
            var catDisStdList = $scope.data.disableCategory;
            var catDisStdNm = null;
            catDisStdList.forEach(function (currentValue, index) {
                if (currentValue.disable_type == id) {
                    return catDisStdNm = currentValue.disability_bn;
                }
            });
            return catDisStdNm;
        };

        /*subjectName finding*/
        $scope.subjectName = function (id) {
            var subjtList = $scope.data.subjectList;
            var subjectName = null;
            subjtList.forEach(function (currentValue, index, arr) {
                if (currentValue.subjectdtl_id == id) {
                    return subjectName = currentValue.subject_name_eng;
                }
            });
            return subjectName;
        }
        /*subjectName finding*/

        /*find idx of board result*/
        $scope.findIndexEx = function (examId, subId) {
            var idx = null;
            for (var i = 0; i < $scope.boardWiseExamResults.length; i++) {
                if ($scope.boardWiseExamResults[i].exam_id == examId && $scope.boardWiseExamResults[i].subject == subId) {
                    idx = i;
                    break;
                }
            }
            return idx;
        };

        /*===========================Helper Functions Ends==============================*/

        /*==========================Data Fetching=======================================*/
        $http({
            method: 'GET',
            url: apiServer+'/engStdSecondPage/' + inst_id
        }).then(function (response) {
            // console.log(response.data)
            $scope.data = response.data;
            $scope.boardWiseExamResults = $scope.data.boardWiseExamResults;
            $scope.dataLoaded = true;
        }, function (error) {
            console.log(error);
            alert('Something went wrong! please contact BANBEIS Technical Team')
        });
        /*==========================Data Fetching Ends=======================================*/

        /*==========================Data Saving=======================================*/
        $scope.save = function () {
            console.log($scope.data.categoryWiseStudent);
            console.log($scope.data.instituteSpecialStudents);
            console.log($scope.data.categoryWiseDisableStudent);
        }
        $scope.submitData = function () {
            var ele = document.getElementsByClassName('locker');
            for (var i = 0; i < ele.length; i++) {
                ele[i].style.display = "block";
            }
            var dataToSend = {};
            dataToSend.instId = inst_id;
            dataToSend.categoryWiseStudent = $scope.data.categoryWiseStudent;
            dataToSend.instituteSpecialStudents = $scope.data.instituteSpecialStudents;
            dataToSend.categoryWiseDisableStudent = $scope.data.categoryWiseDisableStudent;
            dataToSend.subjectWiseData = $scope.data.subjectWiseData;
            dataToSend.boardWiseExamResults = $scope.boardWiseExamResults;
            console.log(dataToSend);
            $http({
                method: 'POST',
                url: apiServer+'/engStdSecondPage/submitData',
                data: dataToSend,
                dataType: 'json'
            }).then(
                function (response) {
                    console.log(response);
                    alert("Student Second page data has been saved succesfull");
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
