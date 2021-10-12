@extends('components.template')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" id="schoolFifthPage">
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
                        <span class="input-group-text bg-number">২.১৯</span>
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
                            <td colspan="2"> এমপিওভুক্ত (প্রযোজ্য ক্ষেত্রে)</td>
                            <td rowspan="2">শূন্য পদের সংখ্যা</td>
                            <td rowspan="2">শাখা শিক্ষক (কর্মরততেও অন্তর্ভূক্ত থাকবে)</td>
                            <td rowspan="2">খন্ডকালীন শিক্ষক সংখ্যা</td>
                            <td rowspan="2">নিবন্ধনকৃত শিক্ষক সংখ্যা (NTRCA) (প্রযোজ্য ক্ষেত্রে)</td>
                            <td rowspan="2">NTRCA কর্তৃক পূরণযোগ্য শূন্য পদের সংখ্যা</td>

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
                            <td><input type="number" class="w-50" v-model="item.mpo_teachers"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/></td>
                            <td><input type="number" class="w-50" v-model="item.female_mpo_teachers"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/>
                            </td>
                            <td><input type="number" class="w-50" v-model="item.blank_post_no"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/></td>
                            <td><input type="number" class="w-50" v-model="item.brance_teacher"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/></td>
                            <td><input type="number" class="w-50" v-model="item.ntrc_teacher"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/></td>
                            <td><input type="number" class="w-50" v-model="item.parttime_teacher"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/>
                            </td>
                            <td><input type="number" class="w-50" v-model="item.ntrc_blank_post"
                                       :maxlength="5" @change="totalTeacherStaffGeneral"/>
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
                <div class="col-md-6">
                    <label class="label-number font-weight-bold">২.১৯.১ সংযু্ক্ত এসএসসি (ভোকেশনাল)/এইচএসসি (বিএম) শাখার
                        শিক্ষক/কর্মচারীর সংখ্যা:</label>
                    {{--Technical_teachers_summaries Table--}}
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td rowspan="2">পদবী</td>
                            <td colspan="2"> কর্মরত</td>
                            <td colspan="2"> এমপিওভুক্ত (প্রযোজ্য ক্ষেত্রে)</td>
                            <td rowspan="2">শূন্য পদের সংখ্যা</td>
                        </tr>
                        <tr class="custom-table-header">
                            <td>মোট</td>
                            <td>মহিলা</td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr v-for="item in data.teachVocStafSum">
                            <td class="text-left">@{{ desigVocName(item.designation_id) }}</td>
                            <td><input type="number" class="w-50" v-model="item.teachers_in_service"
                                       :maxlength="5" @change="totalTeacherStaffVoc"/>
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="item.female_teachers_in_service" :maxlength="5" @change="totalTeacherStaffVoc"/></td>
                            <td><input type="number" class="w-50" v-model="item.mpo_teachers"
                                       :maxlength="5" @change="totalTeacherStaffVoc"/></td>
                            <td><input type="number" class="w-50" v-model="item.female_mpo_teachers"
                                       :maxlength="5" @change="totalTeacherStaffVoc"/>
                            </td>
                            <td><input type="number" class="w-50" v-model="item.blank_post_no"
                                       :maxlength="5" @change="totalTeacherStaffVoc"/></td>
                        </tr>
                        <tr style="border: 2px solid #006bff !important; font-weight: bold;">
                            <td>মোট</td>
                            <td>@{{ voc_teachers_in_service }}</td>
                            <td>@{{ voc_female_teachers_in_service }}</td>
                            <td colspan="3"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row  contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২০</span>
                    </div>
                    <div class="form-control bg-number-label"> শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক সংখ্যা</div>
                </div>
                <div class="col-md-4 contentBoxBody">
                    {{--Teacher_quali_summary table--}}
                    <label class="font-weight-bold"> ২.২০.১ মূল প্রতিষ্ঠানের সার্বোচ্চ শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক
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
                    <label class="font-weight-bold">২.২০.২ মূল প্রতিষ্ঠানের সর্বোচ্চ পেশাগত ডিগ্রিপ্রাপ্ত শিক্ষক
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
                    <label class="font-weight-bold"> ২.২০.৩ মূল প্রতিষ্ঠানের আইসিটি বিষয়ক প্রশিক্ষণ/ ডিগ্রি প্রাপ্ত
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
                        <span class="input-group-text bg-number">২.২১</span>
                    </div>
                    <div class="form-control bg-number-label">বিশেষ প্রশিক্ষণের তথ্য
                    </div>
                </div>
                <div class="contentBoxBody">
                    <label class="font-weight-bold">২.২১.১ সৃজনশীল প্রশ্নপত্র প্রণয়ন ও উত্তরপত্র মূল্যায়ন
                        বিষয়ক প্রশিক্ষণপ্রাপ্ত শিক্ষক সংখ্যা</label>
                    {{--Teachers_train_others_infos Table--}}
                    <table class="table table-sm table-bordered table-striped">
                        <tr class="custom-table-header">
                            <td colspan="2" class="text-center">৩ দিন প্রশিক্ষণপ্রাপ্ত</td>
                            <td colspan="2" class="text-center">১২ দিন প্রশিক্ষণপ্রাপ্ত</td>
                        </tr>
                        <tr>
                            <td class="text-center"> মোট: <input type="number" class="w-25"
                                                                 v-model="data.teacherTrainInfo.creative_3day_total"
                                                                 :maxlength="5"/>
                            </td>
                            <td class="text-center"> মহিলা: <input type="number"
                                                                   class="w-25"
                                                                   v-model="data.teacherTrainInfo.creative_3day_female"
                                                                   :maxlength="5"/>
                            </td>
                            <td class="text-center"> মোট: <input type="number" class="w-25"
                                                                 v-model="data.teacherTrainInfo.creative_12day_total"
                                                                 :maxlength="5"/>
                            </td>
                            <td class="text-center"> মহিলা: <input type="number"
                                                                   class="w-25"
                                                                   v-model="data.teacherTrainInfo.creative_12day_female"
                                                                   :maxlength="5"/>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td><label class="font-weight-bold">২.২১.২ বিশেষ চাহিদাসম্পন্ন শিক্ষক এর কর্মকালীন
                                    প্রশিক্ষণের তথ্য (সংখ্যা লিখুন)</label><br>
                                মোট: <input type="number" class="w-25"
                                            v-model="data.teacherTrainInfo.onjob_training_total" :maxlength="5"/>
                                মহিলা: <input type="number" class="w-25"
                                              v-model="data.teacherTrainInfo.onjob_training_female" :maxlength="5"/>
                            </td>
                            <td><label class="font-weight-bold">২.২১.৩ ক্ষুদ্র-নৃ-গোষ্ঠী শিক্ষক এর কর্মকালীন প্রশিক্ষণের
                                    তথ্য (সংখ্যা
                                    লিখুন)</label><br>
                                মোট: <input type="number" class="w-25"
                                            v-model="data.teacherTrainInfo.onjob_training_tribe_total"
                                            :maxlength="5"/>
                                মহিলা: <input type="number" class="w-25"
                                              v-model="data.teacherTrainInfo.onjob_training_tribe_female"
                                              :maxlength="5"/></td>
                            <td class="form-inline"><label class="font-weight-bold">২.২১.৪ বিশেষ চাহিদাসম্পন্ন
                                    শিক্ষার্থীর জন্য গাইড শিক্ষক আছে
                                    কি? </label><br>
                                <select class="w-25" v-model="data.teacherTrainInfo.autism_guide_teacher_yn">
                                    <option value="1"> হ্যাঁ</option>
                                    <option value="2"> না</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td class="form-inline"><label class="font-weight-bold">২.২১.৫ দুর্যোগ ব্যবস্থাপনা সংক্রান্ত
                                    প্রশিক্ষণপ্রাপ্ত শিক্ষক আছে কি? </label><br>
                                <select class="w-25" v-model="data.teacherTrainInfo.disaster_train_teacher_yn">
                                    <option value="1"> হ্যাঁ</option>
                                    <option value="2"> না</option>
                                </select></td>
                            <td><label class="font-weight-bold">২.২১.৬ উত্তর হ্যাঁ হলে কয়জন?</label><br>
                                <input type="number" class="w-25"
                                       v-model="data.teacherTrainInfo.disaster_train_teacher" :maxlength="5"/>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped ">
                        <tr>
                            <td colspan="4" class="font-weight-bold">২.২১.৭ শিক্ষকদের কোন কোন বিষয়ে প্রশিক্ষণ প্রয়োজন?
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
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২২</span>
                    </div>
                    <div class="form-control bg-number-label">কর্মকালীন প্রশিক্ষণের তথ্য (সংখ্যা লিখুন):</div>
                </div>
                <span style="color:red;font-weight: bold;">*** প্রধান শিক্ষকগণ হ্যাঁ/না নির্বাচন করবেন<br>
                    *** অন্যান্য শিক্ষকগণের সংখ্যা লিখবেন</span>
                <div class="contentBoxBody">
                    {{--Teachers_inservice_trainings Table--}}
                    <table class="table table-sm table-bordered table-striped text-center">
                        <thead>
                        <tr class="custom-table-header">
                            <th rowspan="2">প্রশিক্ষণ</th>
                            <th colspan="2">প্রশিক্ষণপ্রাপ্ত শিক্ষক</th>
                            <th rowspan="2">প্রশিক্ষণ</th>
                            <th colspan="2">প্রশিক্ষণপ্রাপ্ত শিক্ষক</th>

                        </tr>
                        <tr>

                            <th colspan="2">হ্যাঁ/না</th>
                            <th>মোট</th>
                            <th>মহিলা</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>হেড টিচার ট্রেনিং (২১ দিন)</td>
                            <td colspan="2">
                                <select v-model="data.teacherInservTr.ht_training_yn" style="width: 90px">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td>সিপিডি-১ শুধুমাত্র ইংরেজি ট্রেনিং (২১ দিন)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd1_eng_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd1_eng_female" :maxlength="5"></td>
                        </tr>

                        <tr>
                            <td>হেড টিচার ফলো-আপ ট্রেনিং (৬ দিন)</td>
                            <td colspan="2">
                                <select v-model="data.teacherInservTr.ht_fl_training_yn"
                                        style="width: 90px">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td>সিপিডি-২ ট্রেনিং (৫ দিন)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd2_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd2_female" :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td>হেড টিচার প্রি-সার্ভিস ট্রেনিং (৩৫ দিন)</td>
                            <td colspan="2">
                                <select v-model="data.teacherInservTr.ht_prserv_training_yn"
                                        style="width: 90px">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td>ক্লাস্টার ট্রেনিং (১ দিন)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cluster_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cluster_female" :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td rowspan="2"></td>
                            <td colspan="2" class="custom-table-header">প্রশিক্ষণপ্রাপ্ত শিক্ষক সংখ্যা</td>
                            <td>এস.বি. এ ট্রেনিং</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.sba_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.sba_female" :maxlength="5"></td>
                        </tr>
                        <tr>

                            <td>মোট</td>
                            <td>মহিলা</td>
                            <td>সৃজনশীল প্রশ্ন সংক্রান্ত ট্রেনিং</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.srizonsil_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.srizonsil_female" :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td>এসটিসি ট্রেনিং (৩ মাস)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.stc_training_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.stc_training_female" :maxlength="5"></td>
                            <td>অন্যান্য ট্রেনিং</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.other_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.other_female" :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td>এসটিটি থেকে বি.এড (৯ মাস)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.stt_bed_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.stt_bed_female" :maxlength="5"></td>
                            <td colspan="3" rowspan="2">
                            </td>

                        </tr>
                        <tr>
                            <td>সিপিডি-১ ট্রেনিং (১৪ দিন)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd1_total" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherInservTr.cpd1_female" :maxlength="5"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২৩</span>
                    </div>
                    <div class="form-control bg-number-label"> বিষয়ভিত্তিক শিক্ষক সংখ্যা</div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="col">
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                <td></td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td style="width: 350px" class="font-weight-bold">২.২৩.১ ক্লাস রুটিন অনুযায়ী ইংরেজি
                                    পাঠদানকারী শিক্ষক সংখ্যা:
                                </td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.total_eng_teachers" :maxlength="5"></td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.female_eng_teacher" :maxlength="5"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col"><label class="font-weight-bold"> ২.২৩.২ ইংরেজি বিষয়ে পাঠদানকারী শিক্ষকের স্নাতক
                            (পাস), স্নাতক (সম্মান) ও স্নাতকোত্তর
                            পর্যায়ে ইংরেজি বিষয় অধ্যয়ন সম্পর্কিত তথ্য:</label>

                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr class="custom-table-header">
                                <td>ক্রমিক নং</td>
                                <td>বিবরণ</td>
                                <td>শিক্ষক/ শিক্ষিকার সংখ্যা</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td>১</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে বাধ্যতামূলক ১০০ নম্বরের ইংরেজি ছিল</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_100_eng" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে ৩০০ নম্বরের ইংরেজি ছিল</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_300_eng" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td style="width: 350px">ইংরেজিতে স্নাতক সম্মান</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.eng_hons" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td style="width: 350px">ইংরেজিতে স্নাতকোত্তর</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.eng_hons_mst" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে ইংরেজি ছিলা না</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_without_eng" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৬</td>
                                <td style="width: 350px">এইচ এস সি পাস</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.eng_hsc_pass" :maxlength="5"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="col">
                        <table class="table table-sm table-bordered  table-striped text-center">
                            <tr>
                                <td></td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td style="width: 350px" class="font-weight-bold">২.২৩.৩ ক্লাস রুটিন অনুযায়ী গণিত বিষয়ে
                                    পাঠদানকারী শিক্ষক সংখ্যা:
                                </td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.total_math_teachers" :maxlength="5"></td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.female_math_teacher" :maxlength="5"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <label class="font-weight-bold">২.২৩.৪ গণিত বিষয়ে পাঠদানকারী শিক্ষকের স্নাতক (পাস), স্নাতক
                            (সম্মান) ও স্নাতকোত্তর
                            পর্যায়ে গণিত বিষয় অধ্যয়ন সম্পর্কিত তথ্য:</label>

                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr class="custom-table-header">
                                <td>ক্রমিক নং</td>
                                <td>বিবরণ</td>
                                <td>শিক্ষক/ শিক্ষিকার সংখ্যা</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td>১</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে পদার্থ ও রসায়নসহ গণিত ছিল</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_pcm" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে অন্যান্য বিষয়সহ গণিত ছিল</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_other_math" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td style="width: 350px">গণিতে স্নাতক সম্মান</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.math_hons" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td style="width: 350px">গণিতে স্নাতকোত্তর</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.math_hons_mst" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td style="width: 350px">স্নাতক (পাস) পর্যায়ে গণিত ছিল না কিন্তু এইচএসসিতে ছিল</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.deg_hsc_with_math" :maxlength="5"></td>
                            </tr>
                            <tr>
                                <td>৬</td>
                                <td style="width: 350px">স্নাতক বা এইচ এস সি পর্যায়ে ছিল না</td>
                                <td><input type="number" class="w-50"
                                           v-model="data.teacherTrainInfo.hons_without_math" :maxlength="5"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="contentBox ">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২৪</span>
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
                            <td style="width: 300px">অবসরে গিয়েছেন (১/৭/২০২০থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.retired_teacher_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.rerired_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৩</td>
                            <td style="width: 300px">অবসরে যাবেন (১/৭/২০২০ থেকে ৩০/৬/২০২২ পর্যন্ত)</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.retiredfu_teacher_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.reriredfu_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৪</td>
                            <td style="width: 300px">নতুন নিয়োগপ্রাপ্ত (১/৭/২০২০ থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.new_recruite_teacher_total" id=""
                                       :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.new_recruite_teacher_female" id=""
                                       :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td>৫</td>
                            <td style="width: 300px">শিক্ষকতা পেশা ছেড়ে দিয়েছেন (১/৭/২০২০ থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.leave_teacher_total" id="" :maxlength="5"></td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.leave_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৬</td>
                            <td style="width: 300px">NTRCA কর্তৃক সুপারিশকৃত শিক্ষকের সংখ্যা</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.ntrc_teacher_total" id="" :maxlength="5"></td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.ntrc_teacher_female" id="" :maxlength="5"></td>
                        </tr>
                        <tr>
                            <td>৭</td>
                            <td style="width: 300px">বর্তমানে কতজন শিক্ষক গবেষণা কাজে সম্পৃক্ত</td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.research_teacher_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class=" w-50"
                                       v-model="data.teacherRetAwInfo.research_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৮</td>
                            <td style="width: 300px">একাডেমিক বিষয়ের ওপর পুরষ্কারপ্রাপ্ত শিক্ষকের সংখ্যা</td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.awarded_teacher_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.awarded_teacher_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>৯</td>
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
                        <tr>
                            <td>১০</td>
                            <td style="width: 300px">বিশেষ চাহিদাসম্পন্ন (Special needs) শিক্ষার্থীর শিক্ষা বিষয়ে
                                প্রশিক্ষণপ্রাপ্ত শিক্ষকের সংখ্যা
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.special_trained_total" id="" :maxlength="5">
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.special_trained_female" id="" :maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>১১</td>
                            <td style="width: 300px">একীভূত শিক্ষা (Inclusive education), শিশু অধিকার এবং বিদ্যালয়ের
                                ইতিবাচক
                                শৃঙ্খলা বিষয়ের ওপর প্রশিক্ষণপ্রাপ্ত শিক্ষকের সংখ্যা
                            </td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.inclusive_total" id="" :maxlength="5"></td>
                            <td><input type="number" class="w-50"
                                       v-model="data.teacherRetAwInfo.inclusive_female" id="" :maxlength="5"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="row contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২৫</span>
                    </div>
                    <div class="form-control bg-number-label"> পুরষ্কার অর্জন সম্পর্কিত তথ্য</div>
                </div>
                <div class="col-md-6">
                    {{--teacherRetAwInfo Table--}}
                    <label class="font-weight-bold"> ২.২৫.১ শিক্ষা প্রতিষ্ঠানে প্রাপ্ত পুরষ্কার সম্পর্কিত তথ্য
                        (নির্দিষ্ট স্থানে টিক চিহ্ন দিন):</label>
                    <table class="table table-sm table-bordered text-center">
                        <tbody>
                        <tr class="custom-table-header">
                            <td rowspan="7">শিক্ষকদের জন্য</td>
                            <td>বিষয়</td>
                            <td>জাতীয়</td>
                            <td>বিভাগ/মহানগর</td>
                            <td>জেলা</td>
                            <td>উপজেলা/থানা</td>
                            <td style="width:100px">সাল</td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষা প্রতিষ্ঠান</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_inst_year" maxlength="4" :maxlength="4">
                            </td>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষা প্রতিষ্ঠান প্রধান</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_head_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_head_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_head_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_inst_head_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_inst_head_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শ্রেণি শিক্ষক</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_class_tea_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_class_tea_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_class_tea_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_class_tea_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_class_tea_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষক (বিএনসিসি)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_bncc_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_bncc_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_bncc_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_bncc_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_tea_bncc_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষক (রোভার)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_scout_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_scout_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_scout_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_scout_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_tea_scout_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষক (রেঞ্জার)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_gguide_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_gguide_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_gguide_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_tea_gguide_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_tea_gguide_year" :maxlength="4"
                                       maxlength="4"></td>
                        <tr>
                        </tr>
                        <tr>
                            <td rowspan="4" class="custom-table-header"> শিক্ষার্থীদের জন্য</td>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_thana"></td>
                            <td><input type="text" class="w-50" v-model="data.teacherRetAwInfo.best_std_year"
                                       maxlength="4" :maxlength="4">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (বিএনসিসি)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_bncc_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_bncc_divisional"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_bncc_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_bncc_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_std_bncc_year" :maxlength="4"
                                       maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (রোভার)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_scout_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_scout_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_scout_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_scout_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_std_scout_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        <tr>
                            <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (রেঞ্জার)</td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_gguide_national"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_gguide_division"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_gguide_district"></td>
                            <td><input type="checkbox" true-value="1" false-value="0"
                                       v-model="data.teacherRetAwInfo.best_std_gguide_thana"></td>
                            <td><input type="text" class="w-50"
                                       v-model="data.teacherRetAwInfo.best_std_gguide_year" maxlength="4"
                                       :maxlength="4"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="col-md-6">
                    <label class="font-weight-bold"> ২.২৫.২ বিভিন্ন পর্যায়ে অংশগ্রহণকারী ও পুরষ্কারপ্রাপ্ত শিক্ষার্থী
                        সংখ্যা</label>
                    <table class="table table-sm table-bordered text-center">
                        <tbody>
                        <tr class="custom-table-header">
                            <td>বিষয়</td>
                            <td></td>
                            <td>প্রতিষ্ঠান পর্যায়ে</td>
                            <td>উপজেলা/থানা পর্যায়ে</td>
                            <td>জেলা পর্যায়ে</td>
                            <td>বিভাগীয় পর্যায়ে</td>
                            <td>জাতীয় পর্যায়ে</td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="text-left">সাহিত্য ও সংস্কৃতি</td>
                            <td>অংশগ্রহণকারী</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_cultureal_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_cultureal_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_cultureal_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_cultureal_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_cultureal_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_cultureal_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_cultureal_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_cultureal_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_cultureal_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_cultureal_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="text-left">ক্রীড়া (আউটডোর)</td>
                            <td class="text-left">অংশগ্রহণকারী</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_sports_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_sports_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_sports_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_sports_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_sports_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_sports_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_sports_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_sports_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_sports_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_sports_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="text-left">ক্রীড়া (ইনডোর)</td>
                            <td class="text-left">অংশগ্রহণকারী</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_indoor_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_indoor_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_indoor_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_indoor_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_indoor_parti" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                        <tr>
                            <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_indoor_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_indoor_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_indoor_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_indoor_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_indoor_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="text-left">সৃজনশীল মেধা অন্বেষণ</td>
                            <td class="text-left">অংশগ্রহণকারী</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_creative_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_creative_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_creative_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_creative_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_creative_parti" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_creative_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_creative_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_creative_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_creative_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_creative_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                        </tr>
                        <tr>
                            <td class="text-left">বিশেষ কৃতিত্বপূর্ণ অবদান</td>
                            <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.institute_special_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.upazila_special_award" class="w-50" maxlength="2"
                                       :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.district_special_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.division_special_award" class="w-50"
                                       maxlength="2" :maxlength="2"></td>
                            <td><input type="text"
                                       v-model="data.teacherRetAwInfo.national_special_award" class="w-50"
                                       :maxlength="2"></td>
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
    <script src="{{ asset('js/schoolFifthPage.js') }}" type="module" defer></script>
@stop
