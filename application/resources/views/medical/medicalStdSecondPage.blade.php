@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="medicalStdSecondPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২.২: শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
                <div ng-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;margin-bottom: 5px;">
                    <h5 class="font-weight-bold">এই পাতার Observation</h5>
                    <ul> <li ng-repeat="i in errorMessage">@{{ i }} </li></ul>
                </div>
                <div class="contentBox" style="border: 2px dashed green">
                    <div class="row">
                        <div class="col-md-12"><h5 style="text-align: center;background:gainsboro">বিশেষ নির্দেশাবলি:</h5>
                            <ul>
                                <li>২.২.১ এর কর্মরত মহিলা সংখ্যা থেকে কর্মরত মোট সংখ্যা কম হতে পারে না।</li>
                            </ul>
                        </div>

            </div>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২.১</span>
                </div>
                <div class="form-control bg-number-label">পদবীভিত্তিক শিক্ষক ও কর্মচারীর সংখ্যা:
                </div>
            </div>
        <div class="contentBoxBody">
            <table class="table table-bordered table-striped text-center">
                <tr>
                <td rowspan="3">কোড</td>
                <td rowspan="3">পদবী</td>
                <td colspan="5">কর্মরত শিক্ষক/কর্মচারী</td>
                </tr>
                <tr>
                <td>বর্তমানে</td>
                <td colspan="2">পূর্ণকালীন</td>
                <td colspan="2">খন্ডকালীন</td>
                </tr>
                <tr>
                <td></td>
                <td>মোট</td>
                <td>মহিলা</td>
                <td>মোট</td>
                <td>মহিলা</td>
                </tr>
                <tbody>
                <tr ng-repeat="item in data.teachStafSum">
                    <td ng-bind="item.designation_id"></td>
                    <td ng-bind="desigName(item.designation_id)"></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.total_present"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.permanent_total"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.permanent_female"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.part_time_total"/></td>
                    <td><input type="number" number-converter class="w-50" ng-model="item.part_time_female"/></td>
                </tr>
                </tbody>
            </table>
        </div>
        </div>
        {{--Special Training Info --}}
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২.২</span>
                </div>
                <div class="form-control bg-number-label">বিশেষ প্রশিক্ষণের তথ্য
                </div>
            </div>
            <div class="contentBoxBody">
                <table>
                    <tr>
                        <td class="font-weight-bold">২.২.৩ শিক্ষকদের কোন কোন বিষয়ে প্রশিক্ষণ প্রয়োজন?</td>
                        <td>১.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required1"/></td>
                        <td>২.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required2"/></td>
                        <td>৩.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required3"/></td>
                        <td>৪.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required4"/></td>
                    </tr>
                    <tr>
                        <td>
                            <label>২.২.৪ প্রতিবন্ধি/অটিস্টিক শিক্ষার্থীর জন্য গাইড শিক্ষক আছে কি?</label>
                            <select class="" ng-model="data.teacherTrainInfo.autism_guide_teacher_yn">
                                <option value="1">হ্যাঁ</option>
                                <option value="2">না</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row  contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২.৫</span>
                </div>
                <div class="form-control bg-number-label">সর্বোচ্চ শিক্ষাগত যোগ্যতা ভিত্তিক শিক্ষক সংখ্যা:</div>
            </div>
            <div class="col-md-4 contentBoxBody">
                <table class="table table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                        <td colspan="2">শিক্ষক সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.teachQualiSum">
                        <td ng-bind="qualiName(item.quli_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                    </tr>
                    </tbody>
                </table>
                <label> বিঃদ্রঃ শুধুমাত্র পূর্ণকালীন শিক্ষকগনের তথ্য দিন</label>
            </div>
        </div>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২.৬</span>
                </div>
                <div class="form-control bg-number-label">অবসর গ্রহণ সম্পর্কিত
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-bordered table-striped ">
                    <tr>
                        <td rowspan="2" style="width:450px">বিবরণ</td>
                        <td colspan="2"> শিক্ষকের সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td style="width: 300px">১/৭/২০১৯-৩০/৬/২০২০ পযন্ত অবসরে গিয়েছেন এমন শিক্ষকের সংখ্যা:</td>
                        <td><input type="number" number-converter class="form-control w-25"ng-model="data.teacherRetAwInfo.retired_teacher_total" id=""></td>
                        <td><input type="number" number-converter class="form-control w-25"ng-model="data.teacherRetAwInfo.rerired_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td style="width: 300px"> ১/৭/২০১৯-৩০/৬/২০২০ পযন্ত অবসরে যাবেন এমন শিক্ষক সংখ্যা:  </td>
                        <td><input type="number" number-converter class="form-control w-25"ng-model="data.teacherRetAwInfo.retiredfu_teacher_total" id=""></td>
                        <td><input type="number" number-converter class="form-control w-25"ng-model="data.teacherRetAwInfo.reriredfu_teacher_female" id=""></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center"><button ng-click="submitData()" type="button" class="btn btn-success">Save and Next</button>
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/medicalStdSecondPage.js') }}" type="module" defer></script>
@stop
