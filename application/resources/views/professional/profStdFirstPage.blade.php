@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="profStdFirstPage" ng-controller="myCtrl">
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
                            <li>২.১ এর ১ম বর্ষ মোট সংখ্যা 0 হতে পারে না।</li>
                            <li>২.১ এর ১ম বর্ষ ছাত্রী সংখ্যা থেকে মোট সংখ্যা কম হতে পারে না।</li>
                        </ul>
                    </div>

                </div>
            </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১</span>
                </div>
                <div class="form-control bg-number-label">স্নাতক, স্নাতক (সম্মান) ও তদুর্ধ্ব কোর্সে অধ্যয়নরত শিক্ষার্থী (প্রযোজ্য ক্ষেত্রে তথ্য দিন):</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3"> কোড</td>
                        <td rowspan="3" style="width: 300px">বিষয়/বিভাগ</td>
                        <td colspan="10">ডিপ্লোমা/স্নাতক/স্নাতক সম্মান শিক্ষার্থী</td>
                        <td rowspan="2" colspan="2">স্নাতকোত্তর/ডিপ্লোমা শিক্ষার্থী</td>
                        <td rowspan="2" colspan="2">মোট রিপিটার শিক্ষার্থী</td>
                    </tr>
                    <tr>
                        <td colspan="2">১ম বর্ষ</td>
                        <td colspan="2">২য় বর্ষ</td>
                        <td colspan="2">৩য় বর্ষ</td>
                        <td colspan="2">৪র্থ বর্ষ</td>
                        <td colspan="2">৫ম বর্ষ</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.profStdSum">
                        <td>@{{ item.subject_id }}</td>
                        <td ng-bind="profSubjectName(item.subject_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.first_yr_tot" ng-change="totalYrStdFn();"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.first_yr_fem" ng-change="totalYrStdFn();"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.second_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.second_yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.third_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.third_yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourth_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourth_yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifth_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifth_yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.repeater_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.repeater_fem"></td>
                    </tr>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                        <td colspan="2">সর্বমোট</td>
                        <td>@{{ first_yr_tot }}</td>
                        <td>@{{ first_yr_fem }}</td>
                        <td colspan="12"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২</span>
                </div>
                <div class="form-control bg-number-label">সার্টিফিকেট কোর্সে অধ্যয়নরত শিক্ষার্থীর তথ্য-২০২০ </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">বিষয় কোড</td>
                        <td rowspan="3" style="width: 300px">ধরণ</td>
                        <td colspan="4">শিক্ষার্থী</td>
                    </tr>
                    <tr>
                        <td colspan="2">সার্টিফিকেট কোর্স ( ১ বছরের কম মেয়াদী)</td>
                        <td colspan="2">সার্টিফিকেট কোর্স ( ১ বছর মেয়াদী)</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.certificateStudent">
                        <td>@{{ item.subject_id }}</td>
                        <td ng-bind="profSubjectName(item.subject_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.under_one_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.under_one_yr_fem"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.one_yr_tot"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.one_yr_fem"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/profStdFirstPage.js') }}" type="module" defer></script>
@stop
