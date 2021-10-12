@extends('components.template')
@section('content')
    <div class="container" id="engComFirstPage">
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
                    <label for="">টিইআইআইএন (TEIIN): &nbsp</label>
                    <input class="font-weight-bold" type="text" v-model="data.institutes.teiin" readonly disabled>
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
                            <td>
                                <label>১.২.১ প্রতিষ্ঠানটি কোন এলাকায়?</label>
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
                                <label class="" for="education_level">১.২.২ প্রতিষ্ঠানের স্তর :</label>
                                <select class="" v-model="data.institutes.education_level_id" disabled>
                                    <option value="">Select</option>
                                    <option value="96">ও-লেভেল জুনিয়র</option>
                                    <option value="97">ও-লেভেল</option>
                                    <option value="98">এ-লেভেল</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label-date" for="establish_date">১.২.৩ প্রতিষ্ঠার তারিখ :</label> &nbsp
                                <div class="input-group date">
                                    <input type="date" v-model="data.institutes.establish_date"/>
                                </div>
                            </td>
                            <td>
                                <label>১.২.৪ প্রতিষ্ঠানের সর্বনিম্ন শ্রেণি</label>
                                <select class="" name="english_ver_yn" v-model="data.institutes.lowest_class_id">
                                    <option value="">Select</option>
                                    <option value="9601">PLAY</option>
                                    <option value="9602">NURSARY</option>
                                    <option value="9603">KG-1</option>
                                    <option value="9604">KG-2</option>
                                    <option value="9701">STANDARD-1</option>
                                    <option value="9702">STANDARD-2</option>
                                    <option value="9703">STANDARD-3</option>
                                    <option value="9706">STANDARD-4</option>
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
                                        <option value="2">প্রাইভেট</option>
                                        <option value="4">স্বায়ত্তশাসিত</option>
                                        <option value="5">খ্রিষ্টান মিশনারি</option>
                                        <option value="6">অন্যান্য</option>
                                    </select>
                                </td>

                                <td>
                                    <label>১.৩.২ প্রতিষ্ঠানে শিক্ষার্থীর ধরন:</label>
                                    <select class="" v-model="data.institutes.for_whom">
                                        <option value="">Select</option>
                                        <option value="1">বালক</option>
                                        <option value="2">বালিকা</option>
                                        <option value="3">সহশিক্ষা একত্রে</option>
                                        <option value="4">সহশিক্ষা আলাদা</option>
                                    </select>
                                </td>
                                <td>
                                    <label>১.৩.৩ প্রতিষ্ঠানের নিজস্ব ক্যাম্পাস আছে কি?</label>
                                    <select class="" v-model="data.institutes.campus_yn" style="width:120px">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                                <td>
                                    <label>১.৩.৪ শিফট সংখ্যা </label>
                                    <input type="number" class="w-25"
                                           v-model="data.institutes.shift_no">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="" for="management">১.৩.৫ স্বীকৃতি/নিবন্ধন </label>
                                    <select class="" v-model="data.institutes.recognition">
                                        <option value="">Select</option>
                                        <option value="1">১.এফিলিয়েশন</option>
                                        <option value="2">২.রেজিস্ট্রেশন</option>
                                        <option value="3">৩.কোনটিই না</option>
                                    </select>
                                </td>
                                <td>
                                    <label class="" for="management">১.৩.৬ রেজিস্ট্রেশন প্রদানকারী কর্তৃপক্ষ </label>
                                    <select class="" v-model="data.institutes.registration_authority">
                                        <option value="">Select</option>
                                        <option value="1">১.বৃটিশ কাউন্সিল</option>
                                        <option value="2">২.অস্ট্রেলিয়া</option>
                                        <option value="3">৩.ইন্টারন্যাশনাল স্কুল এক্সামিনেশনস সিন্ডিকেট</option>
                                        <option value="4">৪.অন্যান্য</option>
                                    </select>
                                </td>
                                <td>
                                    <label class="" for="management">১.৩.৭ অনুসরণকৃত কোর্স কারিকুলাম </label>
                                    <select class="" v-model="data.institutes.course_curriculam_authority">
                                        <option value="">Select</option>
                                        <option value="1">১.সিআইই/ কেমব্রিজ</option>
                                        <option value="2">২.এডেক্সেল/পিয়ারসন</option>
                                        <option value="3">৩.অস্ট্রেলিয়া </option>
                                        <option value="4">৪.আইবি সিস্টেম</option>
                                        <option value="5">৪.অন্যান্য</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

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
                                    <label>১.৪.১ কমিটি আছে কি?</label>
                                    <select class="" v-model="data.committees.commitee_status" style="width:120px">
                                        <option value="">Select</option>
                                        <option value="1">হ্যাঁ</option>
                                        <option value="2">না</option>
                                    </select>
                                </td>
                                <td><label>১.৪.২ কমিটিতে সদস্য সংখ্যা:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="total"> মোট:</label>
                                            <input type="number" class="w-25"
                                                   v-model="data.committees.total_member">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="female"> মহিলা: </label>
                                            <input type="number" class="w-25"
                                                   v-model="data.committees.total_female">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <label>১.৪.৩ কমিটির ধরন:</label>
                                    <select class="" v-model="data.committees.type" style="width:120px">
                                        <option value="">Select</option>
                                        <option value="1">ম্যানেজিং কমিটি</option>
                                        <option value="2">বোর্ড অব ডিরের্ক্টস</option>
                                        <option value="3">এডহক কমিটি</option>
                                        <option value="4">ইন্ট্রিপ্রিনিয়ারশিপ</option>
                                        <option value="5">ট্রাস্টিবোর্ড</option>
                                        <option value="6">বিশেষ কমিটি</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div align="center"><button type="button" @click="submitData" class="btn btn-success">Save and Next</button>
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('js/engComFirstPage.js') }}" type="module" defer></script>
@stop
