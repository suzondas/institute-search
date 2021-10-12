@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="profStdSecondPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৩</span>
                </div>
                <div class="form-control bg-number-label"> বিশেষ চাহিদাসম্পন্ন শিক্ষক ও শিক্ষার্থী
                </div>
            </div>
            <table class="table table-sm table-bordered table-striped">
                <tr>
                    <td class="font-weight-bold">২.১৩.১ প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষার্থী আছে কি?
                        <select ng-model="data.instituteSpecialStudents.special_std_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                    <td class="font-weight-bold">২.১৩.২ উত্তর হ্যাঁ হলে তাদের জন্য সুবিধাসমূহ কী কী?<br>
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
                    <td class="font-weight-bold">২.১৩.৩ বিল্ডিং এ Ramp এর ব্যবস্থা আছে কি?
                        <select ng-model="data.instituteSpecialStudents.ramp_access_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                </tr>
            </table>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৩.৪</span>
                </div>
                <div class="form-control bg-number-label"> বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী সংখ্যা ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="col-md-6 table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীর ধরন</td>
                        <td colspan="2">শিক্ষার্থী</td>

                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseDisableStudent">
                        <td ng-bind="$index+1"></td>
                        <td style="text-align:left" ng-bind="catDisStdName(item.disable_type)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center"><button ng-click="submitData()" type="button" class="btn btn-success">Save and Next</button>
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')

        <script src="{{ asset('js/profStdSecondPage.js') }}" type="module" defer></script>

@stop
