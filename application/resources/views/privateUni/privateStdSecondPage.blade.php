@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateStdSecondPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ৩ (খ): শিক্ষার্থী সম্পর্কিত তথ্য</h3>
            <div class="contentBox" style="width: 3000px">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.২</span>
                    </div>
                    <div class="form-control bg-number-label"> বিদেশী শিক্ষার্থীর সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">৩.২.১ বিভাগ, বর্ষ ও লিঙ্গভিত্তিক বিদেশী শিক্ষার্থীর সংখ্যা</label>
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            {{--<td>স্তর</td>--}}
                            <td rowspan="3">ক্র</td>
                            <td rowspan="3">দেশের নাম</td>
                            <td rowspan="3">বিশ্ববিদ্যালয় প্রদত্ত বৃত্তি/ নিজ দেশের বৃত্তি/আর্ন্তজাতিক সংস্থা/অন্যান্য</td>
                            <td colspan="24">স্নাতক (সম্মান)</td>
                            <td colspan="12">স্নাতকোত্তর</td>
                            <td colspan="2" rowspan="2">এম এস সি</td>
                            <td rowspan="3">এম ফিল শিক্ষার্থী</td>
                            <td rowspan="3">পিএইচডি শিক্ষার্থী</td>
                            <td colspan="2" rowspan="2">মোট শিক্ষার্থী</td>
                            <td rowspan="3">Action</td>
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
                            <td>@{{ item.total_honors5 }}</td>
                            <td>@{{ item.female_honors5 }}</td>
                            <td>@{{ item.total_honors6 }}</td>
                            <td>@{{ item.female_honors6 }}</td>
                            <td>@{{ item.total_honors7 }}</td>
                            <td>@{{ item.female_honors7 }}</td>
                            <td>@{{ item.total_honors8 }}</td>
                            <td>@{{ item.female_honors8 }}</td>
                            <td>@{{ item.total_honors9 }}</td>
                            <td>@{{ item.female_honors9 }}</td>
                            <td>@{{ item.total_honors10 }}</td>
                            <td>@{{ item.female_honors10 }}</td>
                            <td>@{{ item.total_honors11 }}</td>
                            <td>@{{ item.female_honors11 }}</td>
                            <td>@{{ item.total_honors12 }}</td>
                            <td>@{{ item.female_honors12 }}</td>
                            <td>@{{ item.total_masters1 }}</td>
                            <td>@{{ item.female_masters1 }}</td>
                            <td>@{{ item.total_masters2 }}</td>
                            <td>@{{ item.female_masters2 }}</td>
                            <td>@{{ item.total_masters3 }}</td>
                            <td>@{{ item.female_masters3 }}</td>
                            <td>@{{ item.total_masters4 }}</td>
                            <td>@{{ item.female_masters4 }}</td>
                            <td>@{{ item.total_masters5 }}</td>
                            <td>@{{ item.female_masters5 }}</td>
                            <td>@{{ item.total_masters6 }}</td>
                            <td>@{{ item.female_masters6 }}</td>
                            <td>@{{ item.total_msc }}</td>
                            <td>@{{ item.female_msc }}</td>
                            <td>@{{ item.total_mphil }}</td>
                            <td>@{{ item.total_phd }}</td>
                            <td>@{{ item.total_student }}</td>
                            <td>@{{ item.female_student }}</td>
                            <td><button @click="deleteForeignStd(item.id,index)" >Delete</button> </td>
                        </tr>
                    </table>
                    <input type="button" @click="showAddForeignStdModal = true" value="Add More" class="btn btn-warning"/>
                    <div class="mt-2"><button type="button" class="btn btn-info" onclick="window.print()"> Print</button></div>
                </div>
                <modal v-if="showAddForeignStdModal" @save="addMoreForeignStd" @close="showAddForeignStdModal=false"></modal>
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

    {{--Add more Modal--}}
    <!-- template for the modal component -->
    <style>
        .modal-mask {
            position: fixed;
            z-index: 9998;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: table;
            transition: opacity 0.3s ease;
        }

        .modal-wrapper {
            display: table-cell;
            vertical-align: middle;
        }

        .modal-container {
            width: 950px;
            height: 500px;
            margin: 0px auto;
            padding: 20px 30px;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
            transition: all 0.3s ease;
            font-weight: bold;
            font-family: 'Kalpurush', Arial, sans-serif !important;
            /*font-family: Helvetica, Arial, sans-serif;*/
            z-index: 1;
            overflow:auto;
        }

        .modal-header h3 {
            margin-top: 0;
            color: #42b983;
        }

        .modal-body {
            margin: 20px 0;
        }

        .modal-default-button {
            float: right;
        }

        .modal-enter {
            opacity: 0;
        }

        .modal-leave-active {
            opacity: 0;
        }

        .modal-enter .modal-container,
        .modal-leave-active .modal-container {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

    </style>
    <script type="text/x-template" id="modal-showAddForeignStdModal">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            <slot name="header">
                                Add Foreign Students
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">
                                <table class="table table-sm table-bordered table-striped text-center">
                                    <tr>
                                        {{--<td>স্তর</td>--}}
                                        <td rowspan="3">দেশের নাম</td>
                                        <td rowspan="3">বিশ্ববিদ্যালয় প্রদত্ত বৃত্তি/ নিজ দেশের বৃত্তি/আর্ন্তজাতিক সংস্থা/অন্যান্য</td>
                                        <td colspan="24">স্নাতক (সম্মান)</td>
                                        <td colspan="12">স্নাতকোত্তর</td>
                                        <td colspan="2" rowspan="2">এম এস সি</td>
                                        <td rowspan="3">এম ফিল শিক্ষার্থী</td>
                                        <td rowspan="3">পিএইচডি শিক্ষার্থী</td>
                                        <td colspan="2" rowspan="2">মোট শিক্ষার্থী</td>
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
                                    <tr>
                                        <td><input type="text" id="country_name"/></td>
                                        <td><input type="text" id="scholarship_name"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors1"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors1"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors2"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors2"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors3"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors3"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors4"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors4"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors5"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors5"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors6"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors6"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors7"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors7"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors8"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors8"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors9"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors9"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors10"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors10"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors11"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors11"/></td>
                                        <td><input style="width: 50px" type="number" id="total_honors12"/></td>
                                        <td><input style="width: 50px" type="number" id="female_honors12"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters1"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters1"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters2"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters2"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters3"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters3"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters4"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters4"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters5"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters5"/></td>
                                        <td><input style="width: 50px" type="number" id="total_masters6"/></td>
                                        <td><input style="width: 50px" type="number" id="female_masters6"/></td>
                                        <td><input style="width: 50px" type="number" id="total_msc"/></td>
                                        <td><input style="width: 50px" type="number" id="female_msc"/></td>
                                        <td><input style="width: 50px" type="number" id="total_mphil"/></td>
                                        <td><input style="width: 50px" type="number" id="total_phd"/></td>
                                        <td><input style="width: 50px" type="number" id="total_student"/></td>
                                        <td><input style="width: 50px" type="number" id="female_student"/></td>
                                    </tr>
                                </table>
                            </slot>
                        </div>

                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button" @click="$emit('save')">
                                    Add Foreign Student
                                </button>
                                <button class="modal-default-button" @click="$emit('close')">
                                    Cancel
                                </button>
                            </slot>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </script>
    {{--Ends Add more Modal--}}

    <script src="{{ asset('js/privateStdSecondPage.js') }}" type="module"></script>

@stop
