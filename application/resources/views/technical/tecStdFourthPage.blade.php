@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdFourthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>

        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১৭</span>
                </div>
                <div class="form-control bg-number-label">জাতীয় দক্ষতামান(১ বছর মেয়াদী) ট্রেডভিত্তিক শিক্ষার্থীর তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">ট্রেড কোড</td>
                        <td rowspan="3">ট্রেডের নাম</td>
                        <td colspan="2">কোর্সের মেয়াদ</td>
                        <td rowspan="2" colspan="2"> পরীক্ষার্থীর সংখ্যা (২০২০)</td>
                        <td rowspan="2" colspan="2"> পাসের সংখ্যা (২০২০)</td>
                    </tr>
                    <tr>
                        <td colspan="2">১ বছর মেয়াদী</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.natSkillStd" ng-if="data.natSkillStd.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.one_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.one_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.natSkillStd.length==0">
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
                    <span class="input-group-text bg-number">২.১৮</span>
                </div>
                <div class="form-control bg-number-label">বেসিক ট্রেডকোর্সে ট্রেডভিত্তিক শিক্ষার্থীর তথ্য ২০২০
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
                        <td colspan="2">৩ মাস(৩৬০ ঘন্টা)</td>
                        <td colspan="2">৬ মাস(৩৬০ ঘন্টা)</td>
                        <td colspan="2">১ বছর</td>
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
                    <tr ng-repeat="item in data.dipBasTradeStd" ng-if="data.dipBasTradeStd.length!=0">
                        <td class="text-left">@{{ item.trade_code }}</td>
                        <td class="text-left">@{{ item.trade_name }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_3motn_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_3motn_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_6motn_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_6motn_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_1yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bas_1yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_candidate"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.girls_pass"></td>
                    </tr>
                    <tr ng-if="data.dipBasTradeStd.length==0">
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

    <script src="{{ asset('js/tecStdFourthPage.js') }}" type="module" defer></script>

@stop
