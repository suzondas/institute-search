@extends('components.template')
@section('content')
    <div class="" id="medicalBibidho">
        <h3 class="text-center">সেকশন-৩: বিবিধ তথ্য</h3>
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
            {{--Multimedia Classroom/Projector--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.১</span>
                    </div>
                    <div class="form-control bg-number-label">প্রতিষ্ঠান সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-bordered table-striped">

                        <tr>
                            <td>
                                <label>৩.১.১ প্রতিষ্ঠানটিতে লিফট চালু আছে কি? </label>
                                <select v-model="data.institutes_facilities_others.lift_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.১.২ উত্তর হ্যাঁ হলে লিফট সংখ্যা:</label>
                                <input type="number" class="w-25" v-model="data.institutes_facilities_others.lift_number"/>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="projectorYN">৩.১.৩ মাল্টিমিডিয়া প্রজেক্টর আছে কি?</label>
                                <select class="" id="projectorYN"
                                        v-model="data.multimedia_infos.multimedia_projector_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                <label>৩.১.৪ প্রতিষ্ঠানটিতে শিক্ষা উপকরণ সংরক্ষণের জন্য পৃথক কক্ষ আছে কি?</label>
                                <select
                                        v-model="data.institutes_facilities_others.equipment_room_yn">
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
                        <span class="input-group-text bg-number">৩.২</span>
                    </div>
                    <div class="form-control bg-number-label">বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীদের জন্য  </div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table table-bordered table-striped">
                    <tr>
                        <td>
                            <label>৩.২.১ বিশেষ চাহিদা সম্পন্ন শিক্ষার্থীদের জন্য পৃথক টয়লেট আছে কি ?</label>
                            <select class="" v-model="data.institutes_facilities_others.autistic_seperate_toilet">
                                <option value="1">হ্যাঁ</option>
                                <option value="2">না</option>
                            </select>
                        </td>
                        <td>৩.২.২ শারিরীক প্রতিবন্ধী শিক্ষার্থীর জন্য প্রতিষ্ঠানে/কক্ষে প্রবেশের জন্য বিশেষ ঢালু পথ
                            (ramp) আছে কি?
                            <select ng-model="data.instituteSpecialStudents.ramp_access_yn">
                                <option>Select</option>
                                <option value="1">হ্যাঁ-১</option>
                                <option value="2">না-২</option>
                            </select></td>
                    </tr>

                    </table>
                </div>
            </div>

            {{--Library--}}
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">৩.৩</span>
                    </div>
                    <div class="form-control bg-number-label">লাইব্রেরী সংক্রান্ত তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>
                                ৩.৩.১ লাইব্রেরির জন্য পৃথক ভবন আছে কি?
                                <select v-model="data.institutes_libraries.seperate_building_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৩.২ লাইব্রেরির জন্য পৃথক কক্ষ আছে কি?
                                <select v-model="data.institutes_libraries.library_yn">
                                    <option value="">select</option>
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৩.৩ লাইব্রেরিতে বইয়ের সংখ্যা
                                <div class="row">
                                    <input type="number" class="w-25 ml-2 "
                                           v-model="data.institutes_libraries.no_book"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ৩.৩.৪ শিক্ষার্থীদের লাইব্রেরি থেকে বই ইস্যু করা হয় কি?
                                <select v-model="data.institutes_libraries.book_issue_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৩.৫ উত্তর হ্যাঁ হলে, নিয়মিত বই ইস্যু করা হয় কি?
                                <select v-model="data.institutes_libraries.regular_issue_yn">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                ৩.৩.৬ লাইব্রেরি পরিচালনার জন্য লাইব্রেরিয়ান/নির্ধারিত শিক্ষক আছেন কি?
                                <select v-model="data.institutes_libraries.librarian_teacher_yn" style="width: 90px">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                            <td>
                                ৩.৩.৭ লাইব্রেরি বিষয়ে লাইব্রেরিয়ান/দায়িত্বপ্রাপ্ত শিক্ষকের প্রশিক্ষণ আছে কি?
                                <select v-model="data.institutes_libraries.training_yn" style="width: 90px">
                                    <option value="1">হ্যাঁ</option>
                                    <option value="2">না</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>

                {{--Curriculam--}}
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৪</span>
                        </div>
                        <div class="form-control bg-number-label">শিক্ষাক্রম সংক্রান্ত</div>
                    </div>
                    <div class="contentBoxBody">
                        <table class="table table table-bordered table-striped">
                           <tr>
                               <td>
                                   <label>৩.৪.১ প্রতিষ্ঠানে পাঠ পরিকল্পনা করা হয় কি? </label>
                                   <select class="contentBoxInput" v-model="data.summary_infos.education_plan_yn">
                                       <option value="1">হ্যাঁ</option>
                                       <option value="2">না</option>
                                   </select>
                               </td>
                               <td>
                                   <label>৩.৪.২ পূর্ববর্তী বছর কত কার্য দিবস পাঠদান করা হয়েছে </label>
                                   <input type="number" class="w-25" v-model="data.summary_infos.working_day_lastyr"/>
                               </td>
                           </tr>
                            <tr>
                                <td>
                                    <label>৩.৪.৩ কো-কারিকুলার কাযক্রম পরিচালিত হয় কি? </label>
                                    <select class="contentBoxInput" v-model="data.summary_infos.co_curricular_act_yn">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                                <td>
                                    <label>৩.৪.৪ উত্তর হ্যাঁ হলে কার্যক্রমগুলি কি কি? (টিক চিহৃ দিন)
                                    </label><br>
                                    <input type="checkbox" v-model="data.summary_infos.anual_sports"> বার্ষিক ক্রীড়া &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.dibet"> বিতর্ক &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.voolyball"> ভলিবল &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.anual_cultural"> বার্ষিক সাংস্কৃতিক
                                    <input type="checkbox" v-model="data.summary_infos.cricket"> ক্রিকেট &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.karam"> ক্যারাম &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.sciencefair"> বিজ্ঞান মেলা &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.football"> ফুটবল &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.handball"> হ্যান্ডবল &nbsp;
                                    <input type="checkbox" v-model="data.summary_infos.milad"> মিলাদ
                                    <input type="checkbox" v-model="data.summary_infos.indoregames"> অন্যান্য ইনডোর গেমস
                                    &nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>৩.৪.৫ শিক্ষার গুণগত মান বৃদ্ধির জন্য কী কী পদক্ষেপ নিয়েছেন (প্রতিষ্ঠান
                                        প্রধান) ?(In
                                        English Language with Capital Letter)</label>
                                    <table class="table table-bordered">
                                        <tr><input placeholder="১." class="w-100"
                                                   v-model="data.summary_infos.edu_improve_stap1"/></tr>
                                        <br>
                                        <tr><input placeholder="২." class="w-100"
                                                   v-model="data.summary_infos.edu_improve_stap2"/></tr>
                                        <br>
                                        <tr><input placeholder="৩." class="w-100"
                                                   v-model="data.summary_infos.edu_improve_stap3"/></tr>
                                        <br>
                                        <tr><input placeholder="৪." class="w-100"
                                                   v-model="data.summary_infos.edu_improve_stap4"/></tr>

                                    </table>
                                </td>
                                <td><label>৩.৪.৬ জাতীয় দিবসগুলো যথাযথভাবে পালন করা হয় কি?</label>
                                    <select class="contentBoxInput"
                                            v-model="data.summary_audit_infos.national_day_celebrate">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                            </tr>
                                    </table>
                    </div>
                </div>
                {{--Audit infos--}}
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৫</span>
                        </div>
                        <div class="form-control bg-number-label">অডিট সংক্রান্ত</div>
                    </div>
                    <div class="contentBoxBody">
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td><label> ৩.৫.১ প্রতিষ্ঠানটিতে বার্ষিক অডিট হয় কি?</label>
                                    <select class="contentBoxInput" v-model="data.summary_audit_infos.regular_audit_yn">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <td><label> ৩.৫.২ উত্তর হ্যাঁ হলে, অডিট আপত্তি আছে কি?</label>
                                    <select class="contentBoxInput" v-model="data.summary_audit_infos.audit_objection_yn">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                                <td><label>৩.৫.৩ অডিট আপত্তির টাকার অংক</label>
                                    <input type="number" class="w-25"
                                           v-model="data.summary_audit_infos.audit_objection_amt"/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>৩.৫.৪ অডিট আপত্তির বিষয়</label>
                                    <input type="text" class="w-50"
                                           v-model="data.summary_audit_infos.audit_objection_subject"/>
                                </td>
                                <td><label> ৩.৫.৫ বার্ষিক উন্নয়ন পরিকল্পনা প্রণয়ন করা হয় কি? </label>
                                    <select class="contentBoxInput" v-model="data.summary_audit_infos.anual_plan_yn">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{--service--}}
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৬</span>
                        </div>
                        <div class="form-control bg-number-label">কমিউনিটি সার্ভিস </div>
                    </div>
                    <div class="contentBoxBody">

                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td>
                                    ৩.৬.১ প্রতিষ্ঠানের সহায়তামূলক ও কমিউনিটি সার্ভিস গ্রহণকারী শিক্ষার্থী সংখ্যা:
                                </td>
                            </tr>
                            <tr>
                                <table class="table table-sm table-bordered table-striped">
                                    <tr>
                                        <td>সার্ভিসের ধরন</td>
                                        <td>রোভার স্কাউট</td>
                                        <td>বিএনসিসি</td>
                                        <td>রেড ক্রিসেন্ট</td>
                                        <td>ছাত্র সংসদ</td>
                                        <td>স্বাস্থ্য সেবা</td>
                                        <td>পরিবহন সুবিধা</td>
                                    </tr>
                                    <tr>
                                        <td>সদস্য/ছাত্র-ছাত্রীর সংখ্যা</td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.rover_scout"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.bncc"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.red_cresent"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.student_cabinat"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.health_service"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.community_service.transport"/></td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৭</span>
                        </div>
                        <div class="form-control bg-number-label">চিকিৎসা সুবিধা </div>
                    </div>
                    <div class="contentBoxBody">

                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td><label>৩.৭.১ প্রতিষ্ঠানটিতে চিকিৎসার জন্য আলাদা মেডিকেল সেন্টার/হাসপাতাল আছে
                                        কি?</label>
                                    <select class="contentBoxInput" v-model="data.medHealthFac.seperate_medical_yn">
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>৩.৭.২ উত্তর হ্যাঁ হলে মেডিকেল সেন্টার/হাসপাতাল এ চিকিৎসক, সেবক/সেবিকা, কর্মচারী ও
                                    অন্যান্য সুযোগ সংক্রান্ত তথ্য:</td>
                            </tr>
                            <tr>
                                <table class="table table-sm table-bordered table-striped">
                                    <tr>
                                        <td rowspan="2">অনুমোদিত ডাক্তার সংখ্যা</td>
                                        <td colspan="2">কর্তব্যরত ডাক্তার সংখ্যা</td>
                                        <td colspan="2">সেবক/সেবিকার সংখ্যা</td>
                                        <td colspan="2">কর্মচারী সংখ্যা</td>
                                        <td rowspan="2">বেডের সংখ্যা</td>
                                        <td rowspan="2">২০২০-২০২০ অর্থ বছরে চিকিৎসা প্রাপ্ত রোগীর সংখ্যা</td>
                                        <td rowspan="2">এ্যাম্বুলেন্সের সংখ্যা</td>
                                    </tr>
                                    <tr>
                                        <td>মোট</td>
                                        <td>মহিলা</td>
                                        <td>মোট</td>
                                        <td>মহিলা</td>
                                        <td>মোট</td>
                                        <td>মহিলা</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.permitted_doctors"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.working_doc_male"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.working_doc_female"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.nurse_male"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.nurse_female"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.staff_male"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.staff_female"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.bed_number"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.patient_treated"/></td>
                                        <td class="text-center"><input type="number" class="w-50"
                                                                       v-model="data.medHealthFac.ambulance_number"/></td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                        <label>৩.৭.৩ মেডিকেল সেন্টার/হাসপাতাল এর জন্য আলাদা বরাদ্দ আছে কি?</label>
                                        <select class="contentBoxInput" v-model="data.medHealthFac.seperate_fund_yn">
                                            <option value="1">হ্যাঁ</option>
                                            <option value="2">না</option>
                                        </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>৩.৭.৪ উত্তর হ্যাঁ হলে, ২০২০-২১ অর্থ বছরে বরাদ্দের পরিমাণ(টাকা)</label>
                                    <input type="number" class="w-25 ml-2 "
                                           v-model="data.medHealthFac.fund_amoount"/>
                                </td>
                                <td>
                                    <label>৩.৭.৫  ২০২০-২১ অর্থ বছরে খরচ(টাকা)</label>
                                    <input type="number" class="w-25 ml-2 "
                                           v-model="data.medHealthFac.cost_tk"/>
                                </td>
                            </tr>
                        </table>
                </div>
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৮</span>
                        </div>
                        <div class="form-control bg-number-label">পরিবহন সুবিধা </div>
                    </div>
                    <div class="contentBoxBody">

                        <table class="table table-sm table-bordered table-striped">

                            <tr>
                                <td><label> প্রতিষ্ঠানের পরিবহণ সুবিধা সংক্রান্ত তথ্য:</label></td>
                            </tr>
                            <tr>
                                <table class="table table-sm table-bordered table-striped">
                                    <tr>
                                        <td>কার সংখ্যা</td>
                                        <td>মাইক্রোবাসের সংখ্যা</td>
                                        <td>মিনিবাসের সংখ্যা</td>
                                        <td>জীপগাড়ির সংখ্যা</td>
                                        <td>অন্যান্য</td>
                                        <td>মোট</td>
                                    </tr>
                                    <tr>

                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.car_total"/></td>
                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.microbus_total"/></td>
                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.minibus_total"/></td>
                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.jeep_total"/></td>
                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.others_total"/></td>
                                        <td class="text-center"><input type="number" class="w-25"
                                                                       v-model="data.medTransFac.total_veichals"/></td>
                                    </tr>
                                </table>
                            </tr>

                        </table>

                    </div>
                </div>


            </div>
                {{--Covid-19 related info--}}
                <div class="contentBox">
                    <div class="input-group contentHeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৩.৯</span>
                        </div>
                        <div class="form-control bg-number-label">কোভিড-১৯ সংক্রান্ত</div>
                    </div>
                    <div class="contentBoxBody">
                        <table class="table table-sm table-bordered table-striped">

                            <tr>
                                <td>৩.৯.১ করোনাকালীন শিক্ষার্থীদের পড়াশোনার ক্ষেত্রে আপনার প্রতিষ্ঠানের ভূমিকা কী
                                    ছিল?</td>
                                <td>
                                    <label>৩.৯.২ সংসদ টেলিভিশনে প্রচারিত শিখন-শেখানো কার্যক্রমে আপনার শিক্ষা
                                        প্রতিষ্ঠানের
                                        শিক্ষার্থীদের অংশগ্রহণ কেমন?</label>
                                    <select class="contentBox" v-model="data.covid_infos.tv_prog_std_participant">
                                        <option value="Satisfaction">সন্তোষজনক-১</option>
                                        <option value="Average">মোটামুটি-২</option>
                                        <option value="Not Satisfaction">সন্তোষজনক নয়-৩</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.online_class_yn">অনলাইন
                                    ক্লাসের আয়োজন করা
                                    হয়েছে-১
                                </td>
                                <td>
                                    <label>৩.৯.৩ আপনার প্রতিষ্ঠানে স্বাস্থ্যবিধি নিশ্চিত করে পাঠদান কার্যক্রম
                                        পরিচালনা করা
                                        সম্ভব হচ্ছে কি না?</label>
                                    <select class="contentBox" v-model="data.covid_infos.class_start_yn">
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.tele_monitoring_yn">শিক্ষার্থীদের
                                    পড়াশোনার
                                    বিষয়ে টেলিফোনিক তদারকি করা হয়েছে-২
                                </td>
                            </tr>
                            <tr>
                                <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.lockdown_no_action_yn">লকডাউনের
                                    কারণে কোন উদ্যোগ
                                    নেওয়া যায়নি-৩
                                </td>
                            </tr>
                            <tr>
                                <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.online_exam_yn">অনলাইনে
                                    পরীক্ষা নিয়েছেন
                                    কিনা-৪
                                </td>
                            </tr>
                        </table>
                        <table class="table table-sm table-bordered table-striped">

                            <tr>
                                <td colspan="6" class="font-weight-bold">৩.৯.৪ করোনায় আক্রান্ত শিক্ষার্থী, শিক্ষক ও
                                    কর্মচারীদের তথ্য:</td>
                                <td colspan="6" class="font-weight-bold">৩.৯.৫ করোনায় মৃত্যুবরণকারী শিক্ষার্থী,
                                    শিক্ষক ও কর্মচারীদের তথ্য:</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">শিক্ষার্থী</td>
                                <td colspan="2">শিক্ষক</td>
                                <td colspan="2">কর্মচারী</td>
                                <td colspan="2">শিক্ষার্থী</td>
                                <td colspan="2">শিক্ষক</td>
                                <td colspan="2">কর্মচারী</td>
                            </tr>
                            <tr class="text-center">
                                <td>মোট</td>
                                <td>ছাত্রী</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>ছাত্রী</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                                <td>মোট</td>
                                <td>মহিলা</td>
                            </tr>
                            <tr class="text-center">
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_std_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_std_girl"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_tea_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_tea_female"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_staff_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.infected_staff_female"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_std_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_std_girl"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_tea_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_tea_female"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_staff_total"></td>
                                <td><input type="number" class="w-75" v-model="data.covid_infos.died_staff_female"></td>
                        </table>

                        <label class="font-weight-bold">৩.৯.৬ করোনার টিকাগ্রহণকারী শিক্ষার্থী, শিক্ষক এবং কর্মচারীদের
                            তথ্য</label>
                        <table class="table table-sm table-bordered table-striped">
                            <tr class="text-center">
                                <td colspan="4">শিক্ষার্থী</td>
                                <td colspan="4">শিক্ষক</td>
                                <td colspan="4">কর্মচারী</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">মোট</td>
                                <td colspan="2">ছাত্রী</td>
                                <td colspan="2">মোট</td>
                                <td colspan="2">ছাত্রী</td>
                                <td colspan="2">মোট</td>
                                <td colspan="2">ছাত্রী</td>
                            </tr>
                            <tr class="text-center">
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                                <td>১ম ডোজ </td>
                                <td>২য় ডোজ</td>
                            </tr>
                            <tr class="text-center">
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                                <td><input type="number" class="w-75" ></td>
                        </table>
                    </div>
                </div>
            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/medicalBibidho.js') }}" type="module"></script>
@endsection
