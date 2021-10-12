@extends('components.template')
@section('content')
    <div class="container-fluid" id="firstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 class="text-center" style="margin-top: 10px">মৌলিক তথ্য-১</h3>

            <div class="row">
                <div class="col-md-6">
                    <label for="">ইআইআইএন (EIIN): &nbsp</label>
                    <b>@{{ data.institutes.eiin }}</b>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse">
                    <table class="" style="width:300px;" border="1">
                        <tr>
                            <td rowspan="2" class="align-middle">GIS(জিআইএস)</td>
                            <td class="text-center">অক্ষাংশ(Latitude)</td>
                            <td class="text-center">দ্রাঘিমাংশ(Longititude)</td>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="number" style="width:60px;"
                                                           v-model="data.institutes.latitude"></td>
                            <td class="text-center"><input type="number" style="width:60px;"
                                                           v-model="data.institutes.longitude"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="contentBox">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">১.১</span>
                    </div>
                    <div class="form-control bg-number-label">সাধারণ তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td colspan="2" class="font-weight-bold custom-table-header">১.১.১ প্রতিষ্ঠানের নাম:</td>
                        </tr>
                        <tr>

                            <td style="width:50%"><label class="" for=""> বাংলায় (অনুমতি/স্বীকৃতিপত্র
                                    অনুযায়ী অভ্র/ইউনিকোড ব্যবহার করে লিখুন):
                                </label>
                                <input type="text" class="w-50 form-control"
                                       v-model="data.institutes.institute_name_bangla" maxlength="200">
                            </td>
                            <td>
                                <label class="" for="" style="text-align: right">ইংরেজিতে: </label>
                                &nbsp
                                <input type="text" class="w-75 form-control"
                                       v-model="data.institutes.institute_name_new" disabled>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-bordered table-striped">
                        <tr class="custom-table-header">
                            <td colspan="5"><b>১.১.২ ঠিকানা:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="holding_no">হোল্ডিং নম্বর/রোড:</label> &nbsp
                                <input type="text" class="w-75 form-control" v-model="data.institutes.location"
                                       maxlength="50">
                            </td>
                            <td>
                                <label class="" for="post_office">ডাকঘর:</label> &nbsp
                                <input type="text" class="w-75 form-control" v-model="data.institutes.post_office"
                                       maxlength="50">
                            </td>
                            <td>
                                <label class="" for="post_code">পোস্ট কোড:</label> &nbsp
                                <input type="number" style="width: 100px" class="form-control"
                                       v-model="data.institutes.post_code" maxlength="20">
                            </td>
                            <td>
                                <label class="" for="union">ইউনিয়ন/ওয়ার্ড:</label>
                                <input type="text" class="form-control" v-model="data.union.union_name" disabled/>
                            </td>
                            <td>
                                <label class="" for="mouza">মৌজা:</label>
                                <input type="text" class="form-control" v-model="data.mauza.mauza_name" disabled/>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label class="" for="upazila">উপজেলা/থানা:</label>
                                <input type="text" class="form-control" v-model="data.thana.thana_name" disabled/>
                            </td>
                            <td>
                                <label class="" for="district">জেলা:</label>
                                <input type="text" class="form-control" v-model="data.district.district_name" disabled/>
                            </td>
                            <td>
                                <label class="" for="division">বিভাগ:</label>
                                <input type="text" class="form-control" v-model="data.division.division_name" disabled/>
                            <td>
                                <label class="" for="mobile">মোবাইল নম্বর:</label> &nbsp
                                <input type="number" class="form-control text-right" v-model="data.institutes.mobphone">
                            </td>
                            <td>
                                <label class="" for="alt_mobile">বিকল্প মোবাইর নম্বর:</label> &nbsp
                                <input type="number" class="form-control text-right"
                                       v-model="data.institutes.mobphone_alternate">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="phone">ফোন:</label> &nbsp
                                <input type="number" class="form-control text-right" v-model="data.institutes.telephone"
                                       maxlength="20" :maxlength="20">
                            </td>
                            <td>
                                <label class="" for="email">ই-মেইল:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.e_mail" maxlength="50"
                                       :maxlength="50">
                            </td>
                            <td>
                                <label class="" for="website">ওয়েবসাইট:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.web_site"
                                       maxlength="100" :maxlength="100">
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-bordered table-striped">
                        <tr class="custom-table-header">
                            <td colspan="5"><b>১.১.৩ জাতীয় সংসদ নির্বাচনী এলাকা:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="constituency_area">নির্বাচনী এলাকা (জাতীয় নম্বর):</label>
                                <input type="text" class="" style="width: 100px"
                                       v-model="data.institutes.ec_national_code" maxlength="10" :maxlength="10">
                            </td>
                            <td>
                                <label class="" for="constituency_dist">নির্বাচনী এলাকা (জেলা নম্বর):</label>
                                <input type="text" class="" style="width: 100px" maxlength="10"
                                       :maxlength="10" v-model="data.institutes.ec_district_code">
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
                    <table class="table w-100 table-striped table-bordered">
                        <tr>
                            <td>
                                <label class="" for="">১.২.১ প্রতিষ্ঠানের ধরনঃ</label>
                                <select class="" v-model="data.institutes.institute_type_id" disabled>
                                    <option value="">Select</option>
                                    <option value="1">১.স্কুল</option>
                                    <option value="3">২.কলেজ</option>
                                    <option value="4">৩. স্কুল এন্ড কলেজ</option>
                                </select>
                            </td>

                            <td> <label> ১.২.২ প্রতিষ্ঠানের স্তর :</label>
                                <select style="width: 120px;" v-model="data.institutes.education_level_id" disabled>
                                    <option value="">Select</option>
                                    <option value="12">নিম্ন মাধ্যমিক</option>
                                    <option value="13">মাধ্যমিক</option>
                                    <option value="11">৮ম শ্রেণি পর্যন্ত সরকারি প্রাথমিক বিদ্যালয়</option>
                                    <option value="31">উচ্চ মাধ্যমিক</option>
                                    <option value="32">স্নাতক (পাস)</option>
                                    <option value="33">স্নাতক (সম্মান)</option>
                                    <option value="34">স্নাতকোত্তর</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="education_group">১.২.৩ গ্রুপ স্কুল শাখা (একাধিক হতে
                                    পারে):</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" true-value="1" false-value="0"
                                               v-model="data.institutes.arts_group"/>&nbsp; মানবিক
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" true-value="2" false-value="0"
                                               v-model="data.institutes.science_group"/>&nbsp; বিজ্ঞান
                                    </div>
                                    <div class="col-md-3">
                                        <input type="checkbox" true-value="3" false-value="0"
                                               v-model="data.institutes.commerce_group"/>&nbsp; ব্যবসায়
                                        শিক্ষা
                                    </div>
                                </div>
                            </td>
                            <td>
                                <label class="" for="education_group_col">১.২.৪ গ্রুপ কলেজ শাখা(একাধিক হতে
                                    পারে):</label>
                                <div class="row">
                                    <div class="col-md-3"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.arts_group_col"/> &nbsp;মানবিক
                                    </div>
                                    <div class="col-md-3"><input type="checkbox" true-value="2" false-value="0"
                                                                 v-model="data.institutes.science_group_col"/> &nbsp;বিজ্ঞান
                                    </div>
                                    <div class="col-md-3"><input type="checkbox" true-value="3" false-value="0"
                                                                 v-model="data.institutes.commerce_group_col"/> &nbsp;ব্যবসায়
                                        শিক্ষা
                                    </div>
                                    <div class="col-md-3"><input type="checkbox" true-value="4" false-value="0"
                                                                 v-model="data.institutes.social_science_group"/> &nbsp;সামাজিক
                                        বিজ্ঞান
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3"><input type="checkbox" true-value="5" false-value="0"
                                                                 v-model="data.institutes.islamic_stadies_group"/>
                                        &nbsp;ইসলামী
                                        শিক্ষা
                                    </div>
                                    <div class="col-md-3"><input type="checkbox" true-value="6" false-value="0"
                                                                 v-model="data.institutes.home_economic_group"/> &nbsp;গার্হস্থ্য
                                        বিজ্ঞান
                                    </div>
                                    <div class="col-md-3"><input type="checkbox" true-value="7" false-value="0"
                                                                 v-model="data.institutes.music_group"/>&nbsp; সংগীত
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="education_group_col">১.২.৫ সংযুক্ত কারিগরি শাখার ধরন (প্রযোজ্য
                                    ক্ষেত্রে):</label>
                                <div class="row">
                                    <div class="col-md-4"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.technical_branch_type"> &nbsp;এসএসসি
                                        (ভোক)
                                    </div>
                                    <div class="col-md-4"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.technical_branch_type_hscvoc">
                                        &nbsp;এইচএসসি(ভোক)
                                    </div>
                                    <div class="col-md-4"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.technical_branch_type_bm">
                                        &nbsp;এইচএসসি
                                        (বিএম)
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.technical_branch_type_fish">
                                        &nbsp;ডিপ্লোমা
                                        ইন ফিশারিজ
                                    </div>
                                    <div class="col-md-4"><input type="checkbox" true-value="1" false-value="0"
                                                                 v-model="data.institutes.technical_branch_type_agro">
                                        &nbsp;ডিপ্লোমা
                                        ইন এগ্রিকালচার
                                    </div>
                                </div>
                            </td>
                            <td>
                                <label class="label-date" for="establish_date">১.২.৬ প্রতিষ্ঠার তারিখ :</label> &nbsp
                                    <input style="width: 125px;" type="date" v-model="data.institutes.establish_date"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>১.২.৭ প্রতিষ্ঠানটিতে ইংরেজি ভার্সনে পাঠদান হয় কি?</label>
                                <select class="" name="english_ver_yn" v-model="data.institutes.english_ver_yn">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
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
                                        <option value="6">ক্যান্টনমেন্ট বোর্ড</option>
                                        <option value="7">এনজিও</option>
                                        <option value="8">অন্যান্য</option>
                                    </select>
                                </td>
                                <td>
                                    <label class="" for="nationalization_date">১.৩.২ সরকারি হলে জাতীয়করণের তারিখ
                                        :</label>
                                    <input type="date" style="width: 130px;"
                                           v-model="data.institutes.nationalization_date"/>
                                    <button @click="data.institutes.nationalization_date=null">Reset</button>

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
                                    <label>১.৩.৪ ভৌগোলিক অবস্থান:</label>
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
                            <tr>
                                <td>
                                    <label>১.৩.৫ প্রতিষ্ঠানটি কোন এলাকায়?</label>
                                    <select class="" v-model="data.institutes.area_status1">
                                        <option value="">Select</option>
                                        <option value="1">গ্রামীণ</option>
                                        <option value="2">জেলা সদর পৌরসভা</option>
                                        <option value="3">উপজেলা সদর পৌরসভা</option>
                                        <option value="4">উপজেলা সদর পৌরসভা নয়</option>
                                        {{--<option value="5">মেট্রোপলিটন -৫</option>--}}
                                        <option value="6">অন্যান্য পৌর এলাকা</option>
                                        <option value="7">সিটি কর্পোরেশন</option>
                                    </select>
                                </td>
                                <td>
                                   <label>১.৩.৬ প্রশাসনিক ইউনিটের সাথে যোগাযোগ ব্যবস্থার
                                    ধরন:</label>
                                    <select v-model="data.institutes.admin_unit_communication">
                                        <option value="">Select</option>
                                        <option value="1">উত্তম</option>
                                        <option value="2">মোটমুটি</option>
                                        <option value="3">দুর্গম</option>
                                    </select>
                                </td>
                                <td>
                                    <label>   ১.৩.৭ নিকটবর্তী অনুরুপ শিক্ষা প্রতিষ্ঠানের দূরত্ব:</label>
                                    <input type="text" style="width: 50px"
                                           v-model="data.institutes.nearest_inst_distant" maxlength="4" :maxlength="4">
                                    কি.মি.
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
                                    <label> ১.৩.১১ প্রতিষ্ঠানটির নিজস্ব ক্যাম্পাস আছে কি?</label>
                                    <select v-model="data.institutes.campus_yn">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                                <td>
                                    <label> ১.৩.১২ প্রতিষ্ঠানটির ক্যাম্পাস অন্য কোন শিক্ষা প্রতিষ্ঠান আছে?</label>
                                    <select v-model="data.institutes.attach_inst_yn">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>১.৩.১৩ প্রতিষ্ঠানটির ক্যাম্পাসে অন্য শিক্ষা প্রতিষ্ঠান থাকলে তার ধরন: </label>
                                    <select v-model="data.institutes.attached_inst_type">
                                        <option value="">Select</option>
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
                                    <label>  ১.৩.১৪ প্রতিষ্ঠানটি এমপিওভুক্ত কি? </label>
                                    <select class="" v-model="data.institutes.mpo_status">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                        <option value="3">প্রযোজ্য নয়-৩</option>
                                    </select>
                                </td>
                                <td colspan="2">
                                    <label>১.৩.১৫ কারিগরি শাখা এমপিওভুক্ত কি?</label>
                                    <select
                                            v-model="data.institutes.technical_branch_mpo_status">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ-১</option>
                                        <option value="2">না-২</option>
                                        <option value="3">প্রযোজ্য নয়-৩</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">১.৩.১৬ স্বীকৃতি সংক্রান্ত তথ্য (সরকারি প্রতিষ্ঠানের
                                    ক্ষেত্রে প্রযোজ্য নয়):</label>
                                <table class="table table-bordered table-striped">

                                    <tr class="custom-table-header">
                                        <td>স্তর</td>
                                        <td>স্বীকৃতি/অনুমতি (একটি নির্বাচন করুন)</td>
                                        <td>প্রথম অনুমতির তারিখ</td>
                                        <td>প্রথম স্বীকৃতির তারিখ</td>
                                        <td>সর্বশেষ স্বীকৃতি/ অনুমতি মেয়াদ শেষ হওয়ার তারিখ
                                        </td>
                                    </tr>
                                    <tbody>
                                    <tr v-for="item in data.institutes_recognition">
                                        <td class="text-left">@{{ levelName(item.education_level_id) }}</td>
                                        <td><select class="" v-model="item.recognition_status">
                                                <option value="">Select</option>
                                                <option value="1">স্বীকৃতি প্রাপ্ত</option>
                                                <option value="2">অনুমতি প্রাপ্ত</option>
                                                <option value="3">প্রযোজ্য নয়</option>
                                            </select></td>
                                        <td>
                                            <input type="date" style="width: 130px" v-model="item.permitted_date"/>
                                            <button @click="item.permitted_date=null">Reset</button>
                                        </td>
                                        <td>
                                            <input type="date" style="width: 130px" v-model="item.recognition_date"/>
                                            <button @click="item.recognition_date=null">Reset</button>
                                        </td>
                                        <td>
                                            <input type="date" style="width: 130px"
                                                   v-model="item.recognition_expire_date"/>
                                            <button @click="item.recognition_expire_date=null">Reset</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="font-weight-bold">১.৩.১৭ প্রতিষ্ঠানটি এমপিও ভূক্ত হলে স্তর ও
                                    তারিখ:</label>
                                <table class="table table-sm table-bordered text-center"
                                       v-if="data.institutes_mpo_status.length!=0">
                                    <tr class="custom-table-header">
                                        <td>এমপিওভুক্তির স্তর</td>
                                        <td>এমপিও ভুক্তির তারিখ</td>
                                    </tr>
                                    <tbody>
                                    <tr v-for="mpo in data.institutes_mpo_status">
                                        <td>@{{levelMpo(mpo.education_level_id) }}</td>
                                        <td>
                                            <input type="date" v-model="mpo.mpo_date"/>
                                            <button @click="mpo.mpo_date=null">Reset</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p v-else="data.institutes_mpo_status.length==0">প্রযোজ্য নয়</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">১.৩.১৮ শিক্ষার্থীর তথ্য (তিন বছরের তথ্য প্রদান করুন): </label>[স্তরভিত্তিক তথ্য (যেমন-নিম্ন মাধ্যমিক(৬ষ্ঠ-৮ম) এর ক্ষেত্রে তিন শ্রেণির শিক্ষার্থীর যোগফল) প্রদান করুন]
                                <table class="table table-sm table-striped table-bordered text-center">
                                    <tr class="custom-table-header">
                                        <td rowspan="2">বছর</td>
                                        <td rowspan="2">নিম্ন মাধ্যমিক (৬ষ্ঠ-৮ম)</td>
                                        <td rowspan="2"> মাধ্যমিক (৯ম-১০ম)</td>
                                        <td colspan="3">উচ্চ মাধ্যমিক (১১শ-১২শ)</td>
                                        <td colspan="3">ডিগ্রী (১৩শ-১৫শ)</td>
                                    </tr>
                                    <tr class="custom-table-header">
                                        <td>বিজ্ঞান</td>
                                        <td>মানবিক</td>
                                        <td>ব্যবসায় শিক্ষা</td>
                                        <td>বিজ্ঞান</td>
                                        <td>মানবিক</td>
                                        <td>ব্যবসায় শিক্ষা</td>
                                    </tr>
                                    <tr  v-for="item in data.inst_mpo_conditions">
                                        <td style="font-weight: bold">@{{ item.year }}</td>
                                        <td><input class="w-50" type="text" v-model="item.std_6_8"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_9_10"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_sc_11_12"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_ar_11_12"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_com_11_12"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_sc_13_15"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_ar_13_15"/></td>
                                        <td><input class="w-50" type="text" v-model="item.std_com_13_15"/></td>
                                    </tr>

                                </table>
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
                        <table class="table table-sm table-striped table-bordered">
                            <tr>
                                <td>
                                    <label>১.৪.১ কমিটির ধরন:</label>
                                    <select v-model="data.committees.type" style="width:120px">
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
                                    <table class="table table-sm table-bordered table-striped text-center" style="width: 400px;">
                                        <tr>
                                            <td>অনুমোদনের তারিখ</td>
                                            <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                        </tr>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="date" style="width: 130px;"
                                                       v-model="data.committees.approve_date"/>
                                                <button @click="data.committees.approve_date=null">Reset</button>

                                            </td>
                                            <td>
                                                <input type="date" style="width: 130px;"
                                                       v-model="data.committees.expire_date"/>
                                                <button @click="data.committees.expire_date=null">Reset</button>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td><label>১.৪.৩ কমিটিতে সদস্য সংখ্যা:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="total"> মোট:</label>
                                            <input type="number" class="w-75"
                                                   v-model="data.committees.total_member">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="female"> মহিলা: </label>
                                            <input type="number" class="w-75"
                                                   v-model="data.committees.total_female">
                                        </div>
                                    </div>
                                </td>
                                <td><label>১.৪.৪ কমিটি না থাকলে বিগত কমিটির মেয়াদ শেষ হওয়ার তারিখ</label>
                                    <input type="date" style="width: 130px;"
                                           v-model="data.committees.last_commitee_expire_date"/>
                                    <button @click="data.committees.last_commitee_expire_date=null">Reset</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div>
                                        <label>  ১.৪.৫ ২০২০ সালে ম্যানেজিং কমিটির কতটি সভা হয়েছে?</label>
                                        <input type="number" style="width: 50px;"
                                               v-model="data.committees.last_yr_meeting"> &nbsp;টি
                                    </div>

                                </td>
                                <td colspan="2">
                                    <div>
                                        <label>১.৪.৬ ২০২০ সালে পিটিএ এর কতগুলো সভা হয়েছে?</label>
                                        <input type="number" style="width: 50px;"
                                               v-model="data.committees.last_yr_pta_meeting"> &nbsp;টি
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="font-weight-bold" for="meeting_discuss">১.৪.৭ ম্যানেজিং কমিটির সভায়
                                        শিক্ষার
                                        মানোন্নয়ন সম্পর্কিত বিষয়ে কী কী আলোচনা হয়েছে?</label>
                                    <table class="table table-sm table-bordered table-striped">

                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_teacher_training">শিক্ষক প্রশিক্ষণ
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_teacher_std_present">শিক্ষক ও
                                                শিক্ষার্থীর উপস্থিতি
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_awarness_program">সচেতনতা মূলক
                                                কার্যক্রম
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_eve_teasing">ইভটিজিং
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_bulling_related">নিগ্রহ/পীড়ন
                                                (বুলিং)
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_early_marriage">বাল্যবিবাহ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_poor_std">পিছিয়ে পড়া
                                                শিক্ষার্থী
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_disabled_std">বিশেষ চাহিদা সম্পন্ন
                                                শিক্ষার্থী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_std_transport">শিক্ষার্থীদের
                                                যাতায়াতে
                                                নিরাপত্তা
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_anti_drug">মাদক বিরোধী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_dropout">ঝড়ে
                                                পড়া রোধ
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.mc_saferoad">নিরাপদ সড়ক
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input class="mr-2" type="checkbox" true-value="1"
                                                                   false-value="0"
                                                                   v-model="data.committees.mc_other">অন্যান্য
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td colspan="2">
                                    <label class="font-weight-bold" for="pti_discuss">১.৪.৮ পিটিএ সভায় কী কী বিষয় আলোচনা
                                        ও সিদ্ধান্ত
                                        গৃহীত হয়েছ?</label>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_std_present">শিক্ষার্থীর
                                                উপস্থিতি
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.ptaawarnessprogram">সচেতনতামূলক
                                                কার্যক্রম
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_bulling_related">নিগ্রহ/পীড়ন
                                                (বুলিং)
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_early_marriage">বাল্যবিবাহ
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_eve_teasing">ইভটিজিং
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_militant">জঙ্গীবাদ দমন
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_std_transport">শিক্ষার্থীদের
                                                যাতায়াতে নিরাপত্তা
                                            </td>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_anti_drug">মাদক বিরোধী
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
                                                       v-model="data.committees.pta_acid_throw">এসিড নিক্ষেপ
                                            </td>
                                            <td colspan="2">
                                                <input class="mr-2" type="checkbox" true-value="1" false-value="0"
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

            <div align="center" class="">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('cache/scsc.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/firstPage.js') }}" type="module" defer></script>
@stop
