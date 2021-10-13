@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdThirdPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৪</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন কমার্স এর স্পেশালাইজেশন ভিত্তিক শিক্ষার্থীর তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">ট্রেড কোড</td>
                        <td rowspan="3">ট্রেডের নাম</td>
                        <td colspan="4">শ্রেণী</td>
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
                    <tr ng-repeat="item in data.dipCommerceStd" ng-if="data.dipCommerceStd.length!=0">
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
                    <tr ng-if="data.dipCommerceStd.length==0">
                        <td colspan="10" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৫</span>
                </div>
                <div class="form-control bg-number-label">ডিপ্লোমা ইন ইঞ্জিনিয়ারিং, হেলথ টেকনোলজি, টেক্সটাইল ইঞ্জিনিয়ারিং, এগ্রিকালচার, ফিসারিজ ও সমমান এর টেকনোলজি ভিত্তিক শিক্ষার্থীর তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">ট্রেড কোড</td>
                        <td rowspan="3">ট্রেডের নাম</td>
                        <td colspan="16">শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                    </tr>
                    <tr>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.dipEnHlStd" ng-if="data.dipEnHlStd.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.frst_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.frst_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sec_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sec_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thrd_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thrd_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.frth_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.frth_sem_female">
                        <td><input type="number" number-converter class="w-50" ng-model="item.fif_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fif_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_sem_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_sem_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.dipEnHlStd.length==0">
                        <td colspan="22" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৬</span>
                </div>
                <div class="form-control bg-number-label">সার্টিফিকেট কোর্স(৬ মাস/১ বছর/২ বছর মেয়াদী)ট্রেডভিত্তিক শিক্ষার্থীর তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">ট্রেড কোড</td>
                        <td rowspan="3">ট্রেডের নাম</td>
                        <td colspan="6">কোর্সের মেয়াদ</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">৬ মাস</td>
                        <td colspan="2">১ বছর</td>
                        <td colspan="2">২ বছর</td>
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
                    <tr ng-repeat="item in data.dipCertStd" ng-if="data.dipCertStd.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_6motn_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_6motn_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_1yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_1yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_2yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_2yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.dipCertStd.length==0">
                        <td colspan="12" style="color: red">প্রথম পাতায় সংশ্লিষ্ট্য কারিকুলাম সিলেক্ট করুন এবং উক্ত পাতার save বাটন এ ক্লিক করুন</td>
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

    <script src="{{ asset('js/tecStdThirdPage.js') }}" type="module" defer></script>

@stop
