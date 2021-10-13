@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="engTeachFirstPage" ng-controller="myCtrl">
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
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৭</span>
                </div>
                <div class="form-control bg-number-label">শিক্ষক ও কর্মচারীর সংখ্যা:
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center" style="width:50%">
                    <tr>
                        <td rowspan="2">পদবী</td>
                        <td colspan="2"> কর্মরত</td>
                        <td colspan="2"> বিদেশি শিক্ষক</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.teachStafSum">
                        <td ng-bind="desigName(item.designation_id)" style="text-align: left"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.teachers_in_service" ng-change="totalTeacherStaffGenFn();"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teachers_in_service" ng-change="totalTeacherStaffGenFn();"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.foreign_total"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.foreign_female"/></td>
                    </tr>
                    <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                        <td>সর্বমোট</td>
                        <td>@{{ teachers_in_service }}</td>
                        <td>@{{ female_teachers_in_service }}</td>
                        <td colspan="2"></td>
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
    <script src="{{ asset('js/engTeachFirstPage.js') }}"></script>
@stop
