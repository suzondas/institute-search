@extends('components.template')
@section('content')
    <div class="container-fluid" id="publicStdSecondPage">
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
                        <span class="input-group-text bg-number">৩.২</span>
                    </div>
                    <div class="form-control bg-number-label"> বিদেশী শিক্ষার্থীর সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">৩.২.১ বিভাগ, বর্ষ ও লিঙ্গভিত্তিক বিদেশী শিক্ষার্থীর সংখ্যা</label>
                    <table class="table  table-sm table-bordered table-striped text-center">
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="3">ক্র</td>
                            <td rowspan="3">দেশের নাম</td>
                            <td rowspan="3">বিশ্ববিদ্যালয় প্রদত্ত বৃত্তি/ নিজ দেশের বৃত্তি/আর্ন্তজাতিক সংস্থা/অন্যান্য</td>
                            <td colspan="8">স্নাতক (সম্মান)</td>
                            <td colspan="4">স্নাতকোত্তর</td>
                            <td colspan="2" rowspan="2">এম এস সি</td>
                            <td rowspan="3">এম ফিল শিক্ষার্থী</td>
                            <td rowspan="3">পিএইচডি শিক্ষার্থী</td>
                            <td colspan="2" rowspan="2">মোট শিক্ষার্থী</td>
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
                        <tr v-for="(item, index) in data.univ_country_wise_stds">
                            <td>@{{ index+1 }}</td>
                            <td style="text-align: left">@{{ item.country_name }}</td>
                            <td style="text-align: left">@{{ item.scholarship_name }}</td>
                            <td>@{{ item.total_honors1 }}</td>
                            <td>@{{ item.female_honors1 }}</td>
                            <td>@{{ item.total_honors2 }}</td>
                            <td>@{{ item.female_honors2 }}</td>
                            <td>@{{ item.total_honors3 }}</td>
                            <td>@{{ item.female_honors3 }}</td>
                            <td>@{{ item.total_honors4 }}</td>
                            <td>@{{ item.female_honors4 }}</td>
                            <td>@{{ item.total_masters1 }}</td>
                            <td>@{{ item.female_masters1 }}</td>
                            <td>@{{ item.total_masters2 }}</td>
                            <td>@{{ item.female_masters2 }}</td>
                            <td>@{{ item.total_msc }}</td>
                            <td>@{{ item.female_msc }}</td>
                            <td>@{{ item.total_mphil }}</td>
                            <td>@{{ item.total_phd }}</td>
                            <td>@{{ item.total_student }}</td>
                            <td>@{{ item.female_student }}</td>
                        </tr>
                    </table>
                    <div class="mt-2"><button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
                    </div>
                </div>
            </div>
            {{--<div align="center"><button type="button" @click="submitData" class="btn btn-success">Submit</button></div>--}}

        </div>

        <div v-show="dataLoadingError">
            <span class="d-flex justify-content-center btn-warning">Error in Fetching Data, Please contact System Administrator!</span>
        </div>
    </div>
@endsection
    <script src="{{ asset('js/publicStdSecondPage.js') }}" type="module"></script>

@stop
