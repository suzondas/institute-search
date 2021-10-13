@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="engStdFirstPage" ng-controller="myCtrl">
        <div ng-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div ng-if="dataLoaded">
            <div class="alert">

            </div>
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div ng-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;margin-bottom: 5px;">
                <h5 class="font-weight-bold">এই পাতার Observation</h5>
                <ul> <li ng-repeat="i in errorMessage">@{{ i }} </li></ul>
            </div>
            <div class="contentBox" style="border: 2px dashed green">
                <div class="row">
                    <div class="col-md-12"><h5 style="text-align: center;background:gainsboro">বিশেষ নির্দেশাবলি:</h5>
                        <ul>
                            <li>২.১ এর মোট শিক্ষার্থী সংখ্যা ছাত্রী সংখ্যা থেকে কম হতে পারেনা।</li>
                            <li>২.১ এর (স্টান্ডার্ড-৩ থেকে স্টান্ডার্ড-১২) এর মোট এবং ছাত্রী সংখ্যার সাথে ২.২ এর মোট এবং ছাত্রী সংখ্যার মিল থাকতে হবে।</li>
                        </ul>
                    </div>

                </div>
            </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১</span>
                </div>
                <div class="form-control bg-number-label"> শ্রেণিভিত্তিক শিক্ষার্থীর সংখ্যা ২০২০</div>
            </div>
            <div class="contentBoxBody col-md-10">
                <table class="table table-sm table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        {{--<td>স্তর</td>--}}
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">বিদেশী শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2" >শাখার সংখ্যা</td>
                        <td colspan="2">স্কলারশিপ/স্টাইপেন্ড/মনিটারি কন্সিডারেশন প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    </thead>
                    <tbody ng-repeat="item in data.classes">
                    <tr>
                    <td rowspan="@{{item.groups.length+1}}" style="text-align: left">@{{item.class_name_bangla}}</td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].total_student" ng-change="totalOneToTwelveFn(); totalPlayToSt2Fn(); totalSt3ToSt12Fn();"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].female_student" ng-change="totalOneToTwelveFn(); totalPlayToSt2Fn(); totalSt3ToSt12Fn();"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].foreign_tot"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].foreign_female"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].branch_amnt"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].male_scholarship"/></td>
                    <td ng-if="item.groups.length==0"><input type="number" number-converter class="w-50" ng-init="idy = findClIndex(item.class_id,item.education_level_id)" ng-model="studentSummery[idy].female_scholarship"/></td>
                    </tr>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;" ng-if="item.class_id=='9702'">
                        <td>মোট প্লে থেকে স্টান্ডার্ড-২</td>
                        <td>@{{ total_student_play_st2 }}</td>
                        <td>@{{ total_female_student_play_st2 }}</td>
                        <td colspan="7"></td>
                        {{--<td>@{{ mpo_teachers }}</td>--}}
                        {{--<td>@{{ female_mpo_teachers }}</td>--}}
                        {{--<td>@{{ blank_post_no }}</td>--}}
                        {{--<td>@{{ brance_teacher }}</td>--}}
                        {{--<td>@{{ ntrc_teacher }}</td>--}}
                    </tr>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;" ng-if="item.class_id=='9812'">
                        <td>মোট স্টান্ডার্ড-৩ থেকে স্টান্ডার্ড-১২</td>
                        <td>@{{ total_student_st3_st12 }}</td>
                        <td>@{{ total_female_student_st3_st12 }}</td>
                        <td colspan="7"></td>
                        {{--<td>@{{ mpo_teachers }}</td>--}}
                        {{--<td>@{{ female_mpo_teachers }}</td>--}}
                        {{--<td>@{{ blank_post_no }}</td>--}}
                        {{--<td>@{{ brance_teacher }}</td>--}}
                        {{--<td>@{{ ntrc_teacher }}</td>--}}
                    </tr>
                    </tbody>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                        <td>সর্বমোট</td>
                        <td>@{{ total_student_cnt }}</td>
                        <td>@{{ total_female_student_cnt }}</td>
                        <td colspan="7"></td>
                        {{--<td>@{{ mpo_teachers }}</td>--}}
                        {{--<td>@{{ female_mpo_teachers }}</td>--}}
                        {{--<td>@{{ blank_post_no }}</td>--}}
                        {{--<td>@{{ brance_teacher }}</td>--}}
                        {{--<td>@{{ ntrc_teacher }}</td>--}}
                    </tr>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২</span>
                </div>
                <div class="form-control bg-number-label">বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (০১/০১/২০২০ তারিখে বয়স)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <td>শ্রেণি</td>
                        <td colspan="2">১০ বছর</td>
                        <td colspan="2">১১ বছর</td>
                        <td colspan="2">১২ বছর</td>
                        <td colspan="2">১৩ বছর</td>
                        <td colspan="2">১৪ বছর</td>
                        <td colspan="2">১৫ বছর</td>
                    </tr>
                    <tr>
                        <th></th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                        <th>মোট</th>
                        <th>ছাত্রী</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseStudent">
                        <td ng-bind="findClassName(item.class_id)" style="text-align: left"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_total" ng-change="totalSt3ToSt12SingleFn($index)"> </td>
                        <td><input type="number" number-converter class="w-50"  ng-model="item.ten_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.thirteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                    </tr>
                    </tbody>
                </table>

                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">১৬ বছর</td>
                        <td colspan="2">১৭ বছর</td>
                        <td colspan="2">১৮ বছর</td>
                        <td colspan="2">১৯ বছর</td>
                        <td colspan="2">১৯ বছরের উপরে</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseStudent">
                        <td ng-bind="findClassName(item.class_id)" style="text-align: left"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_total" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_female" ng-change="totalSt3ToSt12SingleFn($index)"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student" disabled/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student" disabled/> </td>
                    </tr>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                        <td>মোট স্টান্ডার্ড-৩ থেকে স্টান্ডার্ড-১২</td>
                        <td colspan="10"></td>
                        <td>@{{ total_agews_student_st3_st12 }}</td>
                        <td>@{{ total_agews_female_student_st3_st12 }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/engStdFirstPage.js') }}" type="module" defer></script>
@stop
