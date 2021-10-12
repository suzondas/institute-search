@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateTeachThirdPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৪ (গ): শিক্ষক সংক্রান্ত তথ্য</h3>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৪.৩</span>
                    </div>
                    <div class="form-control bg-number-label">পদবীভিত্তিক শিক্ষক সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <div class="col-md-10">
                        <label class="font-weight-bold">৪.৩.১ লিঙ্গ ও পদবিভিত্তিক নিয়মিত এবং খন্ডকালীন শিক্ষক সংখ্যা </label>
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                {{--<td>স্তর</td>--}}
                                <td rowspan="2">পদ</td>
                                <td rowspan="2">অনুমোদিত পদ সংখ্যা</td>
                                <td colspan="2">কর্মরত শিক্ষক সংখ্যা</td>
                                <td colspan="2">খণ্ডকালীন/চুক্তিভিত্তিক/এডহক শিক্ষক সংখ্যা</td>
                                <td colspan="2">উচ্চতর প্রশিক্ষণের জন্য বিদেশে অবস্থান</td>
                                <td colspan="2">বিদেশী শিক্ষক সংখ্যা</td>
                            </tr>

                            <tr>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                            </tr>
                            <tr v-for="item in data.univ_desig_wise_teachers">
                                <td style="text-align: left">@{{ designationName(item.designation_id) }}</td>
                                <td><input type="number" v-model="item.approved_post_no" class="w-50"/></td>
                                <td><input type="number" v-model="item.teachers_in_service" class="w-50"/></td>
                                <td><input type="number" v-model="item.female_teachers_in_service" class="w-50"/></td>
                                <td><input type="number" v-model="item.parttime_teacher" class="w-50"/></td>
                                <td><input type="number" v-model="item.parttime_teacher_female" class="w-50"/></td>
                                <td><input type="number" v-model="item.total_foreign_trained" class="w-50"/></td>
                                <td><input type="number" v-model="item.female_foreign_trained" class="w-50"/></td>
                                <td><input type="number" v-model="item.foreign_teacher_total" class="w-50"/></td>
                                <td><input type="number" v-model="item.foreign_teacher_female" class="w-50"/></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৪.৪</span>
                    </div>
                    <div class="form-control bg-number-label"> শিক্ষক সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="font-weight-bold">৪.৪.১ আবাসিক সুবিধাপ্রাপ্ত শিক্ষক, কর্মকর্তা ও কর্মচারীদের সংখ্যা ২০২০ </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2">পদবি</td>
                                    <td colspan="2">আবাসিক সুবিধা প্রাপ্ত সংখ্যা</td>
                                </tr>

                                <tr>
                                    <td>মোট</td>
                                    <td>মহিলা</td>
                                </tr>
                                <tr v-for="item in data.univ_rsdnt_ws_teachers">
                                    <td style="text-align: left">@{{ designationName(item.designation_id) }}</td>
                                    <td><input type="number" v-model="item.total_teacher" class="w-50"/></td>
                                    <td><input type="number" v-model="item.female_teacher" class="w-50"/></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">৪.৪.২ কর্মরত শিক্ষক/শিক্ষিকা, কর্মকর্তা ও কর্মচারীর সংখ্যা ও আবাসন সম্পর্কিত তথ্য </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2">ক্রমিক</td>
                                    <td rowspan="2">শিক্ষক/শিক্ষিকা, <br> কর্মকর্তা ও কর্মচারী</td>
                                    <td colspan="2">কর্মরত</td>
                                    <td colspan="2">বিদেশে উচ্চতর <br> প্রশিক্ষণে আছেন</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>মহিলা</td>
                                    <td>মোট</td>
                                    <td>মহিলা</td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_teachers_staff_summaries">
                                    <td>@{{ index+1 }}</td>
                                    <td style="text-align: left">@{{ designationName(item.designation_id) }}</td>
                                    <td><input type="number" v-model="item.teachers_in_service" class="w-50"/></td>
                                    <td><input type="number" v-model="item.female_teachers_in_service" class="w-50"/></td>
                                    <td><input type="number" v-model="item.total_foreign_trained" class="w-50"/></td>
                                    <td><input type="number" v-model="item.female_foreign_trained" class="w-50"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div align="center"><button type="button" @click="submitData" class="btn btn-success">Save and Next</button>
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>

        <div v-show="dataLoadingError">
            <span class="d-flex justify-content-center btn-warning">Error in Fetching Data, Please contact System Administrator!</span>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('js/privateTeachThirdPage.js') }}" type="module" defer></script>
@stop
