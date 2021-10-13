@extends('components.template')
@section('content')
    <div class="container-fluid" id="publicStdThirdPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৩ (গ): শিক্ষার্থী সম্পর্কিত তথ্য</h3>
                <div class="contentBox">
                    <div class="input-group contentdeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৩ </span>
                        </div>
                        <div class="form-control bg-number-label">ডিগ্রিপ্রাপ্তদের পরিসংখ্যান
                        </div>
                    </div>
                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.১ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত স্নাতক (পাস) পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_hnrs_pass">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.২ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত স্নাতক (সম্মান) পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_hnrs_som">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.৩ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত স্নাতক (কারিগরি ও প্রযুক্তি) পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_hnrs_tec">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.৪ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত স্নাতকোত্তর পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_mas">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.৫ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত স্নাতকোত্তর (কারিগরি ও প্রযুক্তি) পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_mas_tec">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.৬ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত এম এস/ এম ফিল/ পি এইচ ডি পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_phd">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="contentBoxBody">
                        <div class="col-md-8">
                            <label class="font-weight-bold">৩.৩.৭ ২০২০ সালের জানুয়ারি থেকে ডিসেম্বর পর্যন্ত ডিপ্লোমা পর্যায়ে ডিগ্রিপ্রাপ্তদের পরিসংখ্যান </label>
                            <table class="table table-sm table-bordered table-striped text-center">
                                <tr>
                                    {{--<td>স্তর</td>--}}
                                    <td rowspan="2" class="align-middle font-weight-bold" style="width: 220px;">বিষয়</td>
                                    <td rowspan="2" class="align-middle font-weight-bold">সেশন</td>
                                    <td colspan="2" class="align-middle font-weight-bold">পরিক্ষার্থী</td>
                                    <td colspan="2" class="align-middle font-weight-bold">উত্তীর্ণ</td>
                                </tr>
                                <tr>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                    <td>মোট</td>
                                    <td>ছাত্রী </td>
                                </tr>
                                <tr v-for="(item,index) in data.univ_degree_wise_std_diploma">
                                    <td style="text-align: left">@{{ subName(item.subject_id) }}</td>
                                    <td><input type="number" v-model="item.sesion" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_student" class="w-100"/></td>
                                    <td><input type="number" v-model="item.total_passed" class="w-100"/></td>
                                    <td><input type="number" v-model="item.female_passed" class="w-100"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <div align="center">
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
    <script src="{{ asset('js/publicStdThirdPage.js') }}" type="module" defer></script>
@stop