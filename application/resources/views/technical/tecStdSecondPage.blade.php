@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdSecondPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৯</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন ইঞ্জি/ডিপ্লোমা সমমান- এর পর্ব ভিত্তিক শিক্ষার্থীর
                    তথ্য-২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত(সরকারী)</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত(প্রকল্প)</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত(সরকারী ও প্রকল্প)</td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr  ng-repeat="item in data.dipStudentData">
                        <td class="text-left" ng-bind="diplomaName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.govt_male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.govt_female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.pr_male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.pr_female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.gpr_male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.gpr_female_stipend"></td>
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
                    <span class="input-group-text bg-number">২.১০</span>
                </div>
                <div class="form-control bg-number-label">বেসিক ট্রেডে কোর্সের মেয়াদ(ঘন্টা/মাস/বর্ষ) ও শিক্ষার্থীর
                    তথ্য-২০২০
                </div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">কোর্সের ধরন</td>
                        <td rowspan="2">কোর্সের মেয়াদ</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td rowspan="2" class="text-left">বেসিক</td>
                        <td class="text-left">৩ মাস ৩৬০ ঘন্টা</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_3motn_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_3motn_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_3motn_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_3motn_stip_fem"/></td>
                    </tr>
                    <tr>
                        <td class="text-left">৬ মাস ৩৬০ ঘন্টা</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_6motn_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_6motn_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_6motn_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.bas_6motn_stip_fem"/></td>
                    </tr>
                    <tr>
                        <td class="text-left">RTO-()</td>
                        <td class="text-left">৩ মাস ৩৬০ ঘন্টা</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rto_3motn_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rto_3motn_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rto_3motn_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rto_3motn_stip_fem"/></td>
                    </tr>
                    <tr>
                        <td class="text-left">NTVQF(Level1-6)</td>
                        <td class="text-left">প্রতিটি কোর্সের মেয়াদ সর্বোচ্চ ৩৬০ ঘন্টা</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.ntv_360_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.ntv_360_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.ntv_360_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.ntv_360_stip_fem"/></td>
                    </tr>
                    <tr>
                        <td class="text-left">RPL</td>
                        <td class="text-left">৩৬০ ঘন্টা</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_360_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_360_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_360_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_360_stip_fem"/></td>
                    </tr>
                    <tr>
                        <td class="text-left">RPL</td>
                        <td class="text-left">২-৩ দিন (ওরিয়েন্টেশনমূলক কোর্স) এবং এসেস্মেন্ট ১ দিন</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_days_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_days_fem"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_days_stip_tot"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.stdBasicCrsdata.rpl_days_stip_fem"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১১</span>
                </div>
                <div class="form-control bg-number-label">এসএসসি/দাখিল ভোকেশনাল এর ট্রেডভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
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

                    <tr ng-repeat="item in data.sscVocStd" ng-if="data.sscVocStd.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
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
                    <tr ng-if="data.sscVocStd.length==0">
                        <td colspan="10" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
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
                <div class="form-control bg-number-label">এইচএসসি ভোকেশনাল এর ট্রেডভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
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
                        <td colspan="2">১১শ</td>
                        <td colspan="2">১২শ</td>
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
                    <tr ng-repeat="item in data.hscVocStdData" ng-if="data.hscVocStdData.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.hscVocStdData.length==0">
                        <td colspan="10" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
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
                <div class="form-control bg-number-label">এইচএসসি(বিএম) এর স্পেশালাইজেশন ভিত্তিক শিক্ষার্থীর তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">স্পেশালাইজেশন কোড</td>
                        <td rowspan="3" style="width: 300px"> ট্রেডের নাম</td>
                        <td colspan="4"> শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">১১শ</td>
                        <td colspan="2">১২শ</td>
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
                    <tr ng-repeat="item in data.hscBmStdData" ng-if="data.hscBmStdData.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.hscBmStdData.length==0">
                        <td colspan="10" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
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
        <script src="{{ asset('js/tecStdSecondPage.js') }}" type="module" defer></script>
@stop
