@extends('components.template')
@section('content')
    <div class="" id="thirdPage">
        <h3 class="text-center">সেকশন-৩: বিবিধ তথ্য (১)</h3>
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
            {{--LAB--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.১</span>
                    </div>
                    <div class="form-control bg-number-label">ল্যাব সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">৩.১.১ প্রতিষ্ঠানে কম্পিউটার ল্যাব আছে কি?</label>
                                <select class="contentBoxInput" id=""
                                        v-model="data.institutes_computer_lab_infos.computer_lab_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="labYN">৩.১.২ প্রতিষ্ঠানে কম্পিউটার ল্যাবের সংখ্যা</label>
                                <input type="number" style="width:50px;"
                                       v-model="data.institutes_computer_lab_infos.computer_lab_no"/> টি
                            </div>
                        </div>
                        {{--if Lab Available--}}
                        <div>
                            <table class="table table-sm table-bordered text-center font-weight-bold">
                                <tbody>
                                <tr class="custom-table-header">
                                    <td rowspan="2">মোট কম্পিউটার</td>
                                    <td colspan="2">সচল</td>
                                    <td rowspan="2">মেরামতযোগ্য</td>
                                    <td rowspan="2">অচল</td>
                                    <td rowspan="2">প্রতিষ্ঠার তারিখ</td>
                                    <td rowspan="2" style="width: 250px">প্রদানকারী সংস্থা</td>
                                    <td rowspan="2">প্রতিদিন কত ঘন্টা ব্যবহার হয়</td>
                                    <td rowspan="2">ব্যবহারকারী শিক্ষার্থীর সংখ্যা</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>ডেস্কটপ</td>
                                    <td>ল্যাপটপ</td>
                                </tr>
                                <tr>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.total_lab_computer"/></td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.computer_working_lab"/></td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.laptop_working_lab"/></td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.computer_workable_lab"/></td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.computer_notworking_lab"/>
                                    </td>
                                    <td><input type="date"
                                               v-model="data.institutes_computer_lab_infos.computer_lab_date"/></td>
                                    <td>
                                        <table class="table table-bordered">
                                            <tr>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_edu_ministry"/>&nbsp;
                                                    শিক্ষা মন্ত্রণালয়
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_mausi"/>&nbsp;
                                                    মাউশি
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_project"/>&nbsp;
                                                    প্রকল্প
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_eduboard"/>&nbsp;
                                                    শিক্ষাবোর্ড
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_bcc"/>&nbsp;
                                                    বিসিসি
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_ngo"/>&nbsp;
                                                    এনজিও
                                                </td>

                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_inst"/>&nbsp;
                                                    ক্রয়কৃত
                                                </td>
                                                <td class="text-left"><input type="checkbox"
                                                                             v-model="data.institutes_computer_lab_infos.lab_others"/>&nbsp;
                                                    অন্যান্য
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.using_hour"/></td>
                                    <td><input type="number" class="contentBoxInput w-50"
                                               v-model="data.institutes_computer_lab_infos.using_std_num"/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="">
                        <label for="">৩.১.৩ ল্যাব ব্যতিত অন্য কম্পিউটার আছে কি?</label>
                        <select class="contentBoxInput" v-model="data.institutes_computer_lab_infos.computer_yn">
                            <option value="1">হ্যাঁ</option>
                            <option value="2">না</option>
                        </select>
                        {{--if Lab Available--}}
                        <div>
                            <table class="table table-sm table-bordered text-center font-weight-bold">
                                <tbody>
                                <tr class="custom-table-header">
                                    <td colspan="2">সচল</td>
                                    <td rowspan="2">মেরামতযোগ্য</td>
                                    <td rowspan="2">অচল</td>
                                </tr>
                                <tr class="custom-table-header">
                                    <td>ডেস্কটপ</td>
                                    <td>ল্যাপটপ</td>
                                </tr>
                                <tr>
                                    <td><input type="number" class="contentBoxInput w-25"
                                               v-model="data.institutes_computer_lab_infos.computer_working"/></td>
                                    <td><input type="number" class="contentBoxInput w-25"
                                               v-model="data.institutes_computer_lab_infos.laptop_working"/></td>
                                    <td><input type="number" class="contentBoxInput w-25"
                                               v-model="data.institutes_computer_lab_infos.computer_workable"/></td>
                                    <td><input type="number" class="contentBoxInput w-25"
                                               v-model="data.institutes_computer_lab_infos.computer_notworking"/></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <label>৩.১.৪ কম্পিউটার প্রদানকারী সংস্থা অনুযায়ী সংখ্যা:</label>
                        <table class="table table-sm table-bordered text-center font-weight-bold">
                            <tr class="custom-table-header">
                                <td>সংস্থার নাম</td>
                                <td>শিক্ষা মন্ত্রণালয়</td>
                                <td>মাউশি</td>
                                <td>প্রকল্প</td>
                                <td>শিক্ষাবোর্ড</td>
                                <td>বিসিসি</td>
                                <td>এনজিও</td>
                                <td>ক্রয়কৃত</td>
                                <td>স্থানীয় সরকার</td>
                                <td>অন্যান্য</td>
                            </tr>
                            <tr>
                                <td class="custom-table-header">সংখ্যা</td>
                                <td>
                                    <input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.moe"/>
                                </td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.dshe"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.com_project"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.board"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.bcc"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.ngo"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.bought"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.local_govt"/></td>
                                <td><input type="number" class="contentBoxInput w-50"
                                           v-model="data.institutes_computer_lab_infos.other"/></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            {{--Multimedia Classroom/Projector--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.২</span>
                    </div>
                    <div class="form-control bg-number-label">মাল্টিমিডিয়া ক্লাসরুম সংক্রান্ত / মাল্টিমিডিয়া মাধ্যমে ডিজিতাল কন্টেন্ট ক্লাস পরিচালনা সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <td class="">
                                <label for="multimediaClassroom">৩.২.১ মাল্টিমিডিয়া ক্লাসরুমের সংখ্যা</label>
                                <input style="width: 40px;" id="multimediaClassroom" type="number"
                                       v-model="data.multimedia_infos.class_room_multimedia"/>
                            </td>
                            <td>
                                ৩.২.২ মাল্টিমিডিয়া ক্লাসরুম ব্যবহারে সক্ষম শিক্ষকের সংখ্যা:
                                মোট:<input style="width: 40px;" id="" type="number"
                                           v-model="data.multimedia_infos.mult_expert_teach_tot"/> &nbsp;&nbsp;
                                মহিলা:<input style="width: 40px;" id="" type="number"
                                             v-model="data.multimedia_infos.mult_expert_teach_fem"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <label for="">৩.২.৩ মাল্টিমিডিয়া ব্যবহার করে প্রতিদিন কয়টি ক্লাস নেওয়া হয়</label>
                                <input style="width: 40px;" id="" type="number"
                                       v-model="data.multimedia_infos.multimedia_class_num"/> টি
                            </td>
                            <td>
                                ৩.২.৪ মাল্টিমিডিয়া ব্যবহার করে ক্লাস নেওয়ার পর ড্যাসবোর্ডে এন্ট্রি দেওয়া হয় কি?
                                <select class="" id="dashboardEntry" v-model="data.multimedia_infos.dashboard_entry_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="">
                                <label for="projectorYN">৩.২.৫ মাল্টিমিডিয়া প্রজেক্টর আছে কি?</label>
                                <select class="" id="projectorYN"
                                        v-model="data.multimedia_infos.multimedia_projector_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td class="">
                                <label for="">৩.২.৬ মাল্টিমিডিয়া প্রজেক্টরের সংখ্যা</label>
                                <input style="width: 40px;" id="" type="number"
                                       v-model="data.multimedia_infos.multimedia_projector_number"/> টি
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{--ICT--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৩</span>
                    </div>
                    <div class="form-control bg-number-label">আইসিটি সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td>
                                <label>৩.৩.১ আইসিটি বিষয়ে পাঠদান করা হয় কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_ict_infos.computer_teaching_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৩.২ আইসিটি বিষয়ে শিক্ষক আছে কি?</label>
                                <select class="" v-model="data.institutes_ict_infos.comp_teacher_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label> ৩.৩.৩ উওর হ্যাঁ হলে, আইসিটি বিষয়ে পাঠদানকারী শিক্ষকের শিক্ষাগত যোগ্যতা কী (সর্বোচ্চ)?</label>
                                <select class="">
                                    <option value="1">১. স্নাতক (পাস)</option>
                                    <option value="2">২. বিএসসি ইঞ্জি:(কম্পিউটার)</option>
                                    <option value="3">৩. ডিপ্লোম ইঞ্জি:(কম্পিউটার)</option>
                                    <option value="4">৪. স্নাতকোত্তর </option>
                                    <option value="5">৫. স্নাতক সম্মান</option>
                                    <option value="6">৬. অন্যান্য</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="ictTeacherYN">৩.৩.৪ NTRCA কর্তৃক আইসিটি বিষয়ে নিয়োগকৃত শিক্ষক আছে
                                    কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.comp_teacher_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td v-if="data.institutes_ict_infos.comp_teacher_yn =='1'">
                                <label for="ictTeacherQualification">৩.৩.৫ NTRCA কর্তৃক আইসিটি বিষয়ে নিয়োগকৃত শিক্ষকের
                                    শিক্ষাগত যোগ্যতা কী (সর্বোচ্চ)?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.comp_teacher_qual">
                                    <option value="1">১. স্নাতক (পাস)</option>
                                    <option value="2">২. বিএসসি ইঞ্জি:(কম্পিউটার)</option>
                                    <option value="3">৩. ডিপ্লোম ইঞ্জি:(কম্পিউটার)</option>
                                    <option value="4">৪. স্নাতোত্তর</option>
                                    <option value="5">৫. স্নাতক সম্মান</option>
                                    <option value="6">৬. অন্যান্য</option>
                                </select>
                            </td>
                        </tr>
                        <tr v-if="data.institutes_ict_infos.comp_teacher_yn =='2'">
                            <td>
                                <label for="nonIctTeacherQualification">৩.৩.৪.১ আইসিটি বিষয়ে নিয়োগকৃত নয় এমন আইসিটি
                                    শিক্ষকের
                                    শিক্ষাগত যোগ্যতা কী (সর্বোচ্চ)?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_ict_infos.comp_teacher_other_edu">
                                    <option value="1">১. স্নাতক (পাস)</option>
                                    <option value="4">২. স্নাতকোত্তর</option>
                                    <option value="5">৩. অন্যান্য</option>
                                </select>
                            </td>
                            <td>
                                <label for="ictTeacherTraining">৩.৩.৪.২ আইসিটি বিষয়ে নিয়োগকৃত নয় এমন আইসিটি শিক্ষক কী
                                    ধরনের
                                    প্রশিক্ষণ গ্রহণ করেছেন</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.comp_training_type">
                                    <option value="1">১. সার্টিফিকেট কোর্স</option>
                                    <option value="2">২. ডিপ্লোমা কোর্স</option>
                                    <option value="3">৩. অন্যান্য</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="shikkhokBatayonYN">৩.৩.৬ প্রতিষ্ঠানের শিক্ষকগণ শিক্ষক বাতায়নের সদস্য
                                    কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_ict_infos.tea_socity_member_yn">
                                    <option value="1"> হ্যাঁ</option>
                                    <option value="2"> না</option>
                                </select>
                            </td>
                            <td>
                                <div class="">
                                    <label for="shikkhokBatayonTeacher">৩.৩.৭ শিক্ষক বাতায়নে সদস্য শিক্ষকের
                                        সংখ্যা</label><br>
                                    মোট:<input class="contentBoxInput" id="" style="width: 50px;" type="number"
                                               v-model="data.institutes_ict_infos.tea_socity_member_total"/> জন
                                    মহিলা:<input class="contentBoxInput" id="" style="width: 50px;" type="number"
                                                 v-model="data.institutes_ict_infos.tea_socity_member_female"/> জন
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৩.৮ প্রতিষ্ঠানে ডিজিটাল হাজিরা ব্যবহৃত হয় কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_ict_infos.digital_attendance_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="digitalHajiraType">৩.৩.৯ প্রতিষ্ঠানে ডিজিটাল হাজিরা কাদের জন্য ব্যবহৃত
                                    হয়?</label>
                                <div class="row">
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.digital_attendance_std"/>&nbsp;
                                        শিক্ষার্থীর জন্য
                                    </div>
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.digital_attendance_staff"/>&nbsp;
                                        শিক্ষক ও কর্মচারীর জন্য
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="internetYN">৩.৩.১০ ইন্টারনেট সংযোগ আছে কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.internet_conn_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="wifiYN">৩.৩.১১ প্রতিষ্ঠানে WiFi সংযোগ আছে কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.wifi_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="ccCameraYN">৩.৩.১২ প্রতিষ্ঠানে সিসি ক্যামেরা আছে কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.cc_camera_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৩.১৩ প্রতিষ্ঠানে সিসি ক্যামেরার সংখ্যা?</label>
                                <input class="contentBoxInput" style="width: 50px;" type="number"
                                       v-model="data.institutes_ict_infos.cc_camera_num"/> টি
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="internetType">৩.৩.১৪ ইন্টারনেট সংযোগের ধরণ?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.internet_conn_type">
                                    <option value="MODEM">১-মডেম</option>
                                    <option value="BROAD BAND">২-ব্রডব্যান্ড</option>
                                </select>
                            </td>
                            <td>
                                <label for="bandwidth">৩.৩.১৫ ইন্টারনেট সংযোগ ব্রডব্যান্ড হলে ব্যান্ডউইথ কত?</label>
                                <input class="contentBoxInput" style="width: 50px;"
                                       v-model="data.institutes_ict_infos.bandwith_mpbs" type="number"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">
                                <label>৩.৩.১৬ Pedagogical(শিখন-শেখানো) কাজে কম্পিউটার ব্যবহৃত
                                    হয়
                                    কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.padago_computer_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="computerInPedagogyAmount">৩.৩.১৭ শিখন-শেখানো কাজে ব্যবহহৃত কম্পিউটার
                                    সংখ্যা?</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>ডেস্কটপ</td>
                                        <td>ল্যাপটপ</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="contentBoxInput w-25" id="" type="number"
                                                   v-model="data.institutes_ict_infos.dsktop_padagogical"/></td>
                                        <td><input class="contentBoxInput w-25" id="" type="number"
                                                   v-model="data.institutes_ict_infos.laptop_padagogical"/></td>
                                        <td><input class="contentBoxInput w-25" id="" type="number"
                                                   v-model="data.institutes_ict_infos.padagogical_computer"/></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="internetInPedagogy">৩.৩.১৮ শিখন-শেখানো কাজে ইন্টারনেট ব্যবহৃত হয় কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.padago_internet_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="internetInPedagogyUser">৩.৩.১৯ শিখন-শেখানো কাজে ইন্টারনেট কে ব্যবহার
                                    করে?</label>
                                <div class="row">
                                    <div class="col">শিক্ষার্থী <input type="checkbox"
                                                                       v-model="data.institutes_ict_infos.padago_internet_std"/>
                                    </div>
                                    <div class="col">শিক্ষক <input type="checkbox"
                                                                   v-model="data.institutes_ict_infos.padago_internet_tea"/>
                                    </div>
                                    <div class="col">শিক্ষক ও শিক্ষার্থী <input type="checkbox"
                                                                                v-model="data.institutes_ict_infos.padago_internet_std_tea"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle">
                                <label for="computerBasicCourseYN">৩.৩.২০ প্রতিষ্ঠানটিতে Computer Basic Course পাঠদান
                                    করানো
                                    হয় কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.basic_course_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="computerBasicCourseStudents">৩.৩.২১ Computer Basic Course পাঠদানরত মোট
                                    শিক্ষার্থীর সংখ্যা?</label>
                                <table class="table-sm table-bordered text-center">
                                    <tr>
                                        <td>শ্রেণি</td>
                                        <td>মোট</td>
                                        <td>ছাত্রী</td>
                                    </tr>
                                    <tr>
                                        <td>৬ষ্ঠ-৮ম</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_total_6to8"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_female_6to8"/></td>
                                    </tr>
                                    <tr>
                                        <td>৯ম-১০ম</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_total_9to10"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_female_9to10"/></td>
                                    </tr>
                                    <tr>
                                        <td>১১তম-১২তম</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_total_11to12"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_female_11to12"/></td>
                                    </tr>
                                    <tr>
                                        <td>ফাজিল(পাস)</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_hn_pass"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_hn_pass_fem"/></td>
                                    </tr>
                                    <tr>
                                        <td>ফাজিল(সম্মান)</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_hn"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_hn_fem"/></td>
                                    </tr>
                                    <tr>
                                        <td>কামিল/স্নাতকোত্তর</td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_mas"/></td>
                                        <td><input class="contentBoxInput w-25" type="number"
                                                   v-model="data.institutes_ict_infos.basic_course_mas_fem"/></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{--Electricity--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৪</span>
                    </div>
                    <div class="form-control bg-number-label">বিদ্যুৎ সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <td>৩.৪.১ প্রতিষ্ঠানে বিদ্যুৎ সংযোগ আছে কি?
                                <select class="contentBoxInput" v-model="data.institutes_ict_infos.electricity_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td>৩.৪.২ প্রতিষ্ঠানে কোন ধরনের সংযোগ আছে?
                                <div class="row">
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.electricity_conn"/>&nbsp;
                                        বিদ্যুৎ
                                    </div>
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.solar_pannel_conn"/>&nbsp;
                                        সোলার প্যানেল
                                    </div>
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.generator_conn"/>&nbsp;
                                        ফুয়েল গ্যাস জেনারেটর
                                    </div>
                                    <div class="col"><input type="checkbox"
                                                            v-model="data.institutes_ict_infos.other_conn"/>&nbsp;
                                        অন্যান্য
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>৩.৪.৩ প্রতিষ্ঠানে সোলার প্যানেল আছে কি?<select class="contentBoxInput"
                                                                               v-model="data.institutes_ict_infos.solar_panel_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td>৩.৪.৪ সোলার প্যানেলে কতটি লাইট ফ্যান চলে?
                                <div class="row">
                                    <div class="col">ফ্যান: <input type="number" style="width: 50px;"
                                                                   v-model="data.institutes_ict_infos.solar_fan"/></div>
                                    <div class="col">লাইট: <input type="number" style="width: 50px;"
                                                                  v-model="data.institutes_ict_infos.solar_light"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{--Infrustructure AND Facilities--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৫</span>
                    </div>
                    <div class="form-control bg-number-label">অবকাঠামো/সুবিধা সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <div class="row">
                        <div class="col-md-6">
                            <label>৩.৫.১ প্রতিষ্ঠানের সীমানা প্রাচীর সংক্রান্ত তথ্য</label>
                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td>
                                        ৩.৫.২ প্রতিষ্ঠানের সীমানা প্রাচীর আছে কি?
                                        <select v-model="data.institutes_facilities_others.boundarywall_yn">
                                            <option value="1">হ্যাঁ</option>
                                            <option value="2">না</option>
                                        </select>
                                    </td>
                                    <td>
                                        ৩.৫.৩ উত্তর হ্যাঁ হলে, প্রাচীরের অবস্থাঃ
                                        <select v-model="data.institutes_facilities_others.boundary_status">
                                            <option value="">Select</option>
                                            <option value="1">সম্পূর্ণ</option>
                                            <option value="2">আংশিক</option>
                                        </select>
                                    </td>
                                    <td>
                                        ৩.৫.৪ প্রাচীরের ধরন
                                        <select v-model="data.institutes_facilities_others.boundary_type">
                                            <option value="">Select</option>
                                            <option value="1">পাকা</option>
                                            <option value="2">আধাপাকা</option>
                                            <option value="3">কাঁচা</option>
                                            <option value="4">প্রাকৃতিক</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label>৩.৫.৫ প্রতিষ্ঠানটির কী কী অবকাঠামো/ সুবিধা রয়েছে ?
                            </label>
                            <table class="table table-sm table-striped table-bordered">
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               v-model="data.institutes_facilities_others.shaid_menar_yn"
                                               style="width: 20px">
                                        <label class="label-number" for="">শহীদ মিনার</label>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               v-model="data.institutes_facilities_others.permanent_altar_yn"
                                               style="width: 20px">
                                        <label class="label-number" for="">পতাকা স্ট্যান্ড </label>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               v-model="data.institutes_facilities_others.sotota_store_yn"
                                               style="width: 20px">
                                        <label class="label-number" for="">সততা স্টোর</label>
                                    </td>
                                    <td>
                                        <input type="checkbox"
                                               v-model="data.institutes_facilities_others.gas_connection_yn"
                                               style="width: 20px">
                                        <label class="label-number" for="">গ্যাস সংযোগ</label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{--Drinking Water--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৬</span>
                    </div>
                    <div class="form-control bg-number-label">খাবার পানি সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <td class="align-middle">
                                <label>৩.৬.১ শিক্ষক ও শিক্ষার্থীদের জন্য নিরাপদ খাবার পানির ব্যবস্থা আছে কি ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.pure_drinking_water">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৬.২ উত্তর হাঁ হলে খাবার পানির উৎস কী ? (একাধিক হতে পারে)</label>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.kup">কূপ
                                        </td>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.tubewl">নলকূপ
                                        </td>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.deep_tubewel">গভীর
                                            নলকূপ
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.supply_water">সাপ্লাই পানি
                                        </td>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.jhorna">ঝর্ণা
                                        </td>
                                        <td><input class="mr-2" type="checkbox"
                                                   v-model="data.institutes_facilities_others.bottle_water">বোতল জাত
                                            পানি/পানির
                                            জার
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><input class="mr-2" type="checkbox"
                                                               v-model="data.institutes_facilities_others.rain_water">বৃষ্টির
                                            পানি
                                            হার্ভেস্টিং
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৬.৩ পানির উৎস নলকূপ হলে আর্সেনিক পরীক্ষা করা হয়েছে কি ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.arsenic_test">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৬.৪ পানির আর্সেনিক পরীক্ষার ফলাফল কী ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.arsenic_result">
                                    <option value="">Select</option>
                                    <option value="1">১-মাত্রা সহনীয়</option>
                                    <option value="2">২-মাত্রা অসহনীয়</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৬.৫ পানির ম্যাঙ্গানিজ পরীক্ষা করা হয়েছে কি ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.manganese_test">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৬.৬ পানির ম্যাঙ্গানিজ পরীক্ষার ফলাফল কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.manganese_result">
                                    <option value="">Select</option>
                                    <option value="1">১-মাত্রা সহনীয়</option>
                                    <option value="2">২-মাত্রা অসহনীয়</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>৩.৬.৭ পানি বিশুদ্ধকরণ মেশিন / সুবিধা আছে কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.water_purifier_machine">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            {{--Toilet Facilites--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৭</span>
                    </div>
                    <div class="form-control bg-number-label">টয়লেট ও ওয়াশব্লক সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <td class="align-middle">
                                <label>৩.৭.১ প্রতিষ্ঠানটিতে টয়লেট সুবিধা আছে কি?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.toilet_facilities_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td class="w-50">
                                <label>৩.৭.২ উত্তর হাঁ হলে কোন ধরনের টয়লেট (সংখ্যা)</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>স্লাব টয়লেট</td>
                                        <td>ফ্লাশসহ টয়লেট</td>
                                        <td>ফ্লাশ ছাড়া টয়লেট</td>
                                        <td>কাঁ‍‌‍‍‌‌‌চা টয়লেট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.slub_toilet"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_with_flash"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_without_flash"/>
                                        </td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.kacha_toilet"/></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৭.৩ অবস্থা অনুযায়ী টয়লেট সংখ্যা</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>ব্যবহার যোগ্য</td>
                                        <td>ব্যবহার অযোগ্য</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.usable_toilet"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.unusable_toilet"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.tot_us_toilet"/></td>
                                    </tr>
                                </table>
                            </td>
                            <td class="align-middle">
                                <label>৩.৭.৪ প্রতিষ্ঠান প্রধানের জন্য সংযুক্ত টয়লেটের সুবিধা আছে কি ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.attached_toilet_inst_head">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-middle"><label>৩.৭.৫ ছাত্রীদের জন্য পৃথক টয়লেটের ব্যবস্থা আছে কি ?</label>
                                <select class="contentBoxInput"
                                        v-model="data.institutes_facilities_others.female_seperate_toilet">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td><label>৩.৭.৬ ছাত্রীদের পৃথক টয়লেট সংখ্যা:</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>নতুন</td>
                                        <td>পুরাতন</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.female_toilet_new"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.female_toilet_old"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.female_toilet_total"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><label>৩.৭.৭ ছাত্রদের পৃথক টয়লেট সংখ্যা:</label>
                                <table class="table table-bordered table-sm text-center">
                                    <tr>
                                        <td>নতুন</td>
                                        <td>পুরাতন</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.male_toilet_new"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.male_toilet_old"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.male_toilet_total"/></td>
                                    </tr>
                                </table>
                            </td>
                            <td><label>৩.৭.৮ শিক্ষকদের পৃথক টয়লেট সংখ্যা:</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>নতুন</td>
                                        <td>পুরাতন</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.teacher_toilet_new"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.teacher_toilet_old"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.teacher_toilet_total"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><label>৩.৭.৯ কর্মচারীর পৃথক টয়লেট সংখ্যা:</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>নতুন</td>
                                        <td>পুরাতন</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_staff_new"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_staff_old"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_staff_total"/></td>
                                    </tr>
                                </table>
                            </td>
                            <td><label>৩.৭.১০ যৌথ ব্যবহার্য টয়লেট সংখ্যা:</label>
                                <table class="table table-sm table-bordered text-center">
                                    <tr>
                                        <td>নতুন</td>
                                        <td>পুরাতন</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_common_new"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_common_old"/></td>
                                        <td><input class="w-25"
                                                   v-model="data.institutes_facilities_others.toilet_common_total"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৭.১১ বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীদের জন্য পৃথক টয়লেট আছে কি ?</label>
                                <select class="" v-model="data.institutes_facilities_others.autistic_seperate_toilet">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৭.১২ টয়লেট পরিষ্কার পরিচ্ছন্ন রাখা হয় কি ?</label>
                                <select class="" v-model="data.institutes_facilities_others.toilet_common_clear">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>৩.৭.১৩ ব্যবহারের জন্য পর্যাপ্ত পানির ব্যবস্থা আছে কি ?</label>
                                <select class="" v-model="data.institutes_facilities_others.toilet_common_water">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.৭.১৪ প্রতিষ্ঠানে সাবান পানিসহ হাত ধোয়ার ব্যবস্থা আছে কি ?</label>
                                <select class="" v-model="data.institutes_facilities_others.handwash_facility_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>৩.৭.১৫ প্রতিষ্ঠানে সাবান পানিসহ হাত ধোয়ার ব্যবস্থা থাকলে কোন ধরনের ব্যবস্থা
                                    আছে</label>
                                <table>
                                    <tr>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_facilities_others.handwash_facility_boys"/>&nbsp;
                                            ছাত্রদের জন্য সাবান / সাবান জাতীয় উপাদান দিয়ে হাত ধোয়ার ব্যবস্থা
                                        </td>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_facilities_others.handwash_facility_girls"/>&nbsp;
                                            ছাত্রীদের জন্য সাবান / সাবান জাতীয় উপাদান দিয়ে হাত ধোয়ার ব্যবস্থা
                                        </td>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_facilities_others.handwash_facility_teachers"/>&nbsp;
                                            শিক্ষকদের জন্য সাবান / সাবান জাতীয় উপাদান দিয়ে হাত ধোয়ার ব্যবস্থা
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><label>৩.৭.১৬ ওয়াশ ব্লক আছে কি ?</label>
                                <select class="" v-model="data.institutes_facilities_others.wash_block_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                            <td><label>৩.৭.১৭ ওয়াশ ব্লক পরিষ্কার পরিচ্ছন্ন রাখা হয় কি ?</label>
                                <select v-model="data.institutes_facilities_others.wash_block_clean_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>৩.৭.১৮ ওয়াশ ব্লকের সংখ্যা ?</label>
                                <input type="number" style="width:50px; "
                                       v-model="data.institutes_facilities_others.wash_block_number"/> টি
                            </td>
                            <td><label>৩.৭.১৯ ওয়াশ ব্লক সংখ্যা পর্যাপ্ত কি ?</label>
                                <select v-model="data.institutes_facilities_others.wash_block_enough_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label>৩.৭.২০ ট্যাংক হতে ট্যাপের মাধ্যমে (Running Water)পানি সরবারহের
                                    ব্যবস্থা আছে কি ?</label>
                                <select v-model="data.institutes_facilities_others.running_water_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td><label>৩.৭.২১ প্রতিষ্ঠানের টয়লেট পেপারের সুবিধা/ব্যবস্থা আছে কি ?</label>
                                <select>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{--Library--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৮</span>
                    </div>
                    <div class="form-control bg-number-label">লাইব্রেরী সংক্রান্ত তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                ৩.৮.১ লাইব্রেরির জন্য পৃথক ভবন আছে কি?
                                <select v-model="data.institutes_libraries.seperate_building_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৮.২ লাইব্রেরির জন্য কক্ষ আছে কি?
                                <select v-model="data.institutes_libraries.library_yn">
                                    <option value="">select</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৮.৩ লাইব্রেরিতে বইয়ের সংখ্যা
                                <div class="row">
                                    <div class="col form-inline"><label class="label-number" for="">পাঠ্যপুস্তক</label>
                                        <input type="number" class="w-25 ml-2 "
                                               v-model="data.institutes_libraries.no_book"/></div>
                                    <div class="col form-inline"><label class="label-number" for="">সহায়ক</label>
                                        <input type="number" class="w-25 ml-2"
                                               v-model="data.institutes_libraries.no_additional_book"/></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ৩.৮.৪ শিক্ষার্থীদের লাইব্রেরি থেকে বই ইস্যু করা হয় কি?
                                <select v-model="data.institutes_libraries.book_issue_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৮.৫ উত্তর হ্যাঁ হলে, নিয়মিত বই ইস্যু করা হয় কি?
                                <select v-model="data.institutes_libraries.regular_issue_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৮.৬ উত্তর হ্যাঁ হলে, মাসে ইস্যুকৃত বই এর সংখ্যা
                                <input type="number" class="w-25"
                                       v-model="data.institutes_libraries.monthly_issue_book"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ৩.৮.৭ লাইব্রেরির পুস্তকাদির ক্যাটালগিং কম্পিউটারাইজড কি?
                                <select v-model="data.institutes_libraries.computerized_catelog_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td colspan="2">
                                ৩.৮.৮ লাইব্রেরি পরিচালনার জন্য সহকারী লাইব্রেরিয়ান আছে কি?
                                <select v-model="data.institutes_libraries.librarian_teacher_yn" style="width: 90px">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ৩.৮.৯ লাইব্রেরি বিষয়ে সহকারী লাইব্রেরিয়ানের প্রশিক্ষণ আছে কি?
                                <select v-model="data.institutes_libraries.training_yn" style="width: 90px">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td colspan="2">
                                ৩.৮.১০ লাইব্রেরি আওয়ার ক্লাস রুটিনে অনর্ভুক্ত আছে কি ?
                                <select v-model="data.institutes_libraries.lib_hour_inclusive_yn" style="width: 90px">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="languageClubYN">৩.৮.১১ প্রতিষ্ঠানে ল্যাংগুয়েজ ক্লাব আছে কি?</label>
                                <select class="contentBoxInput" v-model="data.institutes_libraries.language_club_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label for="languageClubType">৩.৮.১২ ল্যাংগুয়েজ ক্লাবে কোন ধরনের ভাষার চর্চা
                                    হয়?</label>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="checkbox" v-model="data.institutes_libraries.language_bangla"/>
                                            বাংলা
                                        </td>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_libraries.language_english"/> ইংরেজি
                                        </td>
                                        <td><input type="checkbox" v-model="data.institutes_libraries.language_arabic"/>
                                            আরবি
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_libraries.language_chinese"/> চাইনিজ
                                        </td>
                                        <td><input type="checkbox" v-model="data.institutes_libraries.language_korean"/>
                                            কোরিয়ান
                                        </td>
                                        <td><input type="checkbox" v-model="data.institutes_libraries.language_japan"/>
                                            জাপানি
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_libraries.language_russian"/> রুশ
                                        </td>
                                        <td><input type="checkbox"
                                                   v-model="data.institutes_libraries.language_spanish"/> স্প্যানিশ
                                        </td>
                                        <td><input type="checkbox" v-model="data.institutes_libraries.language_others"/>
                                            অন্যান্য
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
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
    <script src="{{ asset('js/thirdPage.js') }}" type="module"></script>
@endsection
