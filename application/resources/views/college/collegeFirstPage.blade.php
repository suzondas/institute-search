@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="collegeFirstPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <h3 align="center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div class="contentBox col-8 ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১</span>
                    </div>
                    <div class="form-control bg-number-label">স্তরভিত্তিক শিক্ষার্থী সংখ্যা ২০২০</div>
                </div>

                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            <td colspan="2">১১শ-১২শ</td>
                            <td colspan="2">স্নাতক (পাস)</td>
                            <td colspan="2">স্নাতক (সম্মান)</td>
                            <td colspan="2">স্নাতকোত্তর</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>মোট<span style="color:red;font-weight:bold">*</span></td>
                            <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                            <td>মোট<span style="color:red;font-weight:bold">*</span></td>
                            <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                            <td>মোট<span style="color:red;font-weight:bold">*</span></td>
                            <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                            <td>মোট<span style="color:red;font-weight:bold">*</span></td>
                            <td>ছাত্রী<span style="color:red;font-weight:bold">*</span></td>
                        </tr>
                        <tr>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.eleven_twelve_total">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.eleven_twelve_girl">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.bachelor_pass_total">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.bachelor_pass_girl">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.bachelor_honors_total">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.bachelor_honors_girl">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.masters_total">
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-required="true"
                                       ng-model="data.studentSummaryTotal.masters_girl">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২</span>
                    </div>
                    <div class="form-control bg-number-label">শ্রেণি, বিভাগভিত্তিক শিক্ষার্থী, ট্রান্সফার ইন, ট্রান্সফার
                        আউট, পুস্তকের চাহিদা অনুযায়ী শিক্ষার্থীর সংখ্যা ২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            {{--<td rowspan="2">স্তর</td>--}}
                            <td rowspan="2">শ্রেণি</td>
                            <td rowspan="2" style="width:120px">বিভাগ</td>
                            <td rowspan="2">আসন সংখ্যা</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">ইংরেজি ভার্সনে অধ্যয়নরত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2">ট্রান্সফার ইন</td>
                            <td rowspan="2">ট্রান্সফার আউট</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                        </tr>
                        </thead>
                        <tbody ng-repeat="item in data.classes">
                        <tr><td rowspan="@{{item.groups.length+1}}">@{{item.class_name_bangla}}</td></tr>
                        <tr ng-repeat="i in item.groups">
                            <td>@{{i.group_name_bn}}</td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-init="idx = findIndex(i.group_id,item.class_id)"
                                       ng-model="studentSummary[idx].seat"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].total_student" ng-change="changeStudents()"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].female_student" ng-change="changeStudents()"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].male_stipend"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].female_stipend"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].male_scholarship"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].female_scholarship"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].total_eng"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].female_eng"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].total_present"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].female_present"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].transfer_in"/></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="studentSummary[idx].transfer_out"/></td>
                        </tr>
                        <tr ng-if="item.class_id=='3112'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(একাদশ-দ্বাদশ)</td>
                            <td></td>
                            <td></td>
                            <td>@{{ totalElevenTwelve }}</td>
                            <td>@{{ femaleElevenTwelve }}</td>
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
                        <tr ng-if="item.class_id=='3215'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(স্নাতক পাশ)</td>
                            <td></td>
                            <td></td>
                            <td>@{{ totalDegree }}</td>
                            <td>@{{ femaleDegree }}</td>
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
                        <tr ng-if="item.class_id=='3316'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(স্নাতক সম্মান)</td>
                            <td></td>
                            <td></td>
                            <td>@{{ totalHons }}</td>
                            <td>@{{ femaleHons }}</td>
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
                        <tr ng-if="item.class_id=='3422'" style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট<br>(স্নাতকোত্তর)</td>
                            <td></td>
                            <td></td>
                            <td>@{{ totalMs }}</td>
                            <td>@{{ femaleMs }}</td>
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
            <br>
            <div class="row contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৩</span>
                    </div>
                    <div class="form-control bg-number-label">রিপিটার ও ড্রপআউট</div>
                </div>
                <div class="col-md-6 contentBoxBody">
                    <label class="label-text font-weight-bold">২.৩.১ রিপিটার সংক্রান্ত: ২০২০ সালের শিক্ষার্থী ২০২০ সালে
                        একই
                        শ্রেণিতে অধ্যয়নরত আছে এইরুপ শিক্ষার্থীর সংখ্যা (রিপিটার)</label>
                    <table class="table table-sm table-bordered table-striped text-center">
                        <thead>
                        <tr>
                            <th colspan="2">১১শ শ্রেণি</th>
                            <th colspan="2">১২শ শ্রেণি</th>
                            <th colspan="2">স্নাতক (পাশ)</th>
                            <th colspan="2">স্নাতক (সম্মান)</th>
                            <th colspan="2">স্নাতকোত্তর</th>
                        </tr>
                        </thead>
                        <tbody>
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
                        <tr>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.eleven_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.eleven_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.twelve_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.twelve_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.honours_pass_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.honours_pass_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.honours_somman_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.honours_somman_female"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.masters_total"></td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryRepeater.masters_female"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 contentBoxBody">
                    <label class="label-text font-weight-bold">২.৩.২ ২০২০ সালের ঝরেপড়া শিক্ষার্থীর সংখ্যা
                        (ড্রপআউট)</label>
                    <table class="table table-sm table-bordered table-striped mt-4 text-center">
                        <thead>
                        <tr>
                            <th colspan="2">১১শ শ্রেণি</th>
                            <th colspan="2">১২শ শ্রেণি</th>
                            <th colspan="2">স্নাতক (পাশ)</th>
                            <th colspan="2">স্নাতক (সম্মান)</th>
                            <th colspan="2">স্নাতকোত্তর</th>

                        </tr>
                        </thead>
                        <tbody>
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
                        <tr>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.eleven_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.eleven_female">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.twelve_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.twelve_female">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.honours_pass_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.honours_pass_female">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.honours_somman_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.honours_somman_female">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.masters_total">
                            </td>
                            <td><input type="number" number-converter class="w-50"
                                       ng-model="data.studentSummaryDropout.masters_female"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৪</span>
                    </div>
                    <div class="form-control bg-number-label">এইচএসসি ভোকেশনাল এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tbody>
                        <tr>
                            <td rowspan="2" style="width:100px">শ্রেণি</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2">ট্রান্সফার ইন</td>
                            <td rowspan="2">ট্রান্সফার আউট</td>
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
                        <tr ng-repeat="item in data.hscVocStudent">
                            <td ng-bind="hscVocName(item.class_id)"></td>
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
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৫</span>
                    </div>
                    <div class="form-control bg-number-label">এইচএসসি বিএম এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tbody>
                        <tr>
                            <td rowspan="2" style="width:100px">শ্রেণি</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                            <td rowspan="2">ট্রান্সফার ইন</td>
                            <td rowspan="2">ট্রান্সফার আউট</td>
                            <td rowspan="2">২০২২ এর পাঠ্যপুস্তকের চাহিদা অনুযায়ী শিক্ষার্থীর সংখ্যা</td>
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
                        <tr ng-repeat="item in data.hscBmStudent">
                            <td ng-bind="hscBmName(item.class_id)"></td>
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
            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/collegeFirstPage.js') }}"></script>
@stop
