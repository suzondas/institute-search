<template id="teacher-modal">
    <div class="modal modal-max" id="" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-max" role="document">
            <div class="modal-content modal-max">
                <div class="modal-header">
                    <h5 class="modal-title">শিক্ষক কর্মচারীর তথ্য</h5>
                </div>
                <div class="modal-body modal-max">
                    <div class="card">
                        <div class="card-header bg-info font-weight-bold">
                            <div class="row">
                                <label>সাধারণ তথ্য</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td class="text-right">শিক্ষক / কর্মচারীর নাম<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td>
                                        <input type="text" :maxlength="200"
                                               v-model="data.teach_name">
                                    </td>
                                    <td class="text-right"> পুরুষ / মহিলা :<span style="color:red;font-weight: bold;">*</span>
                                        <select v-model="data.sex">
                                            <option value="1">পুরুষ</option>
                                            <option value="2">মহিলা</option>
                                        </select></td>
                                    <td>
                                        বর্তমানে কর্মরত কি না ?<span style="color:red;font-weight: bold;">*</span>
                                        <select v-model="data.is_inactive">
                                            <option class="" value="Y">কর্মরত</option>
                                            <option class="" value="R">অবসরপ্রাপ্ত</option>
                                            <option class="" value="D">মৃত</option>
                                            <option class="" value="T">বদলি</option>
                                            <option class="" value="A">বহিঃস্কৃত</option>
                                            <option class="" value="S">সাময়িক বহিঃস্কৃত</option>
                                            <option class="" value="G">চাকুরি হতে ইস্তফা নিয়েছেন</option>
                                        </select>
                                    </td>
                                    <td class="text-right">জাতীয় পরিচয়পত্র নং (NID)<br>(১০/১৩/১৭ ডিজিট)<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><input type="text" v-model="data.nid" :maxlength="17"></td>
                                </tr>
                                <tr>
                                    <td class="text-right">ধর্ম<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><select v-model="data.religion">
                                            <option value="ISLAM">ISLAM</option>
                                            <option value="HINDUISM">HINDUISM</option>
                                            <option value="CHRISTIANITY">CHRISTIANITY</option>
                                            <option value="BUDDHISM">BUDDHISM</option>
                                            <option value="OTHERS">OTHERS</option>
                                        </select></td>
                                    <td class="text-right">পদবি<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td>
                                        <select v-model="data.desig_id"
                                                style="width:130px;">
                                            <option value=""></option>
                                            <option v-for="designation in designations"
                                                    v-bind:value="designation.designation_id">@{{
                                                designation.designation_name }}
                                            </option>
                                        </select>
                                    </td>
                                    <td class="text-right"> শিক্ষক / কর্মচারীর ধরন<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><select v-model="data.teacher_type">
                                            <option value="GENERAL">জেনারেল</option>
                                            <option value="TECHNICAL">কারিগরি</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td class="text-right">বিষয়<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td>
                                        <select v-model="data.subject_id"
                                                style="width:130px;">
                                            <option value=""></option>
                                            <option v-for="subject in subjects" v-bind:value="subject.subject_id">@{{
                                                subject.subject_name_eng }}
                                            </option>
                                        </select>
                                    </td>
                                    <td class="text-right">বিষয় (যদি list এ না থাকে)</td>
                                    <td><input type="text" :maxlength="80" v-model="data.other_subject">
                                        <br>
                                        ইংরেজীতে লিখুন<br>(সর্বোচ্চ ১০০ ক্যারেক্টার)
                                    </td>
                                    {{--<td><input type="text"></td>--}}
                                    <td class="text-right"> নিয়োগের ধরন<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><select v-model="data.recruitment_type">
                                            <option value="PERMANENT">নিয়মিত</option>
                                            <option value="PART TIME">খন্ডকালীন</option>
                                            <option value="NON PATTERN">প্যাটার্ন বহির্ভূত</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td class="text-right">চাকুরিতে
                                        প্রথম যোগদানের তারিখ
                                    </td>
                                    <td><input type="date"
                                               v-model="data.first_joining_date">
                                    </td>
                                    <td class="text-right">বর্তমান
                                        পদে যোগদানের তারিখ
                                    </td>
                                    <td><input type="date"
                                               v-model="data.current_joining_date">
                                    </td>
                                    <td class="text-right">জন্ম তারিখ<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><input type="date" v-model="data.dob">
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-right">মোবাইল নম্বর (NID দ্বারা রেজিষ্ট্রিকৃত)<span style="color:red;font-weight: bold;">*</span> </td>
                                    <td><input v-model="data.mobile_number" type="text" :maxlength="15">
                                    </td>
                                    <td class="text-right">মোবাইল ব্যাংকিং এর ধরন <br>(যদি থাকে)</td>
                                    <td><select v-model="data.mob_banking_type">
                                            <option value=""></option>
                                            <option value="bKash">bKash</option>
                                            <option value="Nagad">Nagad
                                            </option>
                                            <option value="OneBank">One Bank
                                            </option>
                                            <option value="Rocket">Rocket
                                            </option>
                                            <option value="SureCash">SureCash
                                            </option>
                                            <option value="UniCash">UniCash
                                            </option>
                                        </select></td>
                                    <td>বেতন EFT <br>এর মাধ্যমে হয়</td>
                                    <td><select v-model="data.salary_eft">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </td>
                                    {{--<td class="text-right">মোবাইল ব্যাংকিং নম্বর <br> (যদি থাকে)</td>
                                    <td><input  v-model="data.mobile_banking_num" type="text"></td>
                               --}} </tr>
                                <tr>
                                    <td class="text-right">জাতীয় বেতন গ্রেড</td>
                                    <td><input v-model="data.payscale" type="text" maxlength="8" :maxlength="8"/>
                                    </td>
                                    <td class="text-right">এমপিওভুক্তির তারিখ</td>
                                    <td><input type="date" v-model="data.mpo_date">
                                    </td>
                                    <td class="text-right">NTRCA সুপারিশকৃত নিয়োগ কিনা</td>
                                    <td><select v-model="data.ntrc_recruitment_yn">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select></td>
                                </tr>
                                <tr class="">
                                    <td class="text-right">NTRCA Reg. (যদি থাকে)</td>
                                    <td><input v-model="data.ntrca_reg" type="text" :maxlength="20">
                                    </td>
                                    <td class="text-right">Index নম্বর</td>
                                    <td><input v-model="data.index_no" type="text" :maxlength="10"></td>
                                    <td class="text-right">TIN নম্বর</td>
                                    <td><input v-model="data.tin_number" type="text" :maxlength="20">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-header bg-info font-weight-bold text-white">
                            <label>শিক্ষাগত যোগ্যতা/প্রশিক্ষণ সংক্রান্ত</label>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr class="">
                                    <td class="text-right">এস.এস.সি. / সমমান</td>
                                    <td><select v-model="data.ssc" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>

                                    <td class="text-right">এইচ এসসি / সমমান</td>
                                    <td><select v-model="data.hsc" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                    <td class="text-right">ডিপ্লোমা</td>
                                    <td><select v-model="data.diploma" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                </tr>
                                <tr class="">
                                    <td class="text-right"> প্রফেশনাল ডিপ্লোমা</td>
                                    <td><select v-model="data.prof_diploma">
                                            <option value=""></option>
                                            <option value="DUMS">D.U.M.S</option>
                                            <option value="DAMS">D.A.M.S</option>
                                            <option value="DHMS">D.H.M.S</option>
                                        </select></td>
                                    <td class="text-right"> প্রফেশনাল ডিগ্রী</td>
                                    <td><select v-model="data.prof_degree">
                                            <option value=""></option>
                                            <option value="MBBS">M.B.B.S</option>
                                            <option value="BUMS">B.U.M.S</option>
                                            <option value="BAMS">B.A.M.S</option>
                                            <option value="BHMS">B.H.M.S</option>
                                        </select></td>
                                    <td class="text-right">বিএসসি ইঞ্জিনিয়ার</td>
                                    <td><select v-model="data.bsc_eng" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                </tr>
                                <tr class="">
                                    <td class="text-right">স্নাতক পাস / ফাযিল</td>
                                    <td><select v-model="data.ba" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                    <td class="text-right">স্নাতক সম্মান</td>
                                    <td><select v-model="data.hons" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                    <td class="text-right">স্নাতকোত্তর /এমএস<br>/কামিল
                                    </td>
                                    <td><select v-model="data.mst" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                </tr>
                                <tr class="">
                                    <td class="text-right">বি.এজি.এড.</td>
                                    <td><select v-model="data.baged" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                    <td class="text-right">বি.এড.</td>
                                    <td><select v-model="data.bed" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                    <td class="text-right">এম.এড.</td>
                                    <td><select v-model="data.med" style="width: 100px;">
                                            <option value=""></option>
                                            <option class="" value="01">1ST</option>
                                            <option class="" value="02">2ND</option>
                                            <option class="" value="03">3RD</option>
                                            <option class="" value="04">A+</option>
                                            <option class="" value="05">A</option>
                                            <option class="" value="06">A-</option>
                                            <option class="" value="07">B</option>
                                            <option class="" value="08">C</option>
                                            <option class="" value="09">D</option>
                                        </select></td>
                                </tr>
                                <tr class="banglaText">
                                    <td class="text-right">দাওরায়ে হাদিস</td>
                                    <td><select v-model="data.daura_hadish">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select></td>
                                    <td class="text-right">এম ফিল</td>
                                    <td><select v-model="data.mphil"
                                                style="width: 100px;">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select></td>
                                    <td class="text-right">পিএইচডি</td>
                                    <td><select v-model="data.phd"
                                                style="width: 100px;">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select></td>
                                </tr>
                                <tr class="banglaText">
                                    <td class="text-right">অন্যান্য শিক্ষাগত যোগ্যতা<br>ইংরেজীতে লিখুন(সর্বোচ্চ ৩০০
                                        ক্যারেক্টার)
                                    </td>
                                    <td colspan="2">
                                <textarea style="width: 100%;height: 110px;"
                                          v-model="data.other_edu" :maxlength="100"></textarea>
                                    </td>
                                    <td class="text-right">প্রশিক্ষণের তথ্য:</td>
                                    <td colspan="2">
                                        <table class="table table-striped w-50">
                                            <tr v-for="(item,index)  in trainingArray">
                                                <td class="col-md-8">
                                                    <select v-model="trainingArray[index]">
                                                        <option v-for="training in trainings"
                                                                v-bind:value="training.training_id">@{{
                                                            training.training_name}}
                                                        </option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class=" btn btn-danger"
                                                            @click="trainingArray.splice(index,1)">
                                                        ডিলিট
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        <br>
                                        <button class="btn btn-success" @click="trainingArray.push(1)">প্রশিক্ষণ যোগ
                                            করুন
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color: gainsboro;">
                    <button type="button" class="btn btn-secondary" @click="$emit('cancel-update')">Ok</button>
                </div>
            </div>
        </div>
    </div>
</template>
