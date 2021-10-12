@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="sncFourthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৮</span>
                </div>
                <div class="form-control bg-number-label">মাধ্যমিক স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (০১/০১/২০২০
                    তারিখে বয়স)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td>শ্রেণি</td>
                        <td colspan="2">১০ বছর</td>
                        <td colspan="2">১১ বছর</td>
                        <td colspan="2">১২ বছর</td>
                        <td colspan="2">১৩ বছর</td>
                        <td colspan="2">১৪ বছর</td>
                        <td colspan="2">১৫ বছর</td>
                        <td colspan="2">১৬ বছর</td>
                        <td colspan="2">১৭ বছর</td>
                        <td colspan="2">মোট</td>
                    </tr>
                    <tr>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseSecStudentData">
                        <td class="text-left" ng-bind="findClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"/> </td>
                        <td><input type="number" number-converter class="w-50"  ng-model="item.ten_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student"/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBoxBody">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৯</span>
                </div>
                <div class="form-control bg-number-label">উচ্চ মাধ্যমিক- সর্বোচ্চ স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা
                    (০১/০১/২০২০)
                </div>
            </div>
            <table class="table table-sm table-bordered table-striped text-center">
                <tr>
                    <td>শ্রেণি</td>
                    <td colspan="2">১৫ বছরের নীচে</td>
                    <td colspan="2">১৬ বছর</td>
                    <td colspan="2">১৭ বছর</td>
                    <td colspan="2">১৮ বছর</td>
                    <td colspan="2">১৯ বছর</td>
                    <td colspan="2">২০ বছরের উপরে</td>
                    <td colspan="2">২১ বছরের উপরে</td>
                    <td colspan="2">মোট</td>
                </tr>
                <tr>
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
                <tbody>
                <tr ng-repeat="item in data.ageWiseStudent">
                    <td class="text-left" ng-bind="findColClassName(item.class_id)"></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.under_fifteen_total"/> </td>
                    <td><input type="number" number-converter class="w-50"  ng-model="item.under_fifteen_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twenty_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twenty_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_total"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_female"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.total_student"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.female_student"/> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="contentBox col-8">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২০</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী মাধ্যমিক স্তরে শিক্ষার্থী সংখ্যা
                    (৬ষ্ঠ-১০ম):
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">

                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">অভিভাবকের পেশা</td>
                        <td colspan="5">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>৬ষ্ঠ শ্রেণি</td>
                        <td>৭ম শ্রেণি</td>
                        <td>৮ম শ্রেণি</td>
                        <td>৯ম শ্রেণি</td>
                        <td>১০ম শ্রেণি</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.guardianOccupation">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="occupationName(item.occupation_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox col-8">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২১</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী উচ্চ মাধ্যমিক ও তদুর্ধ্ব স্তরে
                    শিক্ষার্থীর সংখ্যা:
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">

                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">অভিভাবকের পেশা</td>
                        <td colspan="5">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>

                        <td>উচ্চ মাধ্যমিক</td>
                        <td>স্নাতক (পাস)</td>
                        <td>স্নাতক (সম্মান)</td>
                        <td>স্নাতকোত্তর</td>
                    </tr>
                    </tdead>
                    <tbody>
                    <tr ng-repeat="item in data.guardianOccupation">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="occupationName(item.occupation_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_somman"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২২</span>
                </div>
                <div class="form-control bg-number-label">বিষয়ভিত্তিক পাঠদানের তথ্য:</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">বিষয়</td>
                        <td scope="col" colspan="2" rowspan="2">শিক্ষক (বিষয় ভিত্তিক)</td>
                        <td scope="col" colspan="12">শিক্ষার্থী সংখ্যা</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="2">৬ষ্ঠ</td>
                        <td scope="col" colspan="2">৭ম</td>
                        <td scope="col" colspan="2">৮ম</td>
                        <td scope="col" colspan="2">৯ম</td>
                        <td scope="col" colspan="2">১০ম</td>
                        <td scope="col" colspan="2">এইচএসসি</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">মহিলা</td>
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
                    <tbody>
                    <tr ng-repeat="item in data.subjectWiseData">
                        <td class="text-left" ng-bind="subjectName(item.subject_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher_female"></td>
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
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/sncFourthPage.js') }}" type="module" defer></script>
@stop
