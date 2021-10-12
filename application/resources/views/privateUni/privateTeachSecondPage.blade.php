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
                            <td rowspan="2">Action</td>
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
                            <td><button @click="deleteReshTeach(item.id,index)" >Delete</button> </td>
                        </tr>
                    </table>
                    <input type="button" @click="showAddReshTeachModal = true" value="Add More" class="btn btn-warning"/>
                    <div class="mt-2"><button type="button" class="btn btn-info" onclick="window.print()"> Print</button></div>
                </div>
                <modal v-if="showAddReshTeachModal" @save="addMoreReshTeach" @close="showAddReshTeachModal=false"></modal>
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
            width: 900px;
            height: 400px;
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
    <script type="text/x-template" id="modal-showAddReshTeachModal">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header">
                            <slot name="header">
                                Add Research Related Teacher
                            </slot>
                        </div>

                        <div class="modal-body">
                            <slot name="body">
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
                                    <tr>
                                        <td><input type="text" id="faculty_name"/></td>
                                        <td><input type="text" id="dept_name"/></td>
                                        <td><select name="resh_degis_id" id="resh_degis_id">
                                                <option value="1">Professor</option>
                                                <option value="2">Associate Professor</option>
                                                <option value="3">Asst. Professor</option>
                                                <option value="4">Lecturer</option>
                                                <option value="5">Others</option>
                                            </select></td>
                                        <td><input style="width: 50px" type="number" id="total_full"/></td>
                                        <td><input style="width: 50px" type="number" id="female_full"/></td>
                                        <td><select name="funding_full_id" id="funding_full_id">
                                                <option value="1">Eduction Ministry</option>
                                                <option value="2">Other Ministry</option>
                                                <option value="3">Other Govt. Body</option>
                                                <option value="4">Forigne Organization</option>
                                                <option value="5">Others</option>
                                            </select></td>
                                        <td><input style="width: 50px" type="number" id="total_part"/></td>
                                        <td><input style="width: 50px" type="number" id="female_part"/></td>
                                        <td><select name="funding_part_id" id="funding_part_id">
                                                <option value="1">Eduction Ministry</option>
                                                <option value="2">Other Ministry</option>
                                                <option value="3">Other Govt. Body</option>
                                                <option value="4">Forigne Organization</option>
                                                <option value="5">Others</option>
                                            </select></td>
                                        <td><input style="width: 50px" type="number" id="total_forigne"/></td>
                                        <td><input style="width: 50px" type="number" id="female_forigne"/></td>
                                    </tr>
                                </table>
                            </slot>
                        </div>

                        <div class="modal-footer">
                            <slot name="footer">
                                <button class="modal-default-button" @click="$emit('save')">
                                    Add Research Related Teacher
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

    <script src="{{ asset('js/privateTeachSecondPage.js') }}" type="module"></script>

@stop
