@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="madStdSixthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৬</span>
                </div>
                <div class="form-control bg-number-label">মাধ্যমিক স্তরে শ্রেণি, বিভাগভিত্তিক শিক্ষার্থী, উত্তীর্ণ ও
                    অনুত্তীর্ণ সম্পর্কিত তথ্য, ডিসেম্বর ২০২০ (বার্ষিক পরীক্ষার ফলাফল)
                </div>
            </div>
            <div class="contentBoxBody col-md-10">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td rowspan="2">বিভাগ</td>
                        <td colspan="2">মোট শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">পরীক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উত্তীর্ণ</td>
                        <td colspan="2">অনুত্তীর্ণ</td>
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
                    </tr>
                    <tbody ng-repeat="item in data.classes">
                    <td rowspan="@{{item.groups.length+1}}" style="text-align: left">@{{item.class_name_bangla}}</td>
                    <td ng-if="item.groups.length==0">-</td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].total_student"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].female_student"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].total_candidate"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].female_candidate"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].total_promoted"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].female_promoted"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].total_failed"/></td>
                    <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter ng-init="idy = findExIndex(item.class_id,item.education_level_id)" ng-model="studentSummeryPrevYr[idy].female_failed"/></td>
                    <tr ng-repeat="i in item.groups" ng-if="item.groups.length!=0">
                        <td style="text-align: left">@{{i.group_name_bn}}</td>
                        <td><input class="w-50" type="number" number-converter ng-init="idx = findIndex(i.group_id,item.class_id)" ng-model="studentSummeryPrevYr[idx].total_student"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].female_student"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].total_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].female_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].total_promoted"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].female_promoted"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].total_failed"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="studentSummeryPrevYr[idx].female_failed"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৭</span>
                </div>
                <div class="form-control bg-number-label">বিভাগভিত্তিক বিভিন্ন বোর্ড পরীক্ষার ফলাফল:</div>
            </div>
            <div class="contentBoxBody ">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">পরীক্ষার নাম ও বছর</td>
                        <td scope="col" rowspan="3">বিভাগ</td>
                        <td scope="col" rowspan="2" colspan="2">রেজি: শিক্ষার্থী সংখ্যা</td>
                        <td scope="col" rowspan="2" colspan="2">পরিক্ষার্থীর সংখ্যা</td>
                        <td scope="col" colspan="12">প্রাপ্ত জিপিএ অনুযায়ী পাসের সংখ্যা</td>
                        <td scope="col" rowspan="2" colspan="2">মোট পাস</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="6">ছাত্র</td>
                        <td scope="col" colspan="6">ছাত্রী</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">৫.০০</td>
                        <td scope="col">৪- ৪.৯৯</td>
                        <td scope="col">৩.৫- ৩.৯৯</td>
                        <td scope="col">৩- ৩.৪৯</td>
                        <td scope="col">২- ২.৯৯</td>
                        <td scope="col">২ এর কম</td>
                        <td scope="col">৫.০০</td>
                        <td scope="col">৪- ৪.৯৯</td>
                        <td scope="col">৩.৫- ৩.৯৯</td>
                        <td scope="col">৩- ৩.৪৯</td>
                        <td scope="col">২- ২.৯৯</td>
                        <td scope="col">২ এর কম</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                    </tr>
                    <tbody ng-repeat="item in data.examLevel">
                    <td rowspan="@{{item.exam.length+1}}">@{{item.level}}</td>
                    <tr ng-repeat="i in item.exam">
                        <td>@{{i.name}}</td>
                        <td><input class="w-50" type="number" number-converter ng-init="idx = findIndexEx(i.exam_id,i.subject)" ng-model="boardWiseExamResults[idx].registered_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].registerd_female"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].total_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].female_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_plus_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_plus_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_minus_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_minus_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].b_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].b_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].c_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].c_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].d_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].d_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].total_pass"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].girls_pass"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৮</span>
                </div>
                <div class="form-control bg-number-label">কোর্স ভিত্তিক এসএসসি (ভোকেশনাল) শাখার শিক্ষার্থী ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3"> কোড</td>
                        <td rowspan="3" style="width: 300px"> ট্রেডের নাম</td>
                        <td colspan="4"> শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">৯ম</td>
                        <td colspan="2">১০ম</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.sscVocStd">
                        <td>@{{ item.trade_code }}</td>
                        <td style="text-align: left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৯</span>
                </div>
                <div class="form-control bg-number-label">এইচএসসি ভোকেশনাল শাখার শিক্ষার্থী ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3"> কোড</td>
                        <td rowspan="3" style="width: 300px"> ট্রেডের নাম</td>
                        <td colspan="4"> শিক্ষার্থীর সংখ্যা(২০২০)</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা(২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা(২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">১ম বর্ষ (একাদশ)</td>
                        <td colspan="2">২য় বর্ষ (দ্বাদশ)</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.hscVocStd">
                        <td>@{{ item.trade_code }}</td>
                        <td style="text-align: left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩০</span>
                </div>
                <div class="form-control bg-number-label">এইচএসসি বিএম শাখার শিক্ষার্থী ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3"> কোড</td>
                        <td rowspan="3" style="width: 300px"> ট্রেডের নাম</td>
                        <td colspan="4"> শিক্ষার্থীর সংখ্যা(২০২০)</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা(২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা(২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">১ম বর্ষ (একাদশ)</td>
                        <td colspan="2">২য় বর্ষ (দ্বাদশ)</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.hscBMStd">
                        <td>@{{ item.trade_code }}</td>
                        <td style="text-align: left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
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
    <script src="{{ asset('js/madStdSixthPage.js') }}" type="module" defer></script>
@stop
