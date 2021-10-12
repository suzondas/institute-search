@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="collegeThirdPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১১</span>
                </div>
                <div class="form-control bg-number-label">উচ্চ মাধ্যমিক- সর্বোচ্চ স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা
                    (০১/০১/২০২০)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
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
                    <tr ng-repeat="item in data.ageWiseStudent track by $index">
                        <td class="text-left" ng-bind="findClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.under_fifteen_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50"  ng-model="item.under_fifteen_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_total" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_female" ng-change="totalAgeBasedStud($index)"/> </td>
                        <td><input type="number" disabled number-converter class="w-50" ng-model="item.total_student"/> </td>
                        <td><input type="number" disabled number-converter class="w-50" ng-model="item.female_student"/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১২</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী শিক্ষার্থী সংখ্যা ২০২০</div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3" style="width: 75px">ক্র. নং</td>
                        <td rowspan="3">অভিভাবকের পেশা</td>
                        <td colspan="4">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>উচ্চ মাধ্যমিক</td>
                        <td>স্নাতক (পাস)</td>
                        <td>স্নাতক (সম্মান)</td>
                        <td>স্নাতকোত্তর</td>
                    </tr>
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
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৩</span>
                </div>
                <div class="form-control bg-number-label">শ্রেণি, বিষয়ভিত্তিক শিক্ষার্থী, উত্তীর্ণ ও অনুত্তীর্ণ
                    সম্পর্কিত তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="2">শ্রেণি</td>
                        <td scope="col" rowspan="2" style="width:120px">বিভাগ</td>
                        <td scope="col" colspan="2">মোট শিক্ষার্থীর সংখ্যা</td>
                        <td scope="col" colspan="2">পরিক্ষার্থীর সংখ্যা</td>
                        <td scope="col" colspan="2">উত্তীর্ণ</td>
                        <td scope="col" colspan="2">অনুত্তীর্ণ</td>
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
                    </tr>
                    <tbody  ng-repeat="item in data.classes">
                    <tr>
                        <td rowspan="@{{item.groups.length+1}}">@{{item.class_name_bangla}}</td>
                    <tr ng-repeat="i in item.groups">
                        <td class="text-left">@{{i.group_name_bn}}</td>
                        <td><input  class="w-50" type="number" number-converter ng-init="idx = findIndex(i.group_id,item.class_id)" ng-model="studentSummeryPrevYr[idx].total_student"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].female_student"  /></td>
                        <td><input type="number" number-converter class="w-50" ng-model="studentSummeryPrevYr[idx].total_candidate"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].female_candidate"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].total_promoted"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].female_promoted"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].total_failed"/></td>
                        <td><input type="number" number-converter class="w-50"  ng-model="studentSummeryPrevYr[idx].female_failed"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৪</span>
                </div>
                <div class="form-control bg-number-label">বিষয়ভিত্তিক শিক্ষক ও শিক্ষার্থীর সংখ্যা (শিক্ষকগণের তথ্য নিয়োগ
                    অনুযায়ী সন্নিবেশিত করুন):
                </div>
            </div>
            <div class="contentBoxBody col-md-10">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">বিষয়</td>
                        <td scope="col" colspan="2" rowspan="2">শিক্ষক (বিষয় ভিত্তিক)</td>
                        <td scope="col" colspan="10">শিক্ষার্থী সংখ্যা</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="2">এইচএসসি</td>
                        <td scope="col" colspan="2">স্নাতক পাস</td>
                        <td scope="col" colspan="2">অনার্স</td>
                        <td scope="col" colspan="2">মাস্টার্স প্রিলিমিনারি</td>
                        <td scope="col" colspan="2">মাস্টার্স ফাইনাল</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.subjectWiseData">
                        <td class="text-left" ng-bind="subjectName(item.subject_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.pr_masters"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.pr_masters_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_female"></td>
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
    <script src="{{ asset('js/collegeThirdPage.js') }}"></script>
@stop
