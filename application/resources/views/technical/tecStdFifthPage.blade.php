@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdFifthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৯</span>
                </div>
                <div class="form-control bg-number-label">বিভিন্ন ক্যাটাগরিভিত্তিক শিক্ষার্থীর তথ্য
                    ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">

                    <tr>
                        <td rowspan="2" >ক্র. নং</td>
                        <td rowspan="2">ক্যাটাগরি (শিক্ষার্থী)</td>
                        <td colspan="2"> ৯ম শ্রেণি</td>
                        <td colspan="2">১০ম শ্রেণি</td>
                        <td colspan="2">১১শ শ্রেণি</td>
                        <td colspan="2">১২শ শ্রেণি</td>
                        <td colspan="2">১৩শ শ্রেণি</td>
                        <td colspan="2">১৪শ শ্রেণি</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseStudent">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="catStdName(item.category_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২০</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন ইঞ্জি/ডিপ্লোমা সমমান - এর বিভিন্ন ক্যাটাগরিভিত্তিক শিক্ষার্থীর সংখ্যা
                    ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2" >ক্র. নং</td>
                        <td rowspan="2" >ক্যাটাগরি (শিক্ষার্থী)</td>
                        <td colspan="2"> ১ম পর্ব</td>
                        <td colspan="2" > ২য় পর্ব</td>
                        <td colspan="2" > ৩য় পর্ব</td>
                        <td colspan="2" > ৪র্থ পর্ব</td>
                        <td colspan="2" > ৫ম পর্ব</td>
                        <td colspan="2" > ৬ষ্ঠ পর্ব</td>
                        <td colspan="2"> ৭ম পর্ব</td>
                        <td colspan="2"> ৮ম পর্ব</td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseStudent">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="catStdName(item.category_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২১</span>
                </div>
                <div class="form-control bg-number-label"> বিশেষ চাহিদাসম্পন্ন শিক্ষক ও শিক্ষার্থীর
                </div>
            </div>
            <div class="contentBoxBody">
            <table class="table table-sm table-bordered table-striped">
                <tr>
                    <td class="">৩.৩.১ প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষার্থী আছে কি?
                        <select ng-model="data.instituteSpecialStudents.special_std_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                    <td class="">৩.৩.২ উত্তর হ্যাঁ হলে তাদের জন্য সুবিধাসমূহ কী কী?   <br>
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
                    <td class="">৩.৩.৩ বিল্ডিং এ Ramp এর ব্যবস্থা আছে কি?
                        <select ng-model="data.instituteSpecialStudents.ramp_access_yn">
                            <option>Select</option>
                            <option value="1">হ্যাঁ-১</option>
                            <option value="2">না-২</option>
                        </select></td>
                </tr>
            </table>
        </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২২</span>
                </div>
                <div class="form-control bg-number-label">বিশেষ চাহিদাসম্পন্ন শিক্ষক ও শিক্ষার্থীর
                    সংখ্যা ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীর ধরন</td>
                        <td colspan="2">শিক্ষক</td>
                        <td colspan="2">৯ম শ্রেণি</td>
                        <td colspan="2">১০ম শ্রেণি</td>
                        <td colspan="2">১১শ শ্রেণি</td>
                        <td colspan="2">১২শ শ্রেণি</td>
                        <td colspan="2">১৩শ শ্রেণি</td>
                        <td colspan="2">১৪শ শ্রেণি</td>
                    </tr>
                    <tr>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseDisableStudent">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="catDisStdName(item.disable_type)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_girls"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৩</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন ইঞ্জি/ডিপ্লোমা সমমান -এর প্রতিষ্ঠানে বিশেষ চাহিদাসম্পন্ন শিক্ষক ও শিক্ষার্থীর
                    সংখ্যা ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীর ধরন</td>
                        <td colspan="2">১ম পর্ব</td>
                        <td colspan="2">২য় পর্ব</td>
                        <td colspan="2">৩য় পর্ব</td>
                        <td colspan="2">৪র্থ পর্ব</td>
                        <td colspan="2">৫ম পর্ব</td>
                        <td colspan="2">৬ষ্ঠ পর্ব</td>
                        <td colspan="2">৭ম পর্ব</td>
                        <td colspan="2">৮ম পর্ব</td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseDisableStudent">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="catDisStdName(item.disable_type)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৪</span>
                </div>
                <div class="form-control bg-number-label">ক্ষুদ্র নৃ-গোষ্ঠীর ধরন অনুযায়ী শিক্ষক ও
                    শিক্ষার্থীর সংখ্যা ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td>ক্র. নং</td>
                        <td>ক্ষুদ্র নৃ-গোষ্ঠীর ধরন</td>
                        <td colspan="2">শিক্ষক</td>
                        <td colspan="2">৯ম শ্রেণি</td>
                        <td colspan="2">১০ম শ্রেণি</td>
                        <td colspan="2">১১শ শ্রেণি</td>
                        <td colspan="2">১২শ শ্রেণি</td>
                        <td colspan="2">১৩শ শ্রেণি</td>
                        <td colspan="2">১৪শ শ্রেণি</td>
                    </tr>
                    <tr>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseUpajati">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="findUpajaitName(item.upajati_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honors_girls"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_girls"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৫</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন ইঞ্জি/ডিপ্লোমা সমমান- এর প্রতিষ্ঠানে ক্ষুদ্র নৃ-গোষ্ঠীর ধরন অনুযায়ী শিক্ষক ও
                    শিক্ষার্থীর সংখ্যা ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">

                    <tr>
                        <td>ক্র. নং</td>
                        <td>ক্ষুদ্র নৃ-গোষ্ঠীর ধরন</td>
                        <td colspan="2">১ম পর্ব </td>
                        <td colspan="2">২য় পর্ব </td>
                        <td colspan="2">৩য় পর্ব </td>
                        <td colspan="2">৪র্থ পর্ব </td>
                        <td colspan="2">৫ম পর্ব </td>
                        <td colspan="2">৬ষ্ঠ  পর্ব </td>
                        <td colspan="2">৭ম পর্ব </td>
                        <td colspan="2">৮ম পর্ব </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    </tdead>
                    <tbody>
                    <tr ng-repeat="item in data.categoryWiseUpajati">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="findUpajaitName(item.upajati_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip1st_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip2nd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip3rd_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip4th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip5th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip6th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip7th_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dip8th_female"></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button> </div>
    </div>
@endsection
@section('javascript')

        <script src="{{ asset('js/tecStdFifthPage.js') }}" type="module" defer></script>

@stop
