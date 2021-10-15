@extends('components.template')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" id="ttcTeacherFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
            <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৪</span>
                    </div>
                    <div class="form-control bg-number-label">পদবীভিত্তিক কর্মরত ও এমপিওভুক্ত শিক্ষক ও কর্মচারীর সংখ্যা:
                    </div>
                </div>
                <div class="contentBoxBody">
                    {{--Teachers_staff_summaries Table--}}
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">পদবী</td>
                            <td colspan="2"> কর্মরত</td>
                            <td colspan="2">খন্ডকালীন শিক্ষক সংখ্যা</td>
                        </tr>
                        <tr>
                            <td>মোট</td>
                            <td>মহিলা</td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr v-for="(item, $index) in data.teachStafSum">
                            <td class="text-left">@{{ desigName(item.designation_id) }}</td>
                            <td><input type="number" class="w-50" v-model="item.teachers_in_service"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/>
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="item.female_teachers_in_service" :maxlength="5"
                                       @change="totalTeacherStaffGeneral"/></td>
                            <td><input type="number" class="w-50" v-model="item.parttime_teacher"
                                       :maxlength="5"/>
                            </td>
                            <td><input type="number" class="w-50" v-model="item.female_parttime_teacher"
                                       :maxlength="5"/>
                            </td>
                        </tr>
                        <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট</td>
                            <td>@{{ teachers_in_service }}</td>
                            <td>@{{ female_teachers_in_service }}</td>
                            <td colspan="7"></td>
                            {{--<td>@{{ mpo_teachers }}</td>--}}
                            {{--<td>@{{ female_mpo_teachers }}</td>--}}
                            {{--<td>@{{ blank_post_no }}</td>--}}
                            {{--<td>@{{ brance_teacher }}</td>--}}
                            {{--<td>@{{ ntrc_teacher }}</td>--}}
                            {{--<td>@{{ parttime_teacher }}</td>--}}
                            {{--<td>@{{ ntrc_blank_post }}</td>--}}
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row  contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৫</span>
                    </div>
                    <div class="form-control bg-number-label"> শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক সংখ্যা</div>
                </div>
                <div class="col-md-4 contentBoxBody">
                    {{--Teacher_quali_summary table--}}
                    <label class="font-weight-bold"> ২.৫.১ মূল প্রতিষ্ঠানের সার্বোচ্চ শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক
                        সংখ্যা:</label>

                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                            <td colspan="2">শিক্ষক সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr v-for="item in data.teachQualiSum">
                            <td class="text-left">@{{ qualiName(item.quli_id) }}</td>
                            <td><input type="number" class="w-50" v-model="item.total_teacher"
                                       :maxlength="5"/></td>
                            <td><input type="number" class="w-50" v-model="item.female_teacher"
                                       :maxlength="5"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 contentBoxBody">
                    <label class="font-weight-bold">২.৫.২ মূল প্রতিষ্ঠানের সর্বোচ্চ পেশাগত ডিগ্রিপ্রাপ্ত শিক্ষক
                        সংখ্যা:</label>
                    {{--Higher_degree_teachers Table--}}
                    <table class="table table-sm table-bordered  table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">ডিগ্রী</td>
                            <td colspan="2">শিক্ষক সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr v-for="item in data.hdTeachSum">
                            <td class="text-left">@{{ hdName(item.higher_degree_id) }}</td>
                            <td><input type="number" class="w-50" v-model="item.total_teacher"
                                       :maxlength="5"/></td>
                            <td><input type="number" class="w-50" v-model="item.female_teacher"
                                       :maxlength="5"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 contentBoxBody">
                    <label class="font-weight-bold"> ২.৫.৩ মূল প্রতিষ্ঠানের আইসিটি বিষয়ক প্রশিক্ষণ/ ডিগ্রি প্রাপ্ত
                        শিক্ষক
                        সংখ্যা: </label>
                    {{--Teachers_higher_edu_trainings Table--}}
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">প্রশিক্ষণ/ ডিগ্রি</td>
                            <td colspan="2">শিক্ষক সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr v-for="item in data.hdTrnSum">
                            <td class="text-left">@{{ hdTrName(item.higher_degree_id) }}</td>
                            <td><input type="number" class="w-50" v-model="item.total_teacher"
                                       :maxlength="5"/></td>
                            <td><input type="number" class="w-50" v-model="item.female_teacher"
                                       :maxlength="5"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            {{--Special Training Info --}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৬</span>
                    </div>
                    <div class="form-control bg-number-label">বিশেষ প্রশিক্ষণের তথ্য
                    </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-bordered table-striped ">
                        <tr>
                            <td colspan="4" class="font-weight-bold">২.৬.১ শিক্ষকদের কোন কোন বিষয়ে প্রশিক্ষণ প্রয়োজন?
                            </td>
                        </tr>
                        <tr>
                            <td>১.<input type="text"
                                         v-model="data.teacherTrainInfo.training_required1" maxlength="60" :maxlength="60"/></td>
                            <td>২.<input type="text"
                                         v-model="data.teacherTrainInfo.training_required2" maxlength="60" :maxlength="60"/></td>
                            <td>৩.<input type="text"
                                         v-model="data.teacherTrainInfo.training_required3" maxlength="60" :maxlength="60"/></td>
                            <td>৪.<input type="text"
                                         v-model="data.teacherTrainInfo.training_required4" maxlength="60" :maxlength="60"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            {{--Special Trainig Ends--}}
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.৭</span>
                    </div>
                    {{--teacherRetAwInfo Table--}}
                    <div class="form-control bg-number-label">অবসর গ্রহণ, নতুন নিয়োগপ্রাপ্ত, গবেষণা কাজ, পুরষ্কার
                        প্রাপ্ত
                        ইত্যাদি সম্পর্কিত শিক্ষকের সংখ্যা
                    </div>
                </div>
                <div class="contentBoxBody col-md-8">
                    <table class="table table-sm table-bordered table-striped">
                        <tr class="custom-table-header">
                            <td rowspan="2">ক্রমিক নং</td>
                            <td rowspan="2" style="width:450px">বিবরণ</td>
                            <td colspan="2" class="text-center"> শিক্ষকের সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>১</td>
                            <td style="width: 300px">তথ্য প্রদানের দিন শিক্ষক উপস্থিতি</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.count_day_total" id="" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.count_day_female" id="" :maxlength="5"></td>
                        </tr>

                        <tr>
                            <td>২</td>
                            <td style="width: 300px">বর্তমানে কতজন শিক্ষক গবেষণা কাজে সম্পৃক্ত</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.research_teacher_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.research_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৩</td>
                            <td style="width: 300px">শিখন-শেখানো বিষয়ে প্রশিক্ষণপ্রাপ্ত (১/৭/২০২০ থেকে ৩০/৬/২০২০
                                পর্যন্ত)
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.learning_trained_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.learning_trained_female" id="" :maxlength="5">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div align="center" class="">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/ttcTeacherFirstPage.js') }}" type="module" defer></script>
@stop
