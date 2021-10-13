@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateTeachSecondPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৪ (খ): শিক্ষক সংক্রান্ত তথ্য</h3>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৪.২</span>
                    </div>
                    <div class="form-control bg-number-label"> গবেষণা সংক্রান্ত
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">৪.২.১ গবেষণা কাজে নিয়োজিত শিক্ষক সংক্রান্ত তথ্য </label>
                    <table class="table  table-sm table-bordered table-striped text-center">
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="2">অনুষদ এর নাম</td>
                            <td rowspan="2">বিভাগ এর নাম</td>
                            <td rowspan="2">পদবি</td>
                            <td colspan="3">পূর্ণকালীন গবেষক</td>
                            <td colspan="3">খণ্ডকালীন গবেষক</td>
                            <td colspan="2">বিদেশি শিক্ষক</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>মহিলা</td>
                            <td style="width: 150px;">অর্থায়ন সংক্রান্ত তথ্য</td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                            <td style="width: 150px;">অর্থায়ন সংক্রান্ত তথ্য</td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tr v-for="item in data.univ_resh_wise_teachers">
                            <td style="text-align: left">@{{ item.faculty_name }}</td>
                            <td style="text-align: left">@{{ item.dept_name }}</td>
                            <td v-if="item.resh_degis_id==1">Preofessor</td>
                            <td v-if="item.resh_degis_id==2">Associate Professor</td>
                            <td v-if="item.resh_degis_id==3">Asst. Preofessor</td>
                            <td v-if="item.resh_degis_id==4">Lecturer</td>
                            <td v-if="item.resh_degis_id==5">Others</td>
                            <td v-if="item.resh_degis_id==null">No data</td>
                            <td>@{{ item.total_full }}</td>
                            <td>@{{ item.female_full }}</td>
                            <td v-if="item.funding_full_id==1">Eduction Ministry</td>
                            <td v-if="item.funding_full_id==2">Other Ministry</td>
                            <td v-if="item.funding_full_id==3">Other Govt. Body</td>
                            <td v-if="item.funding_full_id==4">Foreign Organization</td>
                            <td v-if="item.funding_full_id==5">Others</td>
                            <td v-if="item.funding_full_id==null"></td>
                            <td>@{{ item.total_part }}</td>
                            <td>@{{ item.female_part }}</td>
                            <td v-if="item.funding_part_id==1">Eduction Ministry</td>
                            <td v-if="item.funding_part_id==2">Other Ministry</td>
                            <td v-if="item.funding_part_id==3">Other Govt. Body</td>
                            <td v-if="item.funding_part_id==4">Foreign Organization</td>
                            <td v-if="item.funding_part_id==5">Others</td>
                            <td v-if="item.funding_part_id==null"></td>
                            <td>@{{ item.total_forigne }}</td>
                            <td>@{{ item.female_forigne }}</td>
                        </tr>
                    </table>
                    <div class="mt-2"><button type="button" class="btn btn-info" onclick="window.print()"> Print</button></div>
                </div>
            </div>
            {{--<div align="center"><button type="button" @click="submitData" class="btn btn-success">Submit</button></div>--}}

        </div>

        <div v-show="dataLoadingError">
            <span class="d-flex justify-content-center btn-warning">Error in Fetching Data, Please contact System Administrator!</span>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('js/privateTeachSecondPage.js') }}" type="module"></script>
@stop
