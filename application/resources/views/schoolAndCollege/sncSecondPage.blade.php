@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="sncSecondPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div class="contentBox col-12">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৭</span>
                </div>
                <div class="form-control bg-number-label">সেকশনভিত্তিক শিক্ষার্থীর তথ্য ২০২০ (সেকশন না থাকলে পূরণ
                    করা প্রযোজ্য নয়)
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">সেকশন</td>
                        <td rowspan="2">৬ষ্ঠ শ্রেণি</td>
                        <td rowspan="2">৭ম শ্রেণি</td>
                        <td rowspan="2">৮ম শ্রেণি</td>
                        <td colspan="3">৯ম শ্রেণি</td>
                        <td colspan="3">১০ম শ্রেণি</td>
                    </tr>
                    <tr>
                        <td>বিজ্ঞান</td>
                        <td>মানবিক</td>
                        <td>ব্যবসায় শিক্ষা</td>
                        <td>বিজ্ঞান</td>
                        <td>মানবিক</td>
                        <td>ব্যবসায় শিক্ষা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.secWsStd">
                        <td>@{{ item.section_id }}</td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.six"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.seven"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.eight"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_science"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_arts"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.nine_commerce"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_science"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_arts"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.ten_commerce"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৮</span>
                </div>
                <div class="form-control bg-number-label">এসএসসি ভোকেশনাল এর শ্রেণিভিত্তিক শিক্ষার্থী তথ্য ২০২০
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2">ট্রান্সফার ইন</td>
                        <td rowspan="2">ট্রান্সফার আউট</td>
                        <td rowspan="2">২০২২ এর পাঠ্যপুস্তকের চাহিদা অনুযায়ী শিক্ষার্থীর সংখ্যা</td>
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
                    <tr  ng-repeat="item in data.sscVocStudent">
                        <td ng-bind="sscVocName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>

                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৯</span>
                </div>
                <div class="form-control bg-number-label">এইচএসসি ভোকেশনাল এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2">ট্রান্সফার ইন</td>
                        <td rowspan="2">ট্রান্সফার আউট</td>

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
                    <tr ng-repeat="item in data.hscVocStudent">
                        <td ng-bind="hscVocName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.১০</span>
                </div>
                <div class="form-control bg-number-label">এইচএসসি বিএম এর বর্ষভিত্তিক শিক্ষার্থী তথ্য ২০২০</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শ্রেণি</td>
                        <td colspan="2">শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">উপবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">মেধাবৃত্তি প্রাপ্ত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">তথ্য প্রদানের দিন উপস্থিত শিক্ষার্থীর সংখ্যা</td>
                        <td colspan="2">রিপিটার শিক্ষার্থীর সংখ্যা</td>
                        <td rowspan="2">ট্রান্সফার ইন</td>
                        <td rowspan="2">ট্রান্সফার আউট</td>

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
                    <tr ng-repeat="item in data.hscBmStudent">
                        <td ng-bind="hscBmName(item.class_id)"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_student"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_stipend"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.male_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_scholarship"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_present"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.total_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.female_rep"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_in"></td>
                        <td><input type="number" number-converter class="w-50"ng-model="item.transfer_out"></td>
                        {{--<td><input type="number" number-converter class="w-50"ng-model="item.nextyr_book_reg"></td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/sncSecondPage.js') }}" type="module" defer></script>
@stop
