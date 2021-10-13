@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="madStdFourthPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
        <h3 style="text-align:center">সেকশন ২: বয়সভিত্তিক এবং অভিভাবকের পেশা অনুযায়ী শিক্ষার্থী সম্পর্কিত তথ্য</h3>
            <div ng-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;margin-bottom: 5px;">
                <h5 class="font-weight-bold">এই পাতার Observation</h5>
                <ul> <li ng-repeat="i in errorMessage">@{{ i }} </li></ul>
            </div>
            <div class="contentBox" style="border: 2px dashed green">
                <div class="row">
                    <div class="col-md-12"><h5 style="text-align: center;background:gainsboro">বিশেষ নির্দেশাবলি:</h5>
                        <ul>
                            <li>২.২০ এর মোট (১ম-৫ম) এর মোট এবং ছাত্রী সংখ্যার সাথে শিক্ষার্থী-১ পাতার ২.১ এর ১ম-৫ম এর মোট এবং ছাত্রী সংখ্যার মিল থাকতে হবে।</li>
                            <li>২.২১ এর মোট (৬ষ্ঠ-১০ম) এর মোট এবং ছাত্রী সংখ্যার সাথে শিক্ষার্থী-১ পাতার ২.১ এর ৬ষ্ঠ-১০ম এর মোট এবং ছাত্রী সংখ্যার মিল থাকতে হবে।</li>
                            <li>২.২২ এর আলিম- সর্বোচ্চ স্তরের এর মোট এবং ছাত্রী সংখ্যার সাথে শিক্ষার্থী-১ পাতার ২.১ এর (১১শ-১২শ), ফাজিল(পাস), ফাজিল(সম্মান), কামিল এবং মাস্টার্স এর মোট এবং ছাত্রী সংখ্যার মিল থাকতে হবে।</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২০</span>
                </div>
                <div class="form-control bg-number-label">এবতেদায়ী স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (০১/০১/২০২০
                    তারিখে বয়স)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">৫ বছর</td>
                        <td colspan="2">৬ বছর</td>
                        <td colspan="2">৭ বছর</td>
                        <td colspan="2">৮ বছর</td>
                        <td colspan="2">৯ বছর</td>
                        <td colspan="2">১০ বছর</td>
                        <td colspan="2">১১ বছর</td>
                        <td colspan="2">১২ বছর</td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseEbtStudentData track by $index">
                        <td ng-bind="findEbtClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.five_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50"  ng-model="item.five_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female" ng-change="totalOneToFiveSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student" disabled/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student" disabled/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২১</span>
                </div>
                <div class="form-control bg-number-label">দাখিল স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (০১/০১/২০২০
                    তারিখে বয়স)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">১০ বছর</td>
                        <td colspan="2">১১ বছর</td>
                        <td colspan="2">১২ বছর</td>
                        <td colspan="2">১৩ বছর</td>
                        <td colspan="2">১৪ বছর</td>
                        <td colspan="2">১৫ বছর</td>
                        <td colspan="2">১৬ বছর</td>
                        <td colspan="2">১৭ বছর</td>
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
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseSecStudentData">
                        <td ng-bind="findClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50"  ng-model="item.ten_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female" ng-change="totalSixToTenSingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student" disabled/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student" disabled/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২২</span>
                </div>
                <div class="form-control bg-number-label">আলিম- সর্বোচ্চ স্তরে বয়সভিত্তিক শিক্ষার্থীর সংখ্যা
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
                    <td colspan="2">২০ বছর</td>
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
                <tr ng-repeat="item in data.ageWiseStudent">
                    <td style="text-align: left" ng-bind="findColClassName(item.class_id)"></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.under_fifteen_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.under_fifteen_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twenty_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.twenty_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_total" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.upper_twentyone_female" ng-change="totalAlimToMasSingleFn($index)"/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.total_student" disabled/> </td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.female_student" disabled/> </td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৩</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী দাখিল স্তরে শিক্ষার্থী সংখ্যা
                    (৬ষ্ঠ-১০ম):
                </div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">অভিভাবকের পেশা</td>
                        <td colspan="5">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>৬ষ্ঠ শ্রেণি</td>
                        <td>৭ম শ্রেণি</td>
                        <td>৮ম শ্রেণি</td>
                        <td>৯ম শ্রেণি</td>
                        <td>১০ম শ্রেণি</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.guardianOccupation">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="occupationName(item.occupation_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৪</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী আলিম ও তদুর্ধ্ব স্তরে
                    শিক্ষার্থীর সংখ্যা:
                </div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">অভিভাবকের পেশা</td>
                        <td colspan="5">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>আলিম</td>
                        <td>ফাজিল(পাস)</td>
                        <td>ফাজিল(সম্মান)</td>
                        <td>কামিল</td>
                        <td>কারিগরি শাখা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.guardianOccupation">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="occupationName(item.occupation_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_somman"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.voc"/></td>
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
    <script src="{{ asset('js/madStdFourthPage.js') }}" type="module" defer></script>
@stop
