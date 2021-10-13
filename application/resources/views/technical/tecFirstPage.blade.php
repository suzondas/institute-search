@extends('components.template')
@section('content')
    <div class="container-fluid" id="tecFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 class="text-center" style="margin-top: 10px">সেকশন ১: মৌলিক তথ্য (ক)</h3>
            <div v-if="errorMessage.length>0" style="background: #ff9d9d;padding:5px;">
                <h5 class="font-weight-bold">এই পাতার Observation</h5>
                <ul>
                    <li v-for="i in errorMessage">@{{ i }}</li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">ইআইআইএন (EIIN): &nbsp</label>
                    <input type="text" v-model="data.institutes.eiin" readonly disabled>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse">
                    <table class="" style="width:300px;" border="1">
                        <tr>
                            <td rowspan="2" class="align-middle">GIS(জিআইএস)</td>
                            <td class="text-center">অক্ষাংশ (Latitude)</td>
                            <td class="text-center">দ্রাঘিমাংশ(Longititude)</td>
                        </tr>
                        <tr>
                            <td><input type="text" class="" v-model="data.institutes.latitude"></td>
                            <td><input type="text" class=""  v-model="data.institutes.longitude"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">১.১</span>
                    </div>
                    <div class="form-control bg-number-label">সাধারণ তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td colspan="2" class="font-weight-bold">১.১.১ প্রতিষ্ঠানের নাম:</td>
                        </tr>
                        <tr>

                            <td style="width:50%"><label class="" for="bangla_name"> বাংলায় (অনুমতি/স্বীকৃতিপত্র
                                    অনুযায়ী অভ্র/ইউনিকোড ব্যবহার করে লিখুন):
                                </label>
                                <input type="text" class="form-control"
                                       v-model="data.institutes.institute_name_bangla">
                            </td>
                            <td>
                                <label class="" for="english_name" style="text-align: right">ইংরেজিতে (ব্লক
                                    লেটার): </label>
                                &nbsp
                                <input type="text" class="form-control"
                                       v-model="data.institutes.institute_name_new" disabled>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-bordered table-striped">
                        <tr>
                            <td colspan="5"><b>১.১.২ ঠিকানা:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="holding_no">হোল্ডিং নম্বর/রোড:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.location">
                            </td>
                            <td>
                                <label class="" for="post_office">ডাকঘর:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.post_office">
                            </td>
                            <td>
                                <label class="" for="post_code">পোস্ট কোড:</label> &nbsp
                                <input type="number" class="form-control" v-model="data.institutes.post_code">
                            </td>
                            <td>
                                <label class="" for="division">বিভাগ:</label>
                                <select v-model="data.institutes.division_id" class="form-control">
                                    <option v-for="option in data.division" v-bind:value="option.division_id">
                                        @{{ option.division_name }}
                                    </option>
                                </select>
                            </td>
                            <td>
                                <label class="" for="district">জেলা:</label>
                                <select v-model="data.institutes.district_id" class="form-control">
                                    <option v-for="option in data.district" v-bind:value="option.district_id">
                                        @{{ option.district_name }}
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="upazila">উপজেলা/থানা:</label>
                                <select v-model="data.institutes.thana_id" class="form-control">
                                    <option v-for="option in data.thana" v-bind:value="option.thana_id">
                                        @{{ option.thana_name }}
                                    </option>
                                </select>
                            </td>
                            <td>
                                <label class="" for="mouza">মৌজা:</label>
                                <select v-model="data.institutes.mauza_id" class="form-control">
                                    <option v-for="option in data.mauza" v-bind:value="option.mauza_id">
                                        @{{ option.mauza_name }}
                                    </option>
                                </select>
                            </td>
                            <td>
                                <label class="" for="union">ইউনিয়ন/ওয়ার্ড:</label>
                                <select v-model="data.institutes.union_id" class="form-control">
                                    <option v-for="option in data.union" v-bind:value="option.union_id">
                                        @{{ option.union_name }}
                                    </option>
                                </select>
                            </td>
                            <td>
                                <label class="" for="mobile">মোবাইল নম্বর:</label> &nbsp
                                <input type="number" class="form-control" v-model="data.institutes.mobphone">
                            </td>
                            <td>
                                <label class="" for="alt_mobile">বিকল্প মোবাইর নম্বর:</label> &nbsp
                                <input type="number" class="form-control"
                                       v-model="data.institutes.mobphone_alternate">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="phone">ফোন:</label> &nbsp
                                <input type="number" class="form-control" v-model="data.institutes.telephone">
                            </td>
                            <td>
                                <label class="" for="email">ই-মেইল:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.e_mail">
                            </td>
                            <td>
                                <label class="" for="website">ওয়েবসাইট:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.web_site">
                            </td>
                            <td>
                                <label class="" for="constituency_area">নির্বাচনী এলাকা (জাতীয় নম্বর):</label>
                                <input type="text" class="form-control"
                                       v-model="data.institutes.ec_national_code">
                            </td>
                            <td>
                                <label class="" for="constituency_dist">নির্বাচনী এলাকা (জেলা নম্বর):</label>
                                <input type="text" class="form-control"
                                       v-model="data.institutes.ec_district_code">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- General Info ends here--}}
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">১.২</span>
                    </div>
                    <div class="form-control bg-number-label">প্রতিষ্ঠান সংক্রান্ত তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td colspan="2">
                                <label class="" for="">১.২.১ প্রতিষ্ঠানের ধরনঃ</label>
                                <select class="" v-model="data.institutes.institute_type_id">
                                    <option value="">Select</option>
                                    <option value="5">৫.কারিগরি</option>
                                </select>
                                {{--<select class="" v-model="data.institutes.institute_type_id">--}}
                                    {{--<option value="">Select</option>--}}
                                    {{--<option value="1">১.পলিটেকনিক ইনস্টিটিউট</option>--}}
                                    {{--<option value="2">২.টেকনিক্যাল স্কুল এন্ড কলেজ</option>--}}
                                    {{--<option value="3">৩.টেকনিক্যাল ট্রেনিং সেন্টার</option>--}}
                                    {{--<option value="4">৪. কৃষি প্রশিক্ষণ ইনস্টিটিউট</option>--}}
                                    {{--<option value="5">৫. টেক্সটাইল ইনস্টিটিউট</option>--}}
                                    {{--<option value="6">৬. সার্ভে ইনস্টিটিউট</option>--}}
                                    {{--<option value="7">৭. গ্রাফিক আর্টস ইনস্টিটিউট</option>--}}
                                    {{--<option value="8">৮. নেভাল/মেরিন ইনস্টিটিউট</option>--}}
                                    {{--<option value="9">৯. হেলথ টেকনোলজি/মেডিক্যাল ইনস্টিটিউট</option>--}}
                                    {{--<option value="10">১০. টেক্সটাইল ভোক/ ইনস্টিটিউট</option>--}}
                                    {{--<option value="11">১১. এইসএসসি বিএম ইনস্টিটিউট/কলেজ</option>--}}
                                    {{--<option value="12">১২. প্রফেশনাল ডিপ্লোমা ইনস্টিটিউট</option>--}}
                                    {{--<option value="13">১৩. ফিশারিজ ইনস্টিটিউট </option>--}}
                                    {{--<option value="14">১৪. লাইভস্টক/এনিমেল হেলথ এন্ড প্রডাকশন ইনস্টিটিউট </option>--}}
                                    {{--<option value="15">১৫. ট্যুরিজম এন্ড হসপিটালিটি ইনস্টিটিউট </option>--}}
                                    {{--<option value="16">১৬. ইঞ্জিনিয়ারিং ইনস্টিটিউট(আর্মি) </option>--}}
                                    {{--<option value="17">১৭. এইচএসসি ভোক(৫৪)</option>--}}
                                    {{--<option value="18">১৮. ডিপ্লোমা ইন কমার্স(৯৪)ইনস্টিটিউট</option>--}}
                                    {{--<option value="19">১৯. এইচএসসি ভোক(৫৩)ইনস্টিটিউট</option>--}}
                                    {{--<option value="20">২০. দাখিল ভোক ইনস্টিটিউট</option>--}}
                                    {{--<option value="21">২১. ভোকেশনাল টিচার্স ট্রেনিং ইনস্টিটিউট</option>--}}
                                    {{--<option value="22">২২. টেকনিক্যাল টিচার্স ট্রেনিং কলেজ</option>--}}
                                    {{--<option value="23">২৩. এরোনটিক্যাল ইনস্টিটিউট</option>--}}
                                    {{--<option value="24">২৪. সার্টিফিকেট কোর্স</option>--}}
                                    {{--<option value="25">২৫. জাতীয় দক্ষতা মান</option>--}}
                                {{--</select>--}}
                            </td>

                            <td colspan="2">
                                <label class="" for="education_level">১.২.২ প্রতিষ্ঠানের স্তর :</label>
                                <select class="" v-model="data.institutes.education_level_id" >
                                    <option value="">Select</option>
                                    <option value="51">এসএসসি (ভোক)(১)</option>
                                    <option value="21">দাখিল(ভোক)(২)</option>
                                    <option value="54">এইসএসসি (ভোক)(৩)</option>
                                    <option value="52">এইসএসসি (বিএম)(৪)</option>
                                    <option value="94">এইচএসসি ডিপ্লোমা ইন কমার্স(৫)</option>
                                    <option value="67">ডিপ্লোমা(৬)</option>
                                    <option value="99">সার্টিফিকেট কোর্স ৬ মাস/এক বছর/দুই বছর(৭)</option>
                                    <option value="89">জাতীয় দক্ষতামান(এক বছর মেয়াদি)(৮)</option>
                                    <option value="48">জাতীয় দক্ষতামান/বেসিক(৩৬০ ঘন্টা)(৯)</option>
                                    <option value="33">স্নাতক পর্যায়(১০)</option>
                                    <option value="95">শিক্ষক প্রশিক্ষণ(১১)</option>
                                </select>
                            </td>
                            <td colspan="2">
                                <label>১.২.৩ প্রতিষ্ঠানের ধরন(স্তর অনুযায়ী)</label>
                                <select class="" name="type_name" v-model="data.institutes.type_name">
                                    <option value="">Select</option>
                                    <option value="HSC (BM) Institute/College">HSC (BM) Institute/College</option>
                                    <option value="Polytechnic Institute">Polytechnic Institute</option>
                                    <option value="Textile Institute">Textile Institute</option>
                                    <option value="HSC Diploma in Commerce Institute">HSC Diploma in Commerce Institute</option>
                                    <option value="Tourism and Hospitality Institute">Tourism and Hospitality Institute</option>
                                    <option value="National Skill Development">National Skill Development</option>
                                    <option value="SSC (Voc.) Institute">SSC (Voc.) Institute</option>
                                    <option value="Fisheries Institute">Fisheries Institute</option>
                                    <option value="Naval-Merine Institute">Naval-Merine Institute</option>
                                    <option value="Nursing Institute">Nursing Institute</option>
                                    <option value="Technical School and College">Technical School and College</option>
                                    <option value="Technical Training Center">Technical Training Center</option>
                                    <option value="Engineering College (Bachelors)">Engineering College (Bachelors)</option>
                                    <option value="Graphic Arts Institute">Graphic Arts Institute</option>
                                    <option value="Institute of Glass and Ceramic">Institute of Glass and Ceramic</option>
                                    <option value="Health Technology/Medical Institute">Health Technology/Medical Institute</option>
                                    <option value="Dakhil (Voc) Institute">Dakhil (Voc) Institute</option>
                                    <option value="Textile Vocational Institute">Textile Vocational Institute</option>
                                    <option value="Basic Trade/Certificate Training Institute/Center">Basic Trade/Certificate Training Institute/Center</option>
                                    <option value="Medical Assistant Training School">Medical Assistant Training School</option>
                                    <option value="Agriculture Training Institute">Agriculture Training Institute</option>
                                    <option value="Survey Institute">Survey Institute</option>
                                    <option value="Professional Diploma Institute">Professional Diploma Institute</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="label-date" for="establish_date">১.২.৪ প্রতিষ্ঠার তারিখ :</label> &nbsp
                                <div class="input-group date">
                                    <input type="date" v-model="data.institutes.establish_date"/>
                                </div>
                            </td>
                            <td colspan="2">
                                <label>১.২.৫ প্রতিষ্ঠানটিতে ইংরেজি ভার্সনে পাঠদান হয় কি?</label>
                                <select class="" name="english_ver_yn" v-model="data.institutes.english_ver_yn">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-striped table-bordered">
                     <tr>
                            <td colspan="6">
                                <label class="font-weight-bold" for="division">১.২.৬ প্রতিষ্ঠানে চলমান কারিকুলাম বা শিক্ষাক্রমসমূহ:</label>
                            </td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_tech_education"  >ডিপ্লোমা ইন টেকনিকাল এডুকেশন</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_voc_education">ডিপ্লোমা ইন ভোকেশনাল এডুকেশন</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_engineering" >ডিপ্লোমা ইন ইঞ্জিনিয়ারিং</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_textile" >ডিপ্লোমা ইন টেক্সটাইল ইঞ্জিনিয়ারিং</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_agriculture" >ডিপ্লোমা ইন এগ্রিকালচার</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_fisheries" >ডিপ্লোমা ইন ফিসারিজ(৯৩)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_fisheries_service" >ডিপ্লোমা ইন ফিসারিজ(ইন সার্ভিস)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_forestry" >ডিপ্লোমা ইন ফরেস্ট্রি</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_forestry_service"  >ডিপ্লোমা ইন ফরেস্ট্রি (ইন সার্ভিস) </td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_livestock"  >ডিপ্লোমা ইন লাইভস্টক</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_medical_tech" >ডিপ্লোমা ইন মেডিকেল টেকনোলজি</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_naval" >ডিপ্লোমা ইন ইঞ্জিনিয়ারিং(নেভাল)</td>
                        </tr>

                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_army" >ডিপ্লোমা ইন ইঞ্জি (আর্মি) </td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_tourism" >ডিপ্লোমা ইন ট্যুরিজম ও হসপিটালিটি</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_ultrasound"  >ডিপ্লোমা ইন মেডিকেল আলট্রাসাউন্ড</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_animal_service"  >ডিপ্লোমা ইন এনিমেল হেলথ এন্ড প্রোডাকশন (ইন সার্ভিস)</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_hsc_bm"  >এইচএসসি বিএম (৫৫) </td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_hsc_voc"  >এইচএসসি ভোক (৫৪)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dip_commerce"  >ডিপ্লোমা ইন কমার্স(৯৪)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_ssc_voc"  >এসএসসি ভোক (৫৩)</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_dakhil_voc" >দাখিল ভোক</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_certificate_marine"  >সার্টিফিকেট ইন মেরিন ট্রেড</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_skill_certificate"  >স্কিল সার্টিফিকেট কোর্স</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_certificate_voc"  >সার্টিফিকেট ইন ভোকেশনাল এডুকেশন</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_certificate_health"  >সার্টিফিকেট ইন হেলথ টেকনোলজি</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_certificate_poultry"  >সার্টিফিকেট ইন পোলট্রি ফার্মিং</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_certificate_animal_health"  >সার্টিফিকেট ইন এনিমেল হেলথ এন্ড প্রোডাকশন</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_national_skills2"  >জাতীয় দক্ষতামান-২</td>
                        </tr>
                        <tr>

                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_national_skills3"  >জাতীয় দক্ষতামান-৩</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_prof_dip_automobile"  >প্রোফেশনাল ডিপ্লোমা ইন অটোমোবাইল</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_ntvq" >NTVQF(Level:1-6)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_merin"  >মেরিন এন্ড শিপ বিল্ডিং ট্রেড সার্টিফিকেট</td>
                        </tr>
                        <tr>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_national_skills360"  >সার্টিফিকেট কোর্স(৩৬০ ঘন্টা)</td>
                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                       v-model="data.instCurriculums.el_advanced_certificate"  >এডভান্সড সার্টিফিকেট কোর্স</td>
                        </tr>

                    </table>
                </div>
                <div class="contentBox">
                    <div class="input-group contentdeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">১.৩ </span>
                        </div>
                        <div class="form-control bg-number-label">ব্যবস্থাপনা সংক্রান্ত:</div>
                    </div>
                    <div class="contentBoxBody">
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td>
                                    <label class="" for="management">১.৩.১ ব্যবস্থাপনা </label>
                                    <select class="" v-model="data.institutes.management">
                                        <option value="">Select</option>
                                        <option value="1">সরকারি</option>
                                        <option value="2">বেসরকারি</option>
                                        <option value="3">স্থানীয় সরকার</option>
                                        <option value="4">স্বায়ত্তশাসিত</option>
                                        <option value="5">খ্রিষ্টান মিশনারি</option>
                                        <option value="6">অন্যান্য</option>
                                    </select>
                                </td>
                                <td>
                                    <label class="" for="nationalization_date">১.৩.২ সরকারি হলে জাতীয়করণের তারিখ
                                        :</label>
                                    <input type="date" v-model="data.institutes.nationalization_date"/>
                                </td>
                                <td>
                                    <label>১.৩.৩ প্রতিষ্ঠানে শিক্ষার্থীর ধরন:</label>
                                    <select class="" v-model="data.institutes.for_whom">
                                        <option value="">Select</option>
                                        <option value="1">বালক</option>
                                        <option value="2">বালিকা</option>
                                        <option value="3">সহশিক্ষা একত্রে</option>
                                        <option value="4">সহশিক্ষা আলাদা</option>
                                    </select>
                                </td>
                                <td>
                                    <label>১.৩.৪ ভৌগলিক অবস্থান:</label>
                                    <select v-model="data.institutes.geographical_status">
                                        <option value="">Select</option>
                                        <option value="1">সমতল</option>
                                        <option value="2">পাহাড়ি</option>
                                        <option value="3">সমুদ্র উপকূল (বাঁধের ভিতর)</option>
                                        <option value="4">সমুদ্র উপকূল (বাঁধের বাইরে)</option>
                                        <option value="5">হাওড়/বিল(বাঁধের ভিতরে)</option>
                                        <option value="6">হাওড়/বিল(বাঁধের বাইরে)</option>
                                        <option value="7">চরাঞ্চল</option>
                                        <option value="8">জলাবদ্ধ এলাকা</option>
                                        <option value="9">শিল্পাঞ্চল</option>
                                        <option value="10">সীমান্ত এলাকা</option>
                                        <option value="11">চাবাগান</option>
                                        <option value="12">দ্বীপ</option>
                                        <option value="13">অন্যান্য</option>
                                    </select>
                                </td>
                            </tr>
                            <td>
                                <label>১.৩.৫ প্রতিষ্ঠানটি কোন এলাকায়?</label>
                                <select class="" v-model="data.institutes.area_status1">
                                    <option value="">Select</option>
                                    <option value="1">গ্রামীণ</option>
                                    <option value="2">জেলা সদর পৌরসভা</option>
                                    <option value="3">উপজেলা সদর পৌরসভা</option>
                                    <option value="4">উপজেলা সদর পৌরসভা নয়</option>
                                    <option value="5">মেট্রোপলিটন</option>
                                    <option value="6">অন্যান্য পৌর এলাকা</option>
                                    <option value="7">সিটি কর্পোরেশন</option>
                                </select>
                            </td>
                            <td>
                                ১.৩.৬ প্রশাসনিক ইউনিটের সাথে যোগাযোগ ব্যবস্থার ধরন:
                                <select class="" v-model="data.institutes.admin_unit_communication">
                                    <option value="">Select</option>
                                    <option value="1">উত্তম</option>
                                    <option value="2">মোটমুটি</option>
                                    <option value="3">দুর্গম</option>
                                </select>
                            </td>
                            <td>
                                <label>১.৩.৭ নিকটবর্তী অনুরুপ শিক্ষা প্রতিষ্ঠানের দূরত্ব: &nbsp;</label>
                                <input type="text" class="w-25" v-model="data.institutes.nearest_inst_distant"> কি.মি.
                            </td>
                            <td>
                                <label>১.৩.৮ মূল প্রতিষ্ঠান ব্যতীত অন্যত্র শাখা আছে কি</label>
                                <select class="" v-model="data.institutes.branch_yn">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>১.৩.৯ উত্তর হ্যাঁ হলে, শাখা সংখ্যা</label> &nbsp
                                    <input type="number" class="w-25" v-model="data.institutes.branch_no">
                                </td>
                                <td>
                                    <label>১.৩.১০ প্রতিষ্ঠানটিতে ডাবল-শিফট আছে কি? </label>
                                    <select v-model="data.institutes.double_shipt_yn">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                                <td>
                                    <label>১.৩.১১ প্রতিষ্ঠানটির নিজস্ব ক্যাম্পাস আছে
                                        কি?</label>
                                    <select v-model="data.institutes.campus_yn">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                                <td>
                                    ১.৩.১২ প্রতিষ্ঠানটির ক্যাম্পাস অন্য কোন শিক্ষা প্রতিষ্ঠান আছে?
                                    <select v-model="data.institutes.attach_inst_yn">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                            <tr>
                                <td>
                                    <label>১.৩.১৩ উত্তর হ্যাঁ হলে, প্রতিষ্ঠানটির ধরন: </label>
                                    <select v-model="data.institutes.attached_inst_type">
                                        <option value="" selected>Select</option>
                                        <option value="1">প্রাথমিক বিদ্যালয়</option>
                                        <option value="2">কিন্ডার গার্টেন</option>
                                        <option value="3">এবতেদায়ী মাদ্রাসা</option>
                                        <option value="4">মাধ্যমিক স্কুল</option>
                                        <option value="5">কলেজ</option>
                                        <option value="7">মাদ্রাসা</option>
                                        <option value="6">অন্যান্য</option>
                                    </select>
                                </td>
                                <td>
                                    <label>১.৩.১৪ প্রতিষ্ঠানটি এমপিওভুক্ত কি?</label>
                                    <select class="" v-model="data.institutes.mpo_status">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                        <option value="3">প্রযোজ্য নয়-৩</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-8">
                                <label class="font-weight-bold">১.৩.১৫ স্বীকৃতি সংক্রান্ত তথ্য (সরকারি প্রতিষ্ঠানের
                                    ক্ষেত্রে প্রযোজ্য নয়):</label>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                    <tr class="custom-table-header">
                                        <th style="text-align:center">স্তর</th>
                                        <th style="text-align:center">স্বীকৃতি/অনুমতি (টিক চিহ্ন দিন)</th>
                                        <th style="text-align:center">প্রথম অনুমতির তারিখ</th>
                                        <th style="text-align:center">প্রথম স্বীকৃতির তারিখ</th>
                                        <th style="text-align:center">সর্বশেষ স্বীকৃতি/ অনুমতি মেয়াদ শেষ হওয়ার তারিখ
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="item in data.institutes_recognition">
                                        <td>@{{ levelName(item.education_level_id) }}</td>
                                        <td><select class="" v-model="item.recognition_status">
                                                <option value="">Select</option>
                                                <option value="1">স্বীকৃতি প্রাপ্ত</option>
                                                <option value="2">অনুমতি প্রাপ্ত</option>
                                                <option value="3">প্রযোজ্য নয়</option>
                                            </select></td>
                                        <td>
                                            <input type="date" v-model="item.permitted_date" />
                                        </td>
                                        <td>
                                            <input type="date" v-model="item.recognition_date" />
                                        </td>
                                        <td>
                                            <input type="date" v-model="item.recognition_expire_date"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            <label class="font-weight-bold">১.৩.১৬ প্রতিষ্ঠানটি এমপিও ভূক্ত হলে স্তর ও তারিখ:</label>
                            <table class="table table-sm table-bordered text-center" v-if="data.institutes_mpo_status.length!=0">
                                <tr class="custom-table-header">
                                    <td>এমপিওভুক্তির স্তর</td>
                                    <td>এমপিও ভুক্তির তারিখ</td>
                                </tr>
                                <tbody>
                                <tr v-for="mpo in data.institutes_mpo_status">
                                    <td>@{{levelMpo(mpo.education_level_id) }}</td>
                                    <td>
                                        <input type="date" v-model="mpo.mpo_date"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p v-else="data.institutes_mpo_status.length==0">প্রযোজ্য নয়</p>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="contentBox">
                    <div class="input-group contentdeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">১.৪</span>
                        </div>
                        <div class="form-control bg-number-label">কমিটি সংক্রান্ত তথ্য</div>
                    </div>
                    <div class="contentBoxBody">
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td>
                                    <label>১.৪.১ কমিটির ধরন:</label>
                                    <select class="" v-model="data.committees.type" style="width:120px">
                                        <option value="">Select</option>
                                        <option value="1">ম্যানেজিং কমিটি</option>
                                        <option value="2">গর্ভনিং বডি</option>
                                        <option value="3">এডহক কমিটি</option>
                                        <option value="4">নির্বাহী কমিটি</option>
                                        <option value="5">প্রযোজ্য নয়</option>
                                        <option value="6">অন্যান্য</option>
                                    </select>
                                </td>
                                <td><label>১.৪.২ কমিটি থাকলে: </label>
                                    <table class="table table-bordered" style="text-align:center">
                                        <tr>
                                            <td>অনুমোদনের তারিখ</td>
                                            <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                        </tr>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="date" v-model="data.committees.approve_date"/>
                                            </td>
                                            <td>
                                                <input type="date" v-model="data.committees.expire_date"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td><label>১.৪.৩ কমিটিতে সদস্য সংখ্যা:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="total"> মোট:</label>
                                            <input type="number" class="form-control"
                                                   v-model="data.committees.total_member">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="female"> মহিলা: </label>
                                            <input type="number" class="form-control"
                                                   v-model="data.committees.total_female">
                                        </div>
                                    </div>
                                </td>
                                <td><label>১.৪.৪ কমিটি না থাকলে বিগত কমিটির মেয়াদ শেষ হওয়ার তারিখ</label>
                                    <input type="date" v-model="data.committees.last_commitee_expire_date" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"> ১.৪.৫ ২০২০ সালে ম্যানেজিং কমিটির কতটি সভা হয়েছে?
                                    <input type="number" class="w-25" v-model="data.committees.last_yr_meeting"> &nbsp; টি
                                </td>
                                <td colspan="2"> ১.৪.৬ ২০২০ সালে পিটিএ এর কতগুলো সভা হয়েছে?
                                    <input type="number" class="w-25" v-model="data.committees.last_yr_pta_meeting"> &nbsp; টি
                        </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="" for="meeting_discuss">১.৪.৭ ম্যানেজিং কমিটির সভায় শিক্ষার
                                        মানোন্নয়ন সম্পর্কিত বিষয়ে কী কী আলোচনা হয়েছে?</label>
                                    <table class="table table-bordered">

                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_teacher_training">শিক্ষক প্রশিক্ষণ
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_teacher_std_presents">শিক্ষক ও
                                                শিক্ষার্থীর উপস্থিতি
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_awarness_program">সচেতনতা মূলক
                                                কার্যক্রম
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_eve_teasing">ইভটিজিং
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_bulling_related">নিগ্রহ/পীড়ন
                                                (বুলিং)
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_early_marriage">বাল্যবিবাহ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_poor_std">পিছিয়ে পড়া
                                                শিক্ষার্থী
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_disabled_std">বিশেষ চাহিদা সম্পন্ন
                                                শিক্ষার্থী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_std_transport">শিক্ষার্থীদের
                                                যাতায়াতে
                                                নিরাপত্তা
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_anti_drug">মাদক বিরোধী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_dropout">ঝড়ে
                                                পড়া রোধ
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.mc_saferoad">নিরাপদ সড়ক
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                                   v-model="data.committees.mc_other">অন্যান্য
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td colspan="2">
                                    <label class="" for="pti_discuss">১.৪.৮ পিটিএ সভায় কী কী বিষয় আলোচনা ও সিদ্ধান্ত
                                        গৃহীত হয়েছ?</label>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_std_present">শিক্ষার্থীর
                                                উপস্থিতি
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.ptaawarnessprogram">সচেতনতামূলক
                                                কার্যক্রম
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_bulling_related">নিগ্রহ/পীড়ন
                                                (বুলিং)
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_early_marriage">বাল্যবিবাহ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_eve_teasing">ইভটিজিং
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_militant">জঙ্গীবাদ দমন
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_std_transport">শিক্ষার্থীদের
                                                যাতায়াতে নিরাপত্তা
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_anti_drug">মাদক বিরোধী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_acid_throw">এসিড নিক্ষেপ
                                            </td>
                                            <td colspan="2">
                                                <input class="mr-2" type="checkbox" true-value="1"  false-value="0"
                                                       v-model="data.committees.pta_other">অন্যান্য
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button> </div>

        </div>
    </div>
@endsection
@section('javascript')
   <script src="{{ asset('js/tecFirstPage.js') }}" type="module" defer></script>
@stop
