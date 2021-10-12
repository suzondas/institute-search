@extends('components.template')
@section('content')
    <div class="container-fluid" id="publicStdFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৩ (ক): শিক্ষার্থী সম্পর্কিত তথ্য</h3>
            <div class="contentBox" style="width: 1500px">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.১</span>
                    </div>
                    <div class="form-control bg-number-label">বিষয়ভিত্তিক শিক্ষার্থী সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">৩.১.১ বিষয়, সেমিস্টার ও লিঙ্গভিত্তিক শিক্ষার্থীর সংখ্যা </label>
                    <table  class="table table-bordered text-center">
                        <thead>
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="3">ক্র.</td>
                            <td rowspan="3">বিষয়</td>
                            <td rowspan="3">১ম বর্ষে ভর্তির <br> আসন সংখ্যা ২০২০</td>
                            <td colspan="8">স্নাতক (সম্মান)</td>
                            <td colspan="4">স্নাতকোত্তর</td>
                            <td colspan="2" rowspan="2">এম এস</td>
                            <td rowspan="3">এম ফিল শিক্ষার্থী</td>
                            <td rowspan="3">পিএইচডি শিক্ষার্থী</td>
                            <td colspan="2" rowspan="2">বিদেশী শিক্ষার্থী</td>
                        </tr>
                        <tr>
                            <td colspan="2">১ম বর্ষ</td>
                            <td colspan="2">২য় বর্ষ</td>
                            <td colspan="2">৩য় বর্ষ</td>
                            <td colspan="2">৪র্থ বর্ষ</td>
                            <td colspan="2">১ম বর্ষ</td>
                            <td colspan="2">শেষ বর্ষ</td>
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
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item,index) in data.univ_students_summaries">
                            <td>@{{ index+1 }}</td>
                            <td style="font-size: 12px; text-align: left;" width="100px">@{{ item.subject_name }}</td>
                            <td><input type="number" v-model.lazy="item.total_sit" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors4" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors4" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_masters1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_msc" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.female_msc" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.total_mphil" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.total_phd" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.total_foreign" class="w-100"/></td>
                            <td><input type="number" v-model.lazy="item.female_foreign" class="w-100"/></td>
                        </tr>
                        </tbody>
                    </table>
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
    <script src="{{ asset('js/publicStdFirstPage.js') }}" type="module" defer></script>
@stop
