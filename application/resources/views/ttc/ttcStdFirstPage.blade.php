@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="ttcStdFirstPage" ng-controller="myCtrl">
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
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১</span>
                    </div>
                    <div class="form-control bg-number-label"> প্রশিক্ষণ/ডিগ্রি ভিত্তিক শিক্ষার্থীর সংখ্যা-২০২০
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="2">প্রশিক্ষণ/ডিগ্রী</td>
                            <td rowspan="2">আসন সংখ্যা</td>
                            <td colspan="2">ছাত্র-ছাত্রী/প্রশিক্ষণার্থীর সংখ্যা</td>
                            <td colspan="2">গড় উপস্থিত <br>(১ মার্চ ২০২০)</td>
                            <td colspan="2">রিপিটার</td>
                            <td colspan="2">ড্রপ আউট</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                            <td>ছাত্র</td>
                            <td>ছাত্রী</td>
                        </tr>
                        <tbody>
                        <tr ng-repeat="item in data.ttc_trainee_summaries">
                            <td class="text-left" ng-bind="className(item.class_id)"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.seat"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_trainee" ng-change="totalYrStdFn()"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_trainee" ng-change="totalYrStdFn()"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_present"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_present"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_rep"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_rep"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.total_drop"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="item.female_drop"></td>
                        </tr>
                        <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td colspan="2">সর্বমোট</td>
                            <td>@{{ total_trainee }}</td>
                            <td>@{{ female_trainee }}</td>
                            <td colspan="6"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২</span>
                    </div>
                    <div class="form-control bg-number-label">বি.এড (অনার্স) শ্রেণির শিক্ষার্থী সম্পর্কিত তথ্য ২০২০
                    </div>
                </div>
                <div class="contentBoxBody col-md-8">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            <td rowspan="2">বর্ষ</td>
                            <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                            <td colspan="2">উপস্থিত (সর্বশেষ কার্যদিবস)</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                        </tr>
                        <tr ng-repeat="item in data.bed_trainee_summaries">
                            <td ng-bind="bedClassName(item.class_id)"></td>
                            <td><input type="number" number-converter class="w-50" class="w-50" ng-model="item.total_student"/></td>
                            <td><input type="number" number-converter class="w-50" class="w-50" ng-model="item.female_student"/></td>
                            <td><input type="number" number-converter class="w-50" class="w-50" ng-model="item.total_present"/></td>
                            <td><input type="number" number-converter class="w-50" class="w-50" ng-model="item.female_present"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৩</span>
                    </div>
                    <div class="form-control bg-number-label">উন্মুক্ত বিশ্ববিদ্যালয়ের শিক্ষা প্রোগ্রাম</div>
                </div>
                <div class="contentBoxBody">
                    <label class="label-number font-weight-bold">২.৩.১ আপনার প্রতিষ্ঠানে উন্মুক্ত বিশ্ববিদ্যালয়ের
                        শিক্ষা প্রোগ্রাম
                        পরিচালিত হয় কি?</label>
                    <select name="" style="width: 75px"
                            ng-model="data.instOtherInfo.open_unvi_course_yn">
                        <option value="" selected>Select</option>
                        <option value="1">হ্যাঁ-১</option>
                        <option value="2">না-২</option>
                    </select>
                    <div class="row" ng-if="data.instOtherInfo.open_unvi_course_yn==1">
                        <div class="col-md-6">
                            <label class="label-number font-weight-bold">২.৩.২ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক
                                শিক্ষার্থীর
                                তথ্য নিম্নের
                                ছক মোতাবেক প্রদান করুন</label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr class="custom-table-header">
                                    <td rowspan="3">ভর্তির বছর</td>
                                    <td colspan="4"> এসএসসি প্রোগ্রাম</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td colspan="2">৯ম শ্রেণি</td>
                                    <td colspan="2">১০ম শ্রেণি</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>মোট</td>
                                    <td>ছাত্রী</td>
                                    <td>মোট</td>
                                    <td>ছাত্রী</td>
                                </tr>
                                <tbody>
                                <tr ng-repeat="item in data.openUnStd">
                                    <td>@{{ item.admit_year }}</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_total">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_female">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_total">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_female">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label class="label-number font-weight-bold">২.৩.৩ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক ফলাফল
                                নিম্নের
                                ছক মোতাবেক
                                প্রদান করুন</label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr class="custom-table-header">
                                    <td rowspan="3" colspan="2" style="width:250px">ভর্তির বছর</td>
                                    <td colspan="4"> এসএসসি প্রোগ্রাম</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td colspan="2">৯ম শ্রেণি</td>
                                    <td colspan="2">১০ম শ্রেণি</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>পরিক্ষার্থী</td>
                                    <td>পাশের সংখ্যা</td>
                                    <td>পরিক্ষার্থী</td>
                                    <td>পাশের সংখ্যা</td>
                                </tr>
                                <tbody ng-repeat="item in data.openUnRes">
                                <tr>
                                    <td rowspan="2">@{{ item.year }}</td>
                                    <td>মোট</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_std">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_pass">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_std"></td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_pass">
                                    </td>
                                </tr>
                                <tr>
                                    <td>ছাত্রী</td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.nine_female">
                                    </td>
                                    <td><input type="number" number-converter class="w-50"
                                               ng-model="item.nine_fem_pass">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_fem_std">
                                    </td>
                                    <td><input type="number" number-converter class="w-50" ng-model="item.ten_fem_pass">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/ttcStdFirstPage.js') }}" type="module" defer></script>
@stop
