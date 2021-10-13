@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdFirstPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div ng-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;margin-bottom: 5px;">
                <h5 class="font-weight-bold">এই পাতার Observation</h5>
                <ul> <li ng-repeat="i in errorMessage">@{{ i }} </li></ul>
            </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১</span>
                </div>
                <div class="form-control bg-number-label"> স্তরভিত্তিক শিক্ষার্থী সংখ্যা ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td colspan="2">এসএসসি বা সমমান</td>
                        <td colspan="2">এইচএসসি বা সমমান</td>
                        <td colspan="2">ডিপ্লোমা লেভেল</td>
                        <td colspan="2">সার্টিফিকেট/৩৬০ ঘন্টা</td>
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
                    <tr>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.tec_ssc_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.tec_ssc_girl"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.tec_hsc_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.tec_hsc_girl"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.dip_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.dip_girl"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.certf_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryTotal.certf_girl"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২</span>
                </div>
                <div class="form-control bg-number-label">এসএসসি ভোকেশনাল এর শ্রেণিভিত্তিক শিক্ষার্থী তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
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
                    <tr  ng-repeat="item in data.sscVocStudent">
                        <td class="text-left" ng-bind="sscVocName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student" ng-change="totalSscFn();"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student" ng-change="totalSscFn();"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.nextyr_book_reg"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩</span>
                </div>
                <div class="form-control bg-number-label">এইচএসসি ভোকেশনাল এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
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
                    <tbody>
                    <tr ng-repeat="item in data.hscVocStudent">
                        <td class="text-left" ng-bind="hscVocName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student" ng-change="totalHscFn();"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student" ng-change="totalHscFn();"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
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
                <div class="form-control bg-number-label">এইচএসসি বিএম এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
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
                    <tbody>
                    <tr ng-repeat="item in data.hscBmStudent">
                        <td ng-bind="hscBmName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_student" ng-change="totalHscFn();"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_student" ng-change="totalHscFn();"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৫</span>
                </div>
                <div class="form-control bg-number-label">এক বছর মেয়াদি সার্টিফিকেট কোর্সের বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
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
                    <tbody>
                    <tr ng-repeat="item in data.one_yr_certificate">
                        <td ng-bind="oneYrName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৬</span>
                </div>
                <div class="form-control bg-number-label">এক বছর মেয়াদি এডভান্সড সার্টিফিকেট কোর্সের বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
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
                    <tbody>
                    <tr ng-repeat="item in data.one_yr_adv_certificate">
                        <td ng-bind="oneYrAdvName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৭</span>
                </div>
                <div class="form-control bg-number-label"> ২০২০ ও তার পূর্বের শিক্ষার্থী ২০২০ সালে একই শ্রেণীতে(রিপিটার) অধ্যয়নরত আছে এইরুপ শিক্ষার্থীর সংখ্যা</div>
            </div>
        <div class="col-md-6 contentBoxBody">
            <table class="table table-sm table-bordered table-striped mt-4 text-center">
                <tr>
                    <td colspan="2">রিপিটার শিক্ষার্থী</td>
                </tr>
                <tbody>
                <tr>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                </tr>
                <tr>
                    <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryRepeater.tec_total">
                    </td>
                    <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryRepeater.tec_female">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        <br>
        <div class="row contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৮</span>
                </div>
                <div class="form-control bg-number-label"> ২০২০ সালের ঝড়ে পড়া (ড্রপআউট) শিক্ষার্থীর সংখ্যা</div>
            </div>
        <div class="col-md-6 contentBoxBody">
            <table class="table table-sm table-bordered table-striped mt-4 text-center">
                <tr>
                    <td colspan="2">ড্রপআউট শিক্ষার্থী</td>
                </tr>
                <tbody>
                <tr>
                    <td>মোট</td>
                    <td>ছাত্রী</td>
                </tr>
                <tr>
                    <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryDropout.tec_total">
                    </td>
                    <td><input type="number" number-converter class="w-50" ng-model="data.studentSummaryDropout.tec_female">
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button> </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/tecStdFirstPage.js') }}" type="module" defer></script>
@stop
