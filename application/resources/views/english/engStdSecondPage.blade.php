@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="engStdSecondPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <div class="alert">

            </div>
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩</span>
                </div>
                <div class="form-control bg-number-label">বিভিন্ন ক্যাটাগরিভিত্তিক শিক্ষার্থীর সংখ্যা ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tbody>
                    <tr>
                        <td rowspan="2">ক্র.নং</td>
                        <td rowspan="2" style="width:150px">ক্যাটাগরি(শিক্ষার্থী)</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৬</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৭</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৮</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৯</td>
                        <td colspan="2">স্ট্যান্ডার্ড-১০</td>
                        <td colspan="2">এ লেভেল-১১</td>
                        <td colspan="2">এ লেভেল-১২</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tr ng-repeat="item in data.categoryWiseStudent">
                        <td ng-bind="$index+1"></td>
                        <td ng-bind="catStdName(item.category_id)" style="text-align: left"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৪</span>
                </div>
                <div class="form-control bg-number-label"> বিশেষ চাহিদাসম্পন্ন শিক্ষার্থীর সংখ্যা
                </div>
            </div>
            <table class="table table-sm table-bordered table-striped">
                <tr>
                    <td>২.৯.১ প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষার্থী আছে কি?
                        <select ng-model="data.instituteSpecialStudents.special_std_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                    <td>২.৯.২প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষার্থী আছে কি?<br>
                        <input type="checkbox" ng-checked="data.instituteSpecialStudents.disable_facility_audio==1"
                               ng-model="data.instituteSpecialStudents.disable_facility_audio" ng-value="data.instituteSpecialStudents.disable_facility_audio" ng-true-value="'1'" ng-false-value="'0'" >&nbsp; অডিও-১
                        &nbsp;
                        <input type="checkbox"  ng-checked="data.instituteSpecialStudents.disable_facility_braille==1"
                               ng-model="data.instituteSpecialStudents.disable_facility_braille" ng-true-value="'1'" ng-false-value="'0'" >&nbsp;
                        ব্রেইল-২ &nbsp;
                        <input type="checkbox" ng-checked="data.instituteSpecialStudents.disable_facility_signlan==1"
                               ng-model="data.instituteSpecialStudents.disable_facility_signlan" ng-true-value="'1'" ng-false-value="'0'" > &nbsp;সাইন
                        ভাষা-৩ &nbsp;
                        <input type="checkbox" ng-checked="data.instituteSpecialStudents.disable_facility_others==1"
                               ng-model="data.instituteSpecialStudents.disable_facility_others" ng-true-value="'1'" ng-false-value="'0'"> &nbsp;অন্যান্য-৪
                    </td>
                    <td>২.৯.৩ বিল্ডিং এ Ramp এর ব্যবস্থা আছে কি?
                        <select ng-model="data.instituteSpecialStudents.ramp_access_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                </tr>
            </table>
            <table class="table table-sm table-bordered table-striped text-center">
                <tr>
                    <td rowspan="2">ক্র. নং</td>
                    <td rowspan="2">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীর ধরন</td>
                    <td colspan="2">স্ট্যান্ডার্ড-৬</td>
                    <td colspan="2">স্ট্যান্ডার্ড-৭</td>
                    <td colspan="2">স্ট্যান্ডার্ড-৮</td>
                    <td colspan="2">স্ট্যান্ডার্ড-৯</td>
                    <td colspan="2">স্ট্যান্ডার্ড-১০</td>
                    <td colspan="2">এ লেভেল-১১</td>
                    <td colspan="2">এ লেভেল-১২</td>
                </tr>
                <tr>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                </tr>
                <tbody>
                <tr ng-repeat="item in data.categoryWiseDisableStudent">
                    <td ng-bind="$index+1"></td>
                    <td ng-bind="catDisStdName(item.disable_type)" style="text-align: left"></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.six_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.six_girls"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seven_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seven_girls"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eight_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eight_girls"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_girls"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_girls"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"/> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৫</span>
                </div>
                <div class="form-control bg-number-label">বিষয় ভিত্তিক শিক্ষার্থীর সংখ্যা:
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">বিষয়</td>
                        <td scope="col" colspan="10">শিক্ষার্থী সংখ্যা</td>
                    </tr>
                    <tr>
                        <td colspan="2">স্ট্যান্ডার্ড-৬</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৭</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৮</td>
                        <td colspan="2">স্ট্যান্ডার্ড-৯</td>
                        <td colspan="2">স্ট্যান্ডার্ড-১০</td>
                        <td colspan="2">এ লেভেল-১১</td>
                        <td colspan="2">এ লেভেল-১২</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.subjectWiseData">
                        <td ng-bind="subjectName(item.subject_id)" style="text-align: left"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc_eng"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc_eng_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox col-12" style="font-size: 11px;">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৬</span>
                </div>
                <div class="form-control bg-number-label">বিভাগ ও বছরভিত্তিক বিগত ২ বছরের ও-লেভেল এবং এ লেভেল পরীক্ষার ফলাফল
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">পরীক্ষার নাম</td>
                        <td scope="col" rowspan="3">বছর</td>
                        <td scope="col" rowspan="2" colspan="2">পরিক্ষার্থীর সংখ্যা</td>
                        <td scope="col" colspan="12">প্রাপ্ত জিপিএ অনুযায়ী পাসের সংখ্যা</td>
                        <td scope="col" rowspan="2" colspan="2">মোট পাস</td>
                        <td scope="col" rowspan="3">উচ্চ শিক্ষার জন্য বিদেশ গমনকারী শিক্ষার্থী</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="6">ছাত্র</td>
                        <td scope="col" colspan="6">ছাত্রী</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">A+</td>
                        <td scope="col">A</td>
                        <td scope="col">A-</td>
                        <td scope="col">B</td>
                        <td scope="col">C</td>
                        <td scope="col">D</td>
                        <td scope="col">A+</td>
                        <td scope="col">A</td>
                        <td scope="col">A-</td>
                        <td scope="col">B</td>
                        <td scope="col">C</td>
                        <td scope="col">D</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                    </tr>
                    <tbody ng-repeat="item in data.examLevel">
                    <td rowspan="@{{item.exam.length+1}}">@{{item.level}}</td>
                    <tr ng-repeat="i in item.exam">
                        <td style="text-align: left">@{{i.name}}</td>
                        <td><input type="number" number-converter class="w-50"  ng-init="idx = findIndexEx(i.exam_id,i.subject)" ng-model="boardWiseExamResults[idx].total_candidate"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].female_candidate"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_plus_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_minus_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].b_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].c_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].d_total"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_plus_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].a_minus_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].b_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].c_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].d_girls"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].total_pass"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].girls_pass"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="boardWiseExamResults[idx].foreign_std"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center"><button ng-click="submitData()" type="button" class="btn btn-success">Save and Next</button>
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/engStdSecondPage.js') }}"></script>
@stop
