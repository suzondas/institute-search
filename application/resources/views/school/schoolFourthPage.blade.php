@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="schoolFourthPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <h3 align="center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div class="contentBox col-9">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১৫</span>
                    </div>
                    <div class="form-control bg-number-label">শ্রেণি, বিভাগভিত্তিক শিক্ষার্থী, উত্তীর্ণ ও
                        অনুত্তীর্ণ সম্পর্কিত তথ্য, ডিসেম্বর ২০২০ (বার্ষিক পরীক্ষার ফলাফল)
                    </div>
                </div>
                <br>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">শ্রেণি</td>
                            <td rowspan="2">বিভাগ</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">পরীক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উত্তীর্ণ</td>
                            <td colspan="2">অনুত্তীর্ণ</td>
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
                        </tr>
                        <tbody ng-repeat="item in data.classes">
                        <td rowspan="@{{item.groups.length+1}}">@{{item.class_name_bangla}}</td>
                        <td ng-if="item.groups.length==0">-</td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].total_student"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].female_student"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].total_candidate"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].female_candidate"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].total_promoted"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].female_promoted"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].total_failed"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input class="w-50" type="number" number-converter
                                                                 ng-init="idy = findExIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummeryPrevYr[idy].female_failed"/>
                        </td>
                        <tr ng-repeat="i in item.groups" ng-if="item.groups.length!=0">
                            <td>@{{i.group_name_bn}}</td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-init="idx = findIndex(i.group_id,item.class_id)"
                                       ng-model="studentSummeryPrevYr[idx].total_student"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].female_student"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].total_candidate"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].female_candidate"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].total_promoted"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].female_promoted"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].total_failed"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="studentSummeryPrevYr[idx].female_failed"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox col-12">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১৬</span>
                    </div>
                    <div class="form-control bg-number-label">বিভাগভিত্তিক বিভিন্ন বোর্ড পরীক্ষার ফলাফল:</div>
                </div>
                <div class="contentBoxBody ">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td scope="col" rowspan="3">পরীক্ষার নাম ও বছর</td>
                            <td scope="col" rowspan="3">বিভাগ</td>
                            <td scope="col" rowspan="2" colspan="2">রেজি: শিক্ষার্থী সংখ্যা</td>
                            <td scope="col" rowspan="2" colspan="2">পরিক্ষার্থীর সংখ্যা</td>
                            <td scope="col" colspan="12">প্রাপ্ত জিপিএ অনুযায়ী পাসের সংখ্যা</td>
                            <td scope="col" rowspan="2" colspan="2">মোট পাস</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td scope="col" colspan="6">ছাত্র</td>
                            <td scope="col" colspan="6">ছাত্রী</td>
                        </tr>
                        <tr class="custom-table-header">
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
                            <td><input class="w-50" type="number" number-converter
                                       ng-init="idx = findIndexEx(i.exam_id,i.subject)"
                                       ng-model="boardWiseExamResults[idx].registered_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].registerd_female"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].total_candidate"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].female_candidate"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_plus_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_plus_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_minus_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].a_minus_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].b_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].b_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].c_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].c_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].d_total"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].d_girls"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].total_pass"/></td>
                            <td><input class="w-50" type="number" number-converter
                                       ng-model="boardWiseExamResults[idx].girls_pass"/></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১৭</span>
                    </div>
                    <div class="form-control bg-number-label">ট্রেডভিত্তিক এসএসসি (ভোকেশনাল) শাখার শিক্ষার্থী ও ফলাফল
                        ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="3"> কোড</td>
                            <td rowspan="3" style="width: 300px"> ট্রেডের নাম</td>
                            <td colspan="4"> শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                            <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td colspan="2">৯ম</td>
                            <td colspan="2">১০ম</td>
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
                        </tr>
                        <tbody>
                        <tr ng-repeat="item in data.sscVocStd">
                            <td>@{{ item.trade_code }}</td>
                            <td class="text-left">@{{ item.trade_name }}</td>
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
                        <span class="input-group-text bg-number">২.১৮</span>
                    </div>
                    <div class="form-control bg-number-label">উন্মুক্ত বিশ্ববিদ্যালয়ের শিক্ষা প্রোগ্রাম</div>
                </div>
                <div class="contentBoxBody">
                    <label class="label-number font-weight-bold">২.১৮.১ আপনার প্রতিষ্ঠানে উন্মুক্ত বিশ্ববিদ্যালয়ের
                        শিক্ষা প্রোগ্রাম
                        পরিচালিত হয় কি?</label>
                    <select name="" style="width: 75px"
                            ng-model="data.instOtherInfo.open_unvi_course_yn">
                        <option value="" selected>Select</option>
                        <option value="1">হ্যাঁ-১</option>
                        <option value="2">না-২</option>
                    </select>
                    <div class="row" ng-if="data.instOtherInfo.open_unvi_course_yn==1">
                        <div class="col-md-6">
                            <label class="label-number font-weight-bold">২.১৮.২ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক
                                শিক্ষার্থীর
                                তথ্য নিম্নের
                                ছক মোতাবেক প্রদান করুন</label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr class="custom-table-header">
                                    <td rowspan="3">ভর্তির বছর</td>
                                    <td colspan="4"> এসএসসি প্রোগ্রাম</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td colspan="2">৯ম শ্রেণি</td>
                                    <td colspan="2">১০ম শ্রেণি</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>মোট</td>
                                    <td>ছাত্রী</td>
                                    <td>মোট</td>
                                    <td>ছাত্রী</td>
                                </tr>
                                <tbody>
                                <tr ng-repeat="item in data.openUnStd">
                                    <td>@{{ item.admit_year }}</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_total">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_female">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_total">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_female">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label class="label-number font-weight-bold">২.১৮.৩ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক ফলাফল
                                নিম্নের
                                ছক মোতাবেক
                                প্রদান করুন</label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr class="custom-table-header">
                                    <td rowspan="3" colspan="2" style="width:250px">ভর্তির বছর</td>
                                    <td colspan="4"> এসএসসি প্রোগ্রাম</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td colspan="2">৯ম শ্রেণি</td>
                                    <td colspan="2">১০ম শ্রেণি</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>পরিক্ষার্থী</td>
                                    <td>পাশের সংখ্যা</td>
                                    <td>পরিক্ষার্থী</td>
                                    <td>পাশের সংখ্যা</td>
                                </tr>
                                <tbody ng-repeat="item in data.openUnRes">
                                <tr>
                                    <td rowspan="2">@{{ item.year }}</td>
                                    <td>মোট</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_std">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_pass">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_std"></td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_pass">
                                    </td>
                                </tr>
                                <tr>
                                    <td>ছাত্রী</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_female">
                                    </td>
                                    <td><input type="number" number-converter class="w-50"
                                               ng-model="item.nine_fem_pass">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_fem_std">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_fem_pass">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center" class="">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/schoolFourthPage.js') }}"></script>
@stop
