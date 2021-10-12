@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdSixthPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৬</span>
                </div>
                <div class="form-control bg-number-label">অভিভাবকের পেশা অনুযায়ী শিক্ষার্থী সংখ্যা</div>
            </div>
            <div class="contentBoxBody col-md-8">
                <table class="table table-sm table-bordered table-striped text-center">

                    <tr>
                        <td rowspan="2">ক্র. নং</td>
                        <td rowspan="2">অভিভাবকের পেশা</td>
                        <td colspan="5">শিক্ষার্থীর সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>৯ম শ্রেণি</td>
                        <td>১০ম শ্রেণি</td>
                        <td>উচ্চ মাধ্যমিক</td>
                        <td>ডিপ্লোমা</td>
                    </tr>
                    </tdead>
                    <tbody>
                    <tr ng-repeat="item in data.guardianOccupation">
                        <td ng-bind="$index+1"></td>
                        <td class="text-left" ng-bind="occupationName(item.occupation_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.hsc"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.voc"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৭</span>
                </div>
                <div class="form-control bg-number-label">বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (ক) (০১/০১/২০২০
                    তারিখে বয়স)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td>শ্রেণি</td>
                        <td colspan="2">১৪ বছর</td>
                        <td colspan="2">১৫ বছর</td>
                        <td colspan="2">১৬ বছর</td>
                        <td colspan="2">১৭ বছর</td>
                        <td colspan="2">১৮ বছর</td>
                        <td colspan="2">১৯ বছর</td>
                        <td colspan="2">২০ বছর</td>
                        <td colspan="2">২১ বছর</td>
                    </tr>
                    <tr>
                        <td></td>
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
                        <td class="text-left" ng-bind="findClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fourteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.fifteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.sixteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seventeen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eighteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nineteen_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twenty_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyone_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyone_female"/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            </div>
        <br>
        <div class="contentBox">
        <div class="input-group contentdeader">
            <div class="input-group-prepend">
                <span class="input-group-text bg-number">২.২৮</span>
            </div>
            <div class="form-control bg-number-label">বয়সভিত্তিক শিক্ষার্থীর সংখ্যা (খ) (০১/০১/২০২০
                তারিখে বয়স)
            </div>
        </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">২২ বছর</td>
                        <td colspan="2">২৩ বছর</td>
                        <td colspan="2">২৪ বছর</td>
                        <td colspan="2">২৫ বছর</td>
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
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.ageWiseStudent">
                        <td class="text-left" ng-bind="findClassName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentytwo_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentytwo_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentythree_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentythree_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyfour_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyfour_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyfive_total"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twentyfive_female"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student"/> </td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student"/> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.২৯</span>
                </div>
                <div class="form-control bg-number-label"> Entrepreneurship বিষয়ে শিক্ষা প্রদান সংক্রান্ত তথ্য (বয়সভিত্তিক) ২০২০ </div>
            </div>
            <div class="col-md-6 contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <thead>
                    <tr>
                        <th colspan="2">Entrepreneurship বিষয়ে শিক্ষা</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>Youth(15-24 years)</td>
                        <td>Adult(25+)</td>
                    </tr>
                    <tr>
                        <td><input type="number" number-converter class="w-50" ng-model="data.enterprenerData.en_15_24_tot">
                        </td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.enterprenerData.en_25_plus_tot">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row contentBox">

            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩০</span>
                </div>
                <div class="form-control bg-number-label">উন্মুক্ত বিশ্ববিদ্যালয়ের শিক্ষা প্রোগ্রাম </div>
            </div>
            <div class="col-md-2">
                <label class="label-number" >২.৩০.১ আপনার প্রতিষ্ঠানে উন্মুক্ত বিশ্ববিদ্যালয়ের শিক্ষা প্রোগ্রাম
                    পরিচালিত হয় কি?</label>
                <select class="" name="" style="width: 75px" ng-model="data.instOtherInfo.open_unvi_course_yn">
                    <option value="" selected>Select</option>
                    <option value="1">হ্যাঁ-১</option>
                    <option value="2">না-২</option>
                </select>
            </div>
            <div class="col-md-10">
                <label class="label-number font-weight-bold" >২.৩০.২ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক শিক্ষার্থীর তথ্য নিম্নের ছক
                    মোতাবেক প্রদান করুন</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="3">ভর্তির বছর</td>
                        <td colspan="4"> এইচএসসি প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতক (পাস) প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতক (সম্মান) প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতকোত্তর প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">অন্যান্য প্রোগ্রাম</td>
                    </tr>
                    <tr>
                        <td colspan="2">একাদশ শ্রেণি</td>
                        <td colspan="2">দ্বাদশ শ্রেণি</td>
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
                    <tr ng-repeat="item in data.openUnStd">
                        <td>@{{ item.admit_year }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <label class="label-number font-weight-bold">২.৩০.৩ উত্তর হ্যাঁ হলে প্রোগ্রাম ভিত্তিক ফলাফল নিম্নের ছক মোতাবেক
                    প্রদান করুন</label>
                <table class="table table-bordered table-sm table-striped text-center">
                    <tr>
                        <td rowspan="3" colspan="2">ভর্তির বছর</td>
                        <td colspan="4"> এইচএসসি প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতক (পাস) প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতক (সম্মান) প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">স্নাতকোত্তর প্রোগ্রাম</td>
                        <td rowspan="2" colspan="2">অন্যান্য প্রোগ্রাম</td>
                    </tr>
                    <tr>
                        <td colspan="2">একাদশ শ্রেণি</td>
                        <td colspan="2">দ্বাদশ শ্রেণি</td>
                    </tr>
                    <tr>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                        <td>পরিক্ষার্থী</td>
                        <td>পাশের সংখ্যা</td>
                    </tr>
                    <tbody ng-repeat="item in data.openUnRes">
                    <tr>
                        <td rowspan="2">@{{ item.year }}</td>
                        <td>মোট</td>
                        <td><input type="number" number-converter class="w-50" string-to-number ng-model="item.eleven_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_p_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_p_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others_pass"></td>
                    </tr>
                    <tr>
                        <td>ছাত্রী</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_fem_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eleven_fem_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_fem_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.twelve_fem_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_p_fem_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_p_fem_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_fem_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.honours_fem_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_fem_std"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.masters_fem_pass"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others_female"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.others_fem_pass"></td>
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

        <script src="{{ asset('js/tecStdSixthPage.js') }}" type="module" defer></script>
@stop
