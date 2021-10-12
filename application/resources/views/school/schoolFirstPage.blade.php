@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }

    </style>
    <div class="container-fluid" data-ng-app="schoolFirstPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>

            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১</span>
                    </div>
                    <div class="form-control bg-number-label"> স্তরভিত্তিক শিক্ষার্থী সংখ্যা ২০২০</div>
                </div>

                <div class="contentBoxBody">
                    <div class="col-md-6">
                        <table class="table table-sm table-bordered table-striped text-center">
                            <thead>
                            <tr class="custom-table-header">
                                <td colspan="2">১ম-৫ম</td>
                                <td colspan="2">৬ষ্ঠ-১০ম</td>
                                <td colspan="2">ভোকেশনাল</td>
                            </tr>
                            <tr>
                                <td>মোট <span style="color:red;font-weight:bold">*</span></td>
                                <td>ছাত্রী <span style="color:red;font-weight:bold">*</span></td>
                                <td>মোট <span style="color:red;font-weight:bold">*</span></td>
                                <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                                <td>মোট <span style="color:red;font-weight:bold">*</span></td>
                                <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.one_five_total"
                                           ng-required="true"></td>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.one_five_girl" ng-required="true"></td>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.six_ten_total" ng-required="true"></td>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.six_ten_girl" ng-required="true"></td>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.voc_total" ng-required="true"></td>
                                <td><input type="number" number-converter class="w-50"
                                           ng-model="data.studentSummaryTotal.voc_girl" ng-required="true"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২</span>
                    </div>
                    <div class="form-control bg-number-label"> শ্রেণি ও বিভাগভিত্তিক শিক্ষার্থীর সংখ্যা ২০২০
                        (২০২০-২০২২
                        শিক্ষাবর্ষের সকল শিক্ষার্থী অর্ন্তভুক্ত হবে)
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <thead>
                        <tr class="custom-table-header">
                            {{--<td>স্তর</td>--}}
                            <td rowspan="2">শ্রেণি</td>
                            <td rowspan="2">বিভাগ</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">ইংরেজি ভার্সনে অধ্যয়নরত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2">ট্রান্সফার ইন</td>
                            <td rowspan="2">ট্রান্সফার আউট</td>
                            <td rowspan="2">২০২৩ এর পাঠ্য পুস্তকের চাহিদা অনুযায়ী শিক্ষার্থীর সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>

                        </tr>
                        </thead>
                        <tbody ng-repeat="item in data.classes">
                        <td rowspan="@{{item.groups.length+1}}">@{{item.class_name_bangla}}</td>
                        <td ng-if="item.groups.length==0">-</td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].total_student" ng-change="totalOneToFiveFn();totalSixTotenFn();"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].female_student" ng-change="totalOneToFiveFn();totalSixTotenFn();"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].male_stipend"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].female_stipend"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].male_scholarship"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].female_scholarship"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].total_eng"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].female_eng"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].total_present"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].female_present"/>
                        </td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].transfer_in"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].transfer_out"/></td>
                        <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50"
                                                                 ng-init="idy = findClIndex(item.class_id,item.education_level_id)"
                                                                 ng-model="studentSummery[idy].nextyr_book_reg"/>
                        </td>
                        <tr ng-repeat="i in item.groups" ng-if="item.groups.length!=0">
                            <td>@{{i.group_name_bn}}</td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-init="idx = findIndex(i.group_id,item.class_id)"
                                       ng-model="studentSummery[idx].total_student" ng-change="totalSixTotenFn();"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].female_student" ng-change="totalSixTotenFn();"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].male_stipend"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].female_stipend"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].male_scholarship"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].female_scholarship"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].total_eng"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].female_eng"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].total_present"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].female_present"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].transfer_in"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].transfer_out"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummery[idx].nextyr_book_reg"/></td>
                        </tr>
                        <tr ng-if="item.class_id=='1105'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(১ম-৫ম)</td>
                            <td></td>
                            <td>@{{ totalOneToFive }}</td>
                            <td>@{{ femaleOneToFive }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr ng-if="item.class_id=='1310'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(৬ষ্ঠ-১০ম)</td>
                            <td></td>
                            <td>@{{ totalSixToten }}</td>
                            <td>@{{ femaleSixToten }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৩</span>
                    </div>
                    <div class="form-control bg-number-label">২০২০ ও তার পূর্বের শিক্ষার্থী ২০২০ সালে একই শ্রেণিতে
                        অধ্যয়নরত আছে এইরুপ শিক্ষার্থীর সংখ্যা (রিপিটার)
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td colspan="2">৬ষ্ঠ শ্রেণি</td>
                            <td colspan="2">৭ম শ্রেণি</td>
                            <td colspan="2">৮ম শ্রেণি</td>
                            <td colspan="2">৯ম শ্রেণি</td>
                            <td colspan="2">১০ম শ্রেণি</td>

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
                        </tr>
                        <tbody>
                        <tr>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.six_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.six_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.seven_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.seven_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.eight_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.eight_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.nine_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.nine_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.ten_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.ten_female"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৪</span>
                    </div>
                    <div class="form-control bg-number-label">২০২০ সালের ঝরেপড়া (ড্রপআউট) শিক্ষার্থীর সংখ্যা</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td colspan="2">৬ষ্ঠ শ্রেণি</td>
                            <td colspan="2">৭ম শ্রেণি</td>
                            <td colspan="2">৮ম শ্রেণি</td>
                            <td colspan="2">৯ম শ্রেণি</td>
                            <td colspan="2">১০ম শ্রেণি</td>
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
                        </tr>
                        <tbody>
                        <tr>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.six_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.six_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.seven_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.seven_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.eight_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.eight_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.nine_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.nine_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.ten_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.ten_female"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="contentBox col-12">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৫</span>
                    </div>
                    <div class="form-control bg-number-label">সেকশনভিত্তিক শিক্ষার্থীর তথ্য ২০২০ (সেকশন না থাকলে
                        পূরণ
                        করা প্রযোজ্য নয়)
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">সেকশন</td>
                            <td rowspan="2">৬ষ্ঠ শ্রেণি</td>
                            <td rowspan="2">৭ম শ্রেণি</td>
                            <td rowspan="2">৮ম শ্রেণি</td>
                            <td colspan="3">৯ম শ্রেণি</td>
                            <td colspan="3">১০ম শ্রেণি</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>বিজ্ঞান</td>
                            <td>মানবিক</td>
                            <td>ব্যবসায় শিক্ষা</td>
                            <td>বিজ্ঞান</td>
                            <td>মানবিক</td>
                            <td>ব্যবসায় শিক্ষা</td>
                        </tr>
                        <tbody>
                        <tr ng-repeat="item in data.secWsStd">
                            <td>@{{ item.section_id }}</td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.six"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seven"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.eight"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_science">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_arts"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.nine_commerce">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_science"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_arts"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.ten_commerce">
                            </td>
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
    <script src="{{ asset('js/schoolFirstPage.js') }}" type="module" defer></script>
@stop
