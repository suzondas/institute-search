@extends('components.template')
@section('content')
    <div class="container-fluid" id="medicalFirstPage">
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
                            <td class="text-center"><input type="text"  style="width:60px;" v-model="data.institutes.latitude"></td>
                            <td class="text-center"><input type="text"  style="width:60px;" v-model="data.institutes.longitude"></td>
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
                            <td colspan="2" class="font-weight-bold">১.১.১ প্রতিষ্ঠানের নাম:</td>
                        </tr>
                        <tr>

                            <td style="width:50%"><label class="" for=""> বাংলায় (অনুমতি/স্বীকৃতিপত্র/অধিভুক্তিপত্র
                                    অনুযায়ী অভ্র/ইউনিকোড ব্যবহার করে লিখুন):
                                </label>
                                <input type="text" class="w-50 form-control"
                                       v-model="data.institutes.institute_name_bangla">
                            </td>
                            <td>
                                <label class="" for="" style="text-align: right">ইংরেজিতে (ব্লক
                                    লেটার): </label>
                                &nbsp
                                <input type="text" class="w-75 form-control"
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
                                <input type="text" class="w-75 form-control" v-model="data.institutes.location">
                            </td>
                            <td>
                                <label class="" for="post_office">ডাকঘর:</label> &nbsp
                                <input type="text" class="w-75 form-control" v-model="data.institutes.post_office">
                            </td>
                            <td>
                                <label class="" for="post_code">পোস্ট কোড:</label> &nbsp
                                <input type="number" style="width: 60px" class="form-control" v-model="data.institutes.post_code">
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
                                <input type="number" class="form-control" style="width: 120px" v-model="data.institutes.mobphone">
                            </td>
                            <td>
                                <label class="" for="alt_mobile">বিকল্প মোবাইর নম্বর:</label> &nbsp
                                <input type="number" style="width: 120px" class="form-control"
                                       v-model="data.institutes.mobphone_alternate">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="" for="phone">ফোন:</label> &nbsp
                                <input type="number" class="form-control" style="width: 120px" v-model="data.institutes.telephone">
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
                                <input type="text" class="form-control" style="width: 50px"
                                       v-model="data.institutes.ec_national_code">
                            </td>
                            <td>
                                <label class="" for="constituency_dist">নির্বাচনী এলাকা (জেলা নম্বর):</label>
                                <input type="text" class="form-control" style="width: 100px"
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
                                <label class="" for="">১.২.১ প্রতিষ্ঠানের ধরনঃ</label>
                                <select class="" v-model="data.institutes.institute_type_id">
                                    <option value="">Select</option>
                                    <option value="13">১.মেডিক্যাল কলেজ</option>
                                    <option value="14">২.ডেন্টাল কলেজ </option>
                                </select>
                            </td>
                            <td>
                                <label class="label-date" for="establish_date">১.২.২ প্রতিষ্ঠার তারিখ :</label>
                                <div class="input-group date">
                                    <input style="width: 125px;" type="date" v-model="data.institutes.establish_date"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>১.২.৩ প্রতিষ্ঠান প্রধান </label>
                                <select
                                        v-model="data.institutes.head_status">
                                    <option value="1">ভারপ্রাপ্ত</option>
                                    <option value="2">নিয়োগপ্রাপ্ত</option>
                                </select>
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
                                    <label class="" for="management">১.৩.১ ব্যবস্থাপনা </label>
                                    <select class="" v-model="data.institutes.management">
                                        <option value="">Select</option>
                                        <option value="1">সরকারি</option>
                                        <option value="2">বেসরকারি</option>
                                        <option value="6">অন্যান্য</option>
                                    </select>
                                </td>
                                <td>
                                    <label  >১.৩.২ অধিভুক্তি সম্পর্কিত তথ্য </label>
                                    <select v-model="data.institutes.med_odhivukti">
                                        <option value="1">অধিভুক্তিপ্রাপ্ত</option>
                                        <option value="2">অধিভুক্তিপ্রাপ্ত নয়</option>
                                        <option value="3">অধিভুক্তি প্রক্রিয়াধীন</option>
                                    </select>
                                </td>

                                <td>
                                    <label>১.৩.৩ প্রতিষ্ঠানটি কোন এলাকায়?</label>
                                    <select class="" v-model="data.institutes.area_status1">
                                        <option value="">Select</option>
                                        <option value="1">গ্রামীণ</option>
                                        <option value="2">জেলা সদর পৌরসভা</option>
                                        <option value="3">উপজেলা সদর পৌরসভা</option>
                                        <option value="7">সিটি কর্পোরেশন</option>
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
                        <table class="table table-sm table-striped table-bordered">
                            <tr>
                                <td>
                                    <label>১.৪.১ কমিটির ধরন:</label>
                                    <select v-model="data.committees.type" style="width:120px">
                                        <option value="">Select</option>
                                        <option value="3">গর্ভনিং বডি</option>
                                        <option value="4">এডহক কমিটি</option>
                                        <option value="3">পরিচালনা পর্ষদ</option>
                                        <option value="5">বিশেষ </option>
                                        <option value="6">বর্তমান নাই</option>
                                    </select>
                                </td>
                                <td><label>১.৪.২ কমিটি থাকলে: </label>
                                    <table class="table table-sm table-bordered table-striped" style="text-align:center">
                                        <tr>
                                            <td>অনুমোদনের তারিখ</td>
                                            <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                        </tr>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input type="date" style="width: 130px;" v-model="data.committees.approve_date"/>
                                            </td>
                                            <td>
                                                <input type="date" style="width: 130px;" v-model="data.committees.expire_date"/>
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
                                    <input type="date" style="width: 130px;" v-model="data.committees.last_commitee_expire_date" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('cache/scsc.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/medicalFirstPage.js') }}" type="module"></script>

@stop
