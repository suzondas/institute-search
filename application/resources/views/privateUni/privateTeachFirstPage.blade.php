@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateTeachFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৪ (ক): শিক্ষক সংক্রান্ত তথ্য</h3>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৪.১</span>
                    </div>
                    <div class="form-control bg-number-label">শিক্ষক সংখ্যা</div>
                </div>
            </div>
            <div class="contentBoxBody">
                <label class="font-weight-bold">৪.১.১ বিভাগ/বিষয়, পদবি ও লিঙ্গভিত্তিক কর্মরত ও খণ্ডকালীন শিক্ষক সংখ্যা </label>
                <table class="table  table-sm table-bordered table-striped text-center">
                    <tr>
                        {{--<td>স্তর</td>--}}
                        <td rowspan="3">ক্র.</td>
                        <td rowspan="3">বিভাগ/বিষয় এর নাম</td>
                        <td colspan="3" rowspan="2">অধ্যাপক <br>কর্মরত</td>
                        <td colspan="3" rowspan="2">সহযোগী<br> অধ্যাপক কর্মরত</td>
                        <td colspan="3" rowspan="2">সহকারী <br>অধ্যাপক কর্মরত</td>
                        <td colspan="3" rowspan="2">প্রভাষক <br>কর্মরত</td>
                        <td colspan="4">উচ্চতর ডিগ্রিধারী <br>শিক্ষকের সংখ্যা</td>
                        <td colspan="2" rowspan="2">বিদেশি শিক্ষক সংখ্যা</td>
                    </tr>
                    <tr>
                        <td colspan="2">এম ফিল</td>
                        <td colspan="2">পিএইচডি</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>খণ্ডকালীন</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>খণ্ডকালীন</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>খণ্ডকালীন</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>খণ্ডকালীন</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tr v-for="(item,index) in data.univ_dpt_teachers">
                        <td>@{{ index+1 }}</td>
                        <td style="font-size: 12px; text-align: left;">@{{ item.subject_name }}</td>
                        <td><input type="number" v-model.lazy="item.total_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.female_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.ptime_prof" class="w-50"/></td>
                        <td><input type="number" v-model.lazy="item.total_asso_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.female_asso_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.ptime_asso_prof" class="w-50"/></td>
                        <td><input type="number" v-model.lazy="item.total_assit_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.female_assit_prof" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.ptime_assit_prof" class="w-50"/></td>
                        <td><input type="number" v-model.lazy="item.total_lecturer" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.female_lecturer" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.ptime_lecturer" class="w-50"/></td>
                        <td><input type="number" v-model.lazy="item.mfil_higher_edu" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.mfil_female_higher_edu" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.phd_higher_edu" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.phd_female_higher_edu" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.total_forigne" class="w-100"/></td>
                        <td><input type="number" v-model.lazy="item.female_forigne" class="w-100"/></td>
                    </tr>
                </table>
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
    <script src="{{ asset('js/privateTeachFirstPage.js') }}" type="module" defer></script>
@stop
