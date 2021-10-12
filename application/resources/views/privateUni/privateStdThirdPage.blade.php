@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateStdThirdPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
        <h3 style="text-align:center">সেকশন ৩ (খ): শিক্ষার্থী সম্পর্কিত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">৩.৩ </span>
                </div>
                <div class="form-control bg-number-label">ডিগ্রিপ্রাপ্তদের পরিসংখ্যান
                </div>
            </div>
            <div class="contentBoxBody">
                <label class="font-weight-bold">৩.৩.১ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        {{--<td>স্তর</td>--}}
                        <td rowspan="2" style="width: 200px;">ডিগ্রির নাম</td>
                        <td rowspan="2">বিষয়</td>
                        <td colspan="2">পরিক্ষার্থী</td>
                        <td colspan="2">উত্তীর্ণ</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                    </tr>
                    <tr v-for="(item,index) in data.univ_degree_wise_std">
                        <td class="text-left" style="text-align: left">@{{ degName(item.degree_id) }}</td>
                        <td><input type="text" v-model="item.subject_name"  class="w-100"/></td>
                        <td><input type="number" v-model="item.total_student"  class="w-50"/></td>
                        <td><input type="number" v-model="item.female_student"  class="w-50"/></td>
                        <td><input type="number" v-model="item.total_passed"  class="w-50"/></td>
                        <td><input type="number" v-model="item.female_passed"  class="w-50"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">৩.৪</span>
                </div>
                <div class="form-control bg-number-label"> অনুষদভিত্তিক শিক্ষার্থীর সংখ্যা
                </div>
            </div>
            <div class="contentBoxBody">
                <label class="font-weight-bold">৩.৪.১ অনুষদভিত্তিক শিক্ষার্থীর সংখ্যা-২০২০ স্নাতক (সম্মান) স্তরে</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        {{--<td>স্তর</td>--}}
                        <td rowspan="2">ক্র</td>
                        <td rowspan="2">অনুষদ</td>
                        <td colspan="2">১ম সেমিস্টার</td>
                        <td colspan="2">২য় সেমিস্টার</td>
                        <td colspan="2">৩য় সেমিস্টার</td>
                        <td colspan="2">৪র্থ সেমিস্টার</td>
                        <td colspan="2">৫ম সেমিস্টার</td>
                        <td colspan="2">৬ষ্ঠ সেমিস্টার</td>
                        <td colspan="2">৭ম সেমিস্টার</td>
                        <td colspan="2">৮ম সেমিস্টার</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                    </tr>
                    <tr v-for="(item,index) in data.univ_subject_std_dtls">
                        <td class="text-left">@{{ index+1 }}</td>
                        <td class="text-left" style="text-align: left">@{{ crsName(item.course_id) }}</td>
                        <td><input type="number" v-model="item.total_std_1st" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_1st" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_2nd" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_2nd" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_3rd" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_3rd" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_4th" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_4th" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_5th" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_5th" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_6th" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_6th" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_7th" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_7th" class="w-100"/></td>
                        <td><input type="number" v-model="item.total_std_8th" class="w-100"/></td>
                        <td><input type="number" v-model="item.female_std_8th" class="w-100"/></td>
                    </tr>

                </table>
                <label class="font-weight-bold">৩.৪.২ অনুষদভিত্তিক শিক্ষার্থীর সংখ্যা-২০২০ (মাস্টার্স পর্যায়ে)</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        {{--<td>স্তর</td>--}}
                        <td rowspan="2">ক্র</td>
                        <td rowspan="2">অনুষদ</td>
                        <td colspan="2">১ম সেমিস্টার</td>
                        <td colspan="2">২য় সেমিস্টার</td>
                        <td colspan="2">৩য় সেমিস্টার</td>
                        <td colspan="2">৪র্থ সেমিস্টার</td>
                        <td colspan="2">৫ম সেমিস্টার</td>
                        <td colspan="2">৬ষ্ঠ সেমিস্টার</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                        <td>মোট</td>
                        <td>ছাত্রী </td>
                    </tr>
                    <tr v-for="(item,index) in data.univ_subject_std_dtls_mas">
                        <td class="text-left">@{{ index+1 }}</td>
                        <td class="text-left" style="text-align: left">@{{ deptName(item.dept_id) }}</td>
                        <td><input type="number" v-model="item.total_std_1st" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_1st" class="w-50"/></td>
                        <td><input type="number" v-model="item.total_std_2nd" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_2nd" class="w-50"/></td>
                        <td><input type="number" v-model="item.total_std_3rd" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_3rd" class="w-50"/></td>
                        <td><input type="number" v-model="item.total_std_4th" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_4th" class="w-50"/></td>
                        <td><input type="number" v-model="item.total_std_5th" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_5th" class="w-50"/></td>
                        <td><input type="number" v-model="item.total_std_6th" class="w-50"/></td>
                        <td><input type="number" v-model="item.female_std_6th" class="w-50"/></td>
                    </tr>
                </table>
                <div class="col-md-6">
                    <label class="font-weight-bold">৩.৪.৩ শিক্ষার্থীর সংখ্যা-২০২০ (সার্টিফিকেট, ডিপ্লোমা ও পোস্ট গ্র্যাজুয়েট ডিপ্লোমা পর্যায়ে)</label>
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="2">ক্র</td>
                            <td rowspan="2">কোর্স</td>
                            <td rowspan="2">সময়কাল</td>
                            <td colspan="2">শিক্ষার্থী</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>ছাত্রী </td>
                        </tr>
                        <tr v-for="(item,index) in data.univ_crs_wise_stds">
                            <td class="text-left">@{{ index+1 }}</td>
                            <td class="text-left" style="text-align: left">@{{ crsName(item.course_id) }}</td>
                            <td><input type="text" v-model="item.course_time" class="w-75"/></td>
                            <td><input type="number" v-model="item.total_student" class="w-50"/></td>
                            <td><input type="number" v-model="item.female_student" class="w-50"/></td>
                        </tr>
                    </table>
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
@section('javascript')
    <script src="{{ asset('js/privateStdThirdPage.js') }}" type="module" defer></script>
@stop
