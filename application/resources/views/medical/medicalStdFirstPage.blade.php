@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="medicalStdFirstPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২.১: শিক্ষার্থী সম্পর্কিত তথ্য</h3>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১.১</span>
                </div>
                <div class="form-control bg-number-label"> শিক্ষার্থীর সংখ্যা ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">বিবরণ</td>
                        <td rowspan="2">আসন সংখ্যা</td>
                        <td colspan="2">ছাত্র-ছাত্রী সংখ্যা</td>
                        <td colspan="2">গড় উপস্থিতি (১৫ জুলাই 2021)</td>
                        <td rowspan="2">রিপিটার</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>এম.বি.বি.এস.</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_seat" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_std_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_std_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_att_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_att_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.mbbs_repeater" ></td>
                    </tr>
                    <tr>
                        <td>বি.ডি.এস</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_seat" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_std_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_std_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_att_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_att_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.bds_repeater" ></td>
                    </tr>
                    <tr>
                        <td>অন্যান্য</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_seat" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_std_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_std_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_att_total" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_att_female" ></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalSubStdSum.other_repeater" ></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১.২</span>
                </div>
                <div class="form-control bg-number-label">এম.বি.বি.এস./বি.ডি.এস‘র বর্ষ ভিত্তিক শিক্ষার্থী সম্পর্কিত তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">বর্ষ</td>
                        <td colspan="2">ছাত্র-ছাত্রী সংখ্যা</td>
                        <td colspan="2">গড় উপস্থিতি (১৫ জুলাই 2021)</td>
                        <td rowspan="2">রিপিটার</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>১ম</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.first_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.first_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.first_yr_att_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.first_yr_att_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.first_yr_repeater"></td>
                    </tr>
                    <tr>
                        <td>২য়</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.second_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.second_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.second_yr_att_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.second_yr_att_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.second_yr_repeater"></td>
                    </tr>
                    <tr>
                        <td>৩য়</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.third_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.third_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.third_yr_att_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.third_yr_att_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.third_yr_repeater"></td>
                    </tr>
                    <tr>
                        <td>৪র্থ</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fourth_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fourth_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fourth_yr_att_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fourth_yr_att_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fourth_yr_repeater"></td>
                    </tr>
                    <tr>
                        <td>৫ম</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fifth_yr_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fifth_yr_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fifth_yr_att_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fifth_yr_att_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.fifth_yr_repeater"></td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.total_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.total_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.total_std_att"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.total_female_att"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.medicalStdSum.total_repeater"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number"> ২.১.৩</span>
                </div>
                <div class="form-control bg-number-label">প্রতিবন্ধী ও অটিজম এর ধরন অনুযায়ী শিক্ষার্থীর সংখ্যা ২০২1</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">প্র্রতিবন্ধীর ধরন</td>
                        <td colspan="2">এমবিবিএস</td>
                        <td colspan="2">বিডিএস</td>
                        <td colspan="2">মোট</td>
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
                    <tr ng-repeat="item in data.categoryWiseDisableStudent">
                        <td ng-bind="$index+1"></td>
                        <td ng-bind="catDisStdName(item.disable_type)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.mbbs_disable_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.mbbs_disable_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bds_disable_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.bds_disable_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_disable_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_disable_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <div align="center">
            <button ng-click="submitData()" type="button" class="btn btn-success">Save and Next</button>
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/medicalStdFirstPage.js') }}" type="module" defer></script>
@stop
