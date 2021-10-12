@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdSeventhPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div ng-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;margin-bottom: 5px;">
            <h5 class="font-weight-bold">এই পাতার Observation</h5>
            <ul> <li ng-repeat="i in errorMessage">@{{ i }} </li></ul>
        </div>
        <div class="contentBox" style="border: 2px dashed green">
            <div class="row">
                <div class="col-md-12"><h5 style="text-align: center;background:gainsboro">বিশেষ নির্দেশাবলি:</h5>
                    <ul>
                        <li>২.৩২ এর কর্মরত মহিলা সংখ্যা থেকে কর্মরত মোট সংখ্যা কম হতে পারে না।</li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩১</span>
                </div>
                <div class="form-control bg-number-label">বিভাগভিত্তিক বিভিন্ন বোর্ড পরীক্ষার ফলাফল:</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">পরীক্ষার নাম ও বছর</td>
                        <td scope="col" rowspan="3">বিভাগ</td>
                        <td scope="col" rowspan="2" colspan="2">রেজি: শিক্ষার্থী সংখ্যা</td>
                        <td scope="col" rowspan="2" colspan="2">পরিক্ষার্থীর সংখ্যা</td>
                        <td scope="col" colspan="12">প্রাপ্ত জিপিএ অনুযায়ী পাসের সংখ্যা</td>
                        <td scope="col" rowspan="2" colspan="2">মোট পাস</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="6">ছাত্র</td>
                        <td scope="col" colspan="6">ছাত্রী</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">৫.০০</td>
                        <td scope="col">৪- ৪.৯৯</td>
                        <td scope="col">৩.৫- ৩.৯৯</td>
                        <td scope="col">৩- ৩.৫</td>
                        <td scope="col">২- ২.৯৯</td>
                        <td scope="col">২ এর কম</td>
                        <td scope="col">৫.০০</td>
                        <td scope="col">৪- ৪.৯৯</td>
                        <td scope="col">৩.৫- ৩.৯৯</td>
                        <td scope="col">৩- ৩.৫</td>
                        <td scope="col">২- ২.৯৯</td>
                        <td scope="col">২ এর কম</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                    </tr>
                    <tbody ng-repeat="item in data.examLevel">
                    <td rowspan="@{{item.exam.length+1}}">@{{item.level}}</td>
                    <tr ng-repeat="i in item.exam">
                        <td class="text-left">@{{i.name}}</td>
                        <td><input class="w-50" type="number" number-converter ng-init="idx = findIndexEx(i.exam_id,i.subject)" ng-model="boardWiseExamResults[idx].registered_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].registerd_female"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].total_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].female_candidate"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_plus_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_plus_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_minus_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].a_minus_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].b_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].b_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].c_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].c_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].d_total"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].d_girls"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].total_pass"/></td>
                        <td><input class="w-50" type="number" number-converter ng-model="boardWiseExamResults[idx].girls_pass"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩২</span>
                </div>
                <div class="form-control bg-number-label">পদবীভিত্তিক কর্মরত ও এমপিওভুক্ত শিক্ষক ও কর্মচারীর সংখ্যা:
                </div>
            </div>
        <div class="contentBoxBody col-md-11">
            <table class="table table-sm table-bordered table-striped text-center">
                <tr>
                    <td rowspan="2">পদবী</td>
                    <td colspan="2"> কর্মরত</td>
                    <td colspan="2"> এমপিওভুক্ত (প্রযোজ্য ক্ষেত্রে)</td>
                    <td rowspan="2">শূন্য পদের সংখ্যা</td>
                    <td rowspan="2">শাখা শিক্ষক (কর্মরততেও অন্তর্ভূক্ত থাকবে)</td>
                    <td rowspan="2">খন্ডকালীন শিক্ষক সংখ্যা</td>
                    <td rowspan="2">নিবন্ধনকৃত শিক্ষক সংখ্যা (NTRCA) (প্রযোজ্য ক্ষেত্রে)</td>
                    <td rowspan="2">NTRCA কর্তৃক পূরণযোগ্য শূন্য পদের সংখ্যা</td>
                </tr>
                <tr>
                    <td>মোট</td>
                    <td>মহিলা</td>
                    <td>মোট</td>
                    <td>মহিলা</td>
                </tr>
                <tbody>
                <tr ng-repeat="item in data.teachStafSum">
                    <td class="text-left" ng-bind="desigName(item.designation_id)"></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.teachers_in_service" ng-change="totalTeacherStaffGenFn();"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.female_teachers_in_service" ng-change="totalTeacherStaffGenFn();"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.mpo_teachers"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.female_mpo_teachers"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.blank_post_no"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.brance_teacher"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.ntrc_teacher"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.parttime_teacher"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.ntrc_blank_post"/></td>
                </tr>
                <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                    <td>মোট</td>
                    <td>@{{ teachers_in_service }}</td>
                    <td>@{{ female_teachers_in_service }}</td>
                    <td colspan="7"></td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div align="center"><button ng-click="submitData()" type="button" class="btn btn-success">Save and Next</button>
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button> </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/tecStdSeventhPage.js') }}" type="module" defer></script>
@stop
