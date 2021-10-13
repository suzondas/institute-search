@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateStdFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৩ (ক): শিক্ষার্থী সম্পর্কিত তথ্য</h3>
            <div class="contentBox" style="width: 3000px">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.১</span>
                    </div>
                    <div class="form-control bg-number-label">বিষয়ভিত্তিক শিক্ষার্থী সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">৩.১.১ বিষয়, সেমিস্টার ও লিঙ্গভিত্তিক শিক্ষার্থীর সংখ্যা </label>
                    <table  class="table table-sm table-striped table-bordered text-center">
                        <tbody>
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="3">ক্র</td>
                            <td rowspan="3">বিষয়</td>
                            <td rowspan="2" colspan="2">স্নাতক পাশ</td>
                            <td rowspan="2" colspan="2">১ম বর্ষে ভর্তির আসন সংখ্যা ২০২০</td>
                            <td colspan="24">স্নাতক</td>
                            <td colspan="12">মাস্টার্স</td>
                        </tr>
                        <tr>
                            <td colspan="2">১ম</td>
                            <td colspan="2">২য়</td>
                            <td colspan="2">৩য়</td>
                            <td colspan="2">৪র্থ</td>
                            <td colspan="2">৫ম</td>
                            <td colspan="2">৬ষ্ঠ</td>
                            <td colspan="2">৭ম</td>
                            <td colspan="2">৮ম</td>
                            <td colspan="2">৯ম</td>
                            <td colspan="2">১০ম</td>
                            <td colspan="2">১১শ</td>
                            <td colspan="2">১২শ</td>
                            <td colspan="2">১ম</td>
                            <td colspan="2">২য়</td>
                            <td colspan="2">৩য়</td>
                            <td colspan="2">৪র্থ</td>
                            <td colspan="2">৫ম</td>
                            <td colspan="2">৬ষ্ঠ</td>
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
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                            <td>মোট</td>
                            <td>ছাত্রী</td>
                        </tr>
                        <tr v-for="(item,index) in data.univ_students_summaries">
                            <td>@{{ index+1 }}</td>
                            <td style="font-size: 12px; text-align: left" width="100px">@{{ item.subject_name }}</td>
                            <td><input type="number" v-model.lazy="item.total_pass_gru" @change="stdCount($event)" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_pass_gru"  style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_sit" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_sit" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_honors3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_honors4" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors4" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors5" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors5" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors6" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors6" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors7" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors7" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors8" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors8" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors9" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors9" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors10" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors10" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors11" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors11" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_honors12" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.female_honors12" style="width: 40px"></td>
                            <td><input type="number" v-model.lazy="item.total_masters1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters1" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters2" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters3" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters4" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters4" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters5" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters5" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.total_masters6" style="width: 40px"/></td>
                            <td><input type="number" v-model.lazy="item.female_masters6" style="width: 40px"/></td>
                        </tr>
                        </tbody>
                    </table>
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
    <script src="{{ asset('js/privateStdFirstPage.js') }}" type="module" defer></script>
@stop
