@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="schoolSecondPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <h3 align="center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৬ </span>
                    </div>
                    <div class="form-control bg-number-label">এসএসসি ভোকেশনাল এর শ্রেণিভিত্তিক শিক্ষার্থী তথ্য ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">শ্রেণি</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2">ট্রান্সফার ইন</td>
                            <td rowspan="2">ট্রান্সফার আউট</td>
                            <td rowspan="2">২০২২ এর পাঠ্যপুস্তকের চাহিদা অনুযায়ী শিক্ষার্থীর সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
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
                        <tr ng-repeat="item in data.sscVocStudent">
                            <td ng-bind="sscVocName(item.class_id)"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_student"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_student"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.male_stipend"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_stipend"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.male_scholarship">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_scholarship">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_present"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_present"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_rep"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_rep"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.transfer_in"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.transfer_out"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nextyr_book_reg"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৭</span>
                    </div>
                    <div class="form-control bg-number-label">স্তর ও ক্যাটাগরিভিত্তিক শিক্ষার্থীর সংখ্যা ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped ">
                        <tr class="custom-table-header">
                            <td rowspan="2" class="text-center">ক্র. নং</td>
                            <td rowspan="2" class="text-center">ক্যাটাগরি (শিক্ষার্থী)</td>
                            <td colspan="2" class="text-center"> ৬ষ্ঠ শ্রেণি</td>
                            <td colspan="2" class="text-center">৭ম শ্রেণি</td>
                            <td colspan="2" class="text-center">৮ম শ্রেণি</td>
                            <td colspan="2" class="text-center">৯ম শ্রেণি</td>
                            <td colspan="2" class="text-center">১০ম শ্রেণি</td>
                        </tr>
                        <tr class="custom-table-header">
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
                        <tr ng-repeat="item in data.categoryWiseStudent">
                            <td ng-bind="$index+1"></td>
                            <td ng-bind="catStdName(item.category_id)"></td>
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
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৮</span>
                    </div>
                    <div class="form-control bg-number-label"> বিশেষ চাহিদাসম্পন্ন শিক্ষক ও শিক্ষার্থী
                    </div>
                </div>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <td>২.৮.১ প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষার্থী আছে কি?
                            <select ng-model="data.instituteSpecialStudents.special_std_yn">
                                <option>Select</option>
                                <option value="1">হ্যাঁ-১</option>
                                <option value="2">না-২</option>
                            </select></td>
                        <td>২.৮.২ উত্তর হ্যাঁ হলে তাদের জন্য সুবিধাসমূহ কী কী?<br>
                            <input type="checkbox" ng-checked="data.instituteSpecialStudents.disable_facility_audio==1"
                                   ng-model="data.instituteSpecialStudents.disable_facility_audio"
                                   ng-value="data.instituteSpecialStudents.disable_facility_audio" ng-true-value="'1'"
                                   ng-false-value="'0'">&nbsp; অডিও-১
                            &nbsp;
                            <input type="checkbox"
                                   ng-checked="data.instituteSpecialStudents.disable_facility_braille==1"
                                   ng-model="data.instituteSpecialStudents.disable_facility_braille" ng-true-value="'1'"
                                   ng-false-value="'0'">&nbsp;
                            ব্রেইল-২ &nbsp;
                            <input type="checkbox"
                                   ng-checked="data.instituteSpecialStudents.disable_facility_signlan==1"
                                   ng-model="data.instituteSpecialStudents.disable_facility_signlan" ng-true-value="'1'"
                                   ng-false-value="'0'"> &nbsp;সাইন
                            ভাষা-৩ &nbsp;
                            <input type="checkbox" ng-checked="data.instituteSpecialStudents.disable_facility_others==1"
                                   ng-model="data.instituteSpecialStudents.disable_facility_others" ng-true-value="'1'"
                                   ng-false-value="'0'"> &nbsp;অন্যান্য-৪
                        </td>
                        <td>২.৮.৩ বিল্ডিং এ Ramp এর ব্যবস্থা আছে কি?
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
                        <span class="input-group-text bg-number">২.৯</span>
                    </div>
                    <div class="form-control bg-number-label"> বিশেষ চাহিদাসম্পন্ন শিক্ষার্থীর ধরন অনুযায়ী শিক্ষক ও
                        শিক্ষার্থীর সংখ্যা ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">ক্র. নং</td>
                            <td rowspan="2">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীর ধরন</td>
                            <td colspan="2">শিক্ষক</td>
                            <td colspan="2">৬ষ্ঠ শ্রেণি</td>
                            <td colspan="2">৭ম শ্রেণি</td>
                            <td colspan="2">৮ম শ্রেণি</td>
                            <td colspan="2">৯ম শ্রেণি</td>
                            <td colspan="2">১০ম শ্রেণি</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
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
                            <td class="text-left" ng-bind="catDisStdName(item.disable_type)"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.six_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.six_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seven_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seven_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.eight_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.eight_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_girls"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১০</span>
                    </div>
                    <div class="form-control bg-number-label"> ক্ষুদ্র নৃ-গোষ্ঠীর ধরন অনুযায়ী শিক্ষক ও
                        শিক্ষার্থীর সংখ্যা ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">

                        <tr class="custom-table-header">
                            <td>ক্র. নং</td>
                            <td>ক্ষুদ্র নৃ-গোষ্ঠীর ধরন</td>
                            <td colspan="2">শিক্ষক</td>
                            <td colspan="2">৬ষ্ঠ শ্রেণি</td>
                            <td colspan="2">৭ম শ্রেণি</td>
                            <td colspan="2">৮ম শ্রেণি</td>
                            <td colspan="2">৯ম শ্রেণি</td>
                            <td colspan="2">১০ম শ্রেণি</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td></td>
                            <td></td>
                            <td>মোট</td>
                            <td>মহিলা</td>
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
                        <tr ng-repeat="item in data.categoryWiseUpajati">
                            <td ng-bind="$index+1"></td>
                            <td class="text-left" ng-bind="findUpajaitName(item.upajati_id)"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.six_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.six_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seven_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seven_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.eight_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.eight_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_girls"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"/></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_girls"/></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div align="center" class="">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/schoolSecondPage.js') }}"></script>
@stop
