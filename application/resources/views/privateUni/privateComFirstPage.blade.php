@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateComFirstPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 class="text-center" style="margin-top: 10px">সেকশন ১: মৌলিক তথ্য (ক)</h3>
            <div class="row">
                <div class="col-md-6">
                    <label for="">টিইআইআইএন (EIIN): &nbsp</label>
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
                    <table class="table table-bordered table-striped">
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
                                <input type="text" class="form-control" v-model="data.institutes.mobphone">
                            </td>
                            <td>
                                <label class="" for="alt_mobile">বিকল্প মোবাইর নম্বর:</label> &nbsp
                                <input type="text" class="form-control"
                                       v-model="data.institutes.mobphone_alternate">
                            </td>
                        </tr>
                        <tr>

                            <td>
                                <label class="" for="phone">ফোন:</label> &nbsp
                                <input type="text" class="form-control" v-model="data.institutes.telephone">
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
                                ১.২.১ প্রতিষ্ঠার তারিখ: &nbsp
                                <input type="date" v-model="data.institutes.establish_date"/>
                            </td>
                            <td colspan="2">
                                <label class="" for="">১.২.২ প্রতিষ্ঠানটি কোন এলাকায়:</label>
                                <select class="" v-model="data.institutes.area_status1">
                                    <option value="">Select</option>
                                    <option value="1">গ্রামীণ -১</option>
                                    <option value="2">জেলা সদর পৌরসভা -২</option>
                                    <option value="3">উপজেলা সদর পৌরসভা -৩</option>
                                    <option value="4">উপজেলা সদর পৌরসভা নয়-৪</option>
                                    <option value="5">মেট্রোপলিটন -৫</option>
                                    <option value="6">সিটি কর্পোরেশন-৬</option>
                                    <option value="7">অন্যান্য পৌর এলাকা-৭</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="" for="">১.২.৩ বিশ্ববিদ্যালয়ের ধরনঃ</label>
                                <select class="" v-model="data.institutes.univ_education_level_id">
                                    <option value="">Select</option>
                                    <option value="1">সাধারণ -১</option>
                                    <option value="2">প্রকৌশল-২</option>
                                    <option value="3">প্রযুক্তি-৩</option>
                                    <option value="4">বিজ্ঞান ও প্রযুক্তি-৪</option>
                                    <option value="5">ইসলামিক-৫</option>
                                    <option value="6">মেডিক্যাল-৬</option>
                                    <option value="7">কৃষি-৭</option>
                                    <option value="8">অন্যান্য-৮</option>
                                </select>
                            </td>
                            <td colspan="2">
                                <label class="" for="">১.২.৪ শিক্ষার্থীর ধরন:</label>
                                <select class="" v-model="data.institutes.for_whom">
                                    <option value="">Select</option>
                                    <option value="1">ছেলেদের জন্য-১</option>
                                    <option value="2">মেয়েদের জন্য-২</option>
                                    <option value="3">সহশিক্ষা একত্রে-৩</option>
                                    <option value="4">সহশিক্ষা আলাদা-৪</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label>১.২.৫ অনুমোদন:</label>
                                <select class="" v-model="data.institutes.recognition">
                                    <option value="">Select</option>
                                    <option value="1">অনুমোদন প্রাপ্ত-১</option>
                                    <option value="2">অনুমোদন প্রাপ্ত নয়-২</option>
                                    <option value="3">প্রক্রিয়াধীন-৩</option>
                                </select>
                            </td>
                            <td colspan="2">
                                ১.২.৬ সরকারি অনুমোদনের তারিখ: &nbsp
                                <input type="date" v-model="data.institutes.nationalization_date"/>
                            </td>
                        </tr>
                    </table>
                </div>
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
                                <label>১.৩.১ ভৌগলিক অবস্থান:</label> &nbsp;
                                <select v-model="data.institutes.geographical_status">
                                    <option value="">Select</option>
                                    <option value="1">সমতল</option>
                                    <option value="2">পাহাড়ি</option>
                                    <option value="3">সমুদ্র উপকূল</option>
                                    <option value="9">শিল্পাঞ্চল</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>১.৩.২ বিশ্ববিদ্যালয়টির সাথে বিদেশী বিশ্ববিদ্যালয়ের সনঝোতা স্বাক্ষর আছে কি?</label> &nbsp;
                                <select v-model="data.institutes.forgine_univ_attath_yn">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <label>১.৩.৩ উত্তর হ্যাঁ হলে বিশ্ববিদ্যালয়/বিশ্ববিদ্যালয়সমূহের নাম লিখুন: (ইংরেজি বড় অক্ষরে)</label>
                    <table class="table table-sm table-striped table-bordered text-center">
                        <tr>
                            <td>ক্রমিক</td>
                            <td>বিশ্ববিদ্যালয়ের নাম</td>
                            <td>দেশের নাম</td>
                        </tr>
                        <tr v-for="(item, index) in data.foreign_univ_institutes">
                            <td>@{{ index+1 }}</td>
                            <td><input type="text" class="w-100" v-model="item.univ_name" readonly/> </td>
                            <td><input type="text" class="w-50" v-model="item.country_name" readonly/> </td>
                        </tr>
                    </table>
                    <label>১.৩.৪ বিশ্ববিদ্যালয়টির অধীন অনুষদ, বিভাগ, ইনস্টিটিউট ও অন্যান্য প্রতিষ্ঠানের সংখ্যা:</label>
                    <table class="table table-sm table-striped table-bordered text-center">
                        <tr>
                            <td>অনুষদ সংখ্যা</td>
                            <td>বিভাগ সংখ্যা</td>
                            <td>ইনস্টিটিউট সংখ্যা</td>
                            <td>ক্যাম্পাস</td>
                        </tr>
                        <tr>
                            <td><input type="number" class="w-25" v-model="data.institutes.univ_anushad_no"/></td>
                            <td><input type="number" class="w-25" v-model="data.institutes.univ_dept_no"/></td>
                            <td><input type="number" class="w-25" v-model="data.institutes.univ_inst_no"/></td>
                            <td><input type="number" class="w-25" v-model="data.institutes.univ_branch_no"/></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <label>১.৩.৫ বিশ্ববিদ্যালয়টির পাঠদান পদ্ধতি:</label>
                                <select class="" v-model="data.institutes.univ_edu_type">
                                    <option value="">Select</option>
                                    <option value="1">সনাতন/কোর্স-১</option>
                                    <option value="2">সেমিস্টার-২</option>
                                    <option value="3">অন্যান্য</option>
                                </select>
                            </td>
                            <td>
                                ১.৩.৬ সেমিস্টার পদ্ধতি হলে বৎসরে কতটি সেমিস্টার:
                                <select class="" v-model="data.institutes.semister_no">
                                    <option value="">Select</option>
                                    <option value="1">১টি</option>
                                    <option value="2">২টি</option>
                                    <option value="3">৩টি</option>
                                    <option value="4">৪টি</option>
                                </select>
                            </td>
                            <td>
                                <label>১.৩.৭ পরিচালনা পর্ষদের ধরন: </label>
                                <select class="" v-model="data.institutes.uni_committee_type">
                                    <option value="">Select</option>
                                    <option value="1">সিন্ডিকেট-১</option>
                                    <option value="2">বোর্ড অব গভর্নরস-২</option>
                                    <option value="3">অন্যান্য-৩</option>
                                </select>

                            </td>
                            <td><label>১.৩.৮ পর্ষদ থাকলে সদস্য সংখ্যা:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="total"> মোট:</label>
                                        <input type="number" class="w-50"
                                               v-model="data.institutes.uni_member_total">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="female"> মহিলা: </label>
                                        <input type="number" class="w-50"
                                               v-model="data.institutes.uni_member_female">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
    <script src="{{ asset('js/privateComFirstPage.js') }}" type="module" defer></script>
@stop