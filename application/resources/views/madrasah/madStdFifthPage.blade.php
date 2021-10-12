@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="madStdFifthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৫</span>
                </div>
                <div class="form-control bg-number-label">বিষয়ভিত্তিক পাঠদানের তথ্য:</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td scope="col" rowspan="3">বিষয়</td>
                        <td scope="col" colspan="2" rowspan="2">শিক্ষক (বিষয় ভিত্তিক)</td>
                        <td scope="col" colspan="12">শিক্ষার্থী সংখ্যা</td>
                    </tr>
                    <tr>
                        <td scope="col" colspan="2">দাখিল (৬ষ্ঠ-১০ম)</td>
                        <td scope="col" colspan="2">আলিম (১১-১২)</td>
                        <td scope="col" colspan="2">ফাজিল (পাস)</td>
                        <td scope="col" colspan="2">ফাজিল (সম্মান)</td>
                        <td scope="col" colspan="2">কামিল/স্নাতকোত্তর</td>
                    </tr>
                    <tr>
                        <td scope="col">মোট</td>
                        <td scope="col">মহিলা</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                        <td scope="col">মোট</td>
                        <td scope="col">ছাত্রী</td>
                    </tr>
                    <tbody>
                    <tbody>
                    <tr ng-repeat="item in data.subjectWiseData">
                        <td class="text-left" ng-bind="subjectName(item.subject_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dakhil"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.dakhil_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.alim"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.alim_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fazil_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fazil_pass_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fazil_somman"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fazil_somman_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.kamil"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.kamil_female"></td>
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
    <script src="{{ asset('js/madStdFifthPage.js') }}" type="module" defer></script>
@stop
