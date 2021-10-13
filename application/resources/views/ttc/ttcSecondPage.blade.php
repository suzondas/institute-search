@extends('components.template')
@section('content')
    <div class="container-fluid" style="font-size:13px !important;" id="ttcSecondPage">

        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 class="text-center" style="margin-top: 10px">সেকশন ১: মৌলিক তথ্য (খ)</h3>

            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">১.৫ </span>
                    </div>
                    <div class="form-control bg-number-label">জমি সংক্রান্ত তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="font-weight-bold">১.৫.১ জমির অবস্থান:</label>
                            <table class="table table-sm table-striped table-bordered">
                                <tr class="custom-table-header">
                                    <td colspan="2">
                                        দখল স্বত্বে
                                    </td>
                                    <td colspan="2">
                                        দখল স্বত্বে নয়
                                    </td>
                                </tr>
                                <tr>
                                    <td>মৌজার নাম:</td>
                                    <td><input type="text" class="w-100"
                                               v-model="data.institutes_land_usage.attached_land_mauza1" maxlength="100"></td>
                                    <td>মৌজার নাম:</td>
                                    <td><input type="text" name="" class="w-100"
                                               v-model="data.institutes_land_usage.outside_land_mauza1" maxlength="100"></td>
                                </tr>
                                <tr>
                                    <td>খতিয়ান নং:</td>
                                    <td><input type="text" name="" class="w-100"
                                               v-model="data.institutes_land_usage.attached_land_khatian1" maxlength="100"></td>
                                    <td>খতিয়ান নং:</td>
                                    <td><input type="text" name="" class="w-100"
                                               v-model="data.institutes_land_usage.outside_land_khatian1" maxlength="100"></td>
                                </tr>
                                <tr>
                                    <td>দাগ নং:</td>
                                    <td><input type="text" name="" class="w-100"
                                               v-model="data.institutes_land_usage.attached_land_dag1" maxlength="100"></td>
                                    <td>দাগ নং:</td>
                                    <td><input type="text" name="" class="w-100"
                                               v-model="data.institutes_land_usage.outside_land_dag1" maxlength="100"></td>

                                </tr>
                                <tr>
                                    <td>অখন্ড (শতাংশ)</td>
                                    <td><input type="number"  v-model="data.institutes_land_usage.attached_land" class="w-50"></td>
                                    <td>অন্যত্র (শতাংশ)</td>
                                    <td><input type="number" v-model="data.institutes_land_usage.outside_land" class="w-50"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label class="font-weight-bold">১.৫.২ প্রতিষ্ঠানটির মোট জমির পরিমাণ:</label>
                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td>
                                        <label for="">(১) দখল স্বত্বে (শতাংশ):</label>
                                        <input class="w-25" type="number" name=""
                                               v-model="data.institutes_land_usage.total_land_under_control">
                                    </td>
                                    <td>
                                        (২) দখল স্বত্বে নয় (শতাংশ):
                                        <input class="w-25" type="number" name=""
                                               v-model="data.institutes_land_usage.total_land_outof_control">
                                    </td>
                                    <td>
                                        মোট(শতাংশ):
                                        <input class="w-25" type="number" name=""
                                               v-model="data.institutes_land_usage.total_land">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <label class="font-weight-bold">১.৫.৩ জমির ব্যবহার ও পরিমাণ (শতাংশে):</label>
                    <table class="table table-sm table-bordered" style="text-align:center">
                        <tr class="custom-table-header">
                            <td>বিবরণ</td>
                            <td>প্রতিষ্ঠানের ভবন</td>
                            <td>খেলার মাঠ</td>
                            <td>ছাত্রাবাস</td>
                            <td>শিক্ষক আবাসন</td>
                            <td>আবাদি জমি</td>
                            <td>পুকুর</td>
                            <td>বাগান</td>
                            <td>শহিদ মিনার</td>
                            <td>অব্যবহৃত</td>
                            <td>অন্যান্য</td>
                            <td>মোট</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>শতাংশ</td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.institue_building"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.play_ground"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.hostel"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.teachers_residence"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.cultivable"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.pond"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.garden"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.sahida_minar"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.unused"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.others"></td>
                            <td><input type="number" class="w-75" name="" id=""
                                       v-model="data.institutes_land_usage.total"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">১.৬</span>
                    </div>
                    <div class="form-control bg-number-label">ভবন সংক্রান্ত</div>
                </div>
                <div class="contentBoxBody">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-sm table-striped table-bordered">
                                <tr>
                                    <td>
                                        ১.৬.১ প্রতিষ্ঠানের সবচেয়ে পুরাতন ভবনটি নির্মাণের বছর
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.oldest_building_estab_year">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ১.৬.২ প্রতিষ্ঠানের সর্বশেষ নতুন ভবনটি নির্মাণের বছর
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.latest_building_estab_year">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ১.৬.৩ সর্বশেষ ভবনটি নির্মাণে অর্থের উৎস
                                    </td>
                                    <td>
                                        <select class="" name=""
                                                v-model="data.building_infos.latest_building_money_source">
                                            <option value="GOVERNMENT">সরকার-১</option>
                                            <option value="PROJECT">প্রকল্প-২</option>
                                            <option value="SELF">নিজস্ব-৩</option>
                                            <option value="NGO">এনজিও-৪</option>
                                            <option value="PERSONAL">ব্যাক্তি-৫</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ১.৬.৪ সর্বশেষ নির্মিত ভবনের আয়তন(বর্গফুট)
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.latest_building_area_sft">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ১.৬.৫ সকল ভবনের মোট আয়তন(বর্গফুট)
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.total_building_area_sft">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ১.৬.৬ প্রতিষ্ঠানটির অবস্থান:
                                    </td>
                                    <td>
                                        <select v-model="data.building_infos.inst_building_type">
                                            <option value="OWN LAND">নিজস্ব জমিতে</option>
                                            <option value="RANTAL">ভাড়া বাড়িতে</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">১.৬.৭ ভবনভিত্তিক তলা ও ঊর্ধ্বমুখী সম্প্রসারণ ইত্যাদি
                                সম্পর্কিত তথ্য</label>
                            <table class="table table-sm table-striped table-bordered text-center">
                                <tr class="custom-table-header">
                                    <td>ভবন নং</td>
                                    <td>ভবনের নাম</td>
                                    <td>কত তলা ফাউন্ডেশন</td>
                                    <td>কত তলা নির্মিত</td>
                                    <td>নির্মানের বছর</td>
                                    <td>উর্ধ্মুখী সম্প্রসারণ যোগ্য কিনা? হাঁ-১, না-২</td>
                                </tr>
                                <tbody>
                                <tr v-for="(item,index) in data.building_details">
                                    <td>@{{index+1}}</td>
                                    <td><input type="text" class="w-100" name="" v-model="item.building_name" maxlength="100" />
                                    </td>
                                    <td><input type="number" class="w-75" name=""
                                               v-model="item.foundation_floor"></td>
                                    <td><input type="number" class="w-75" name="" v-model="item.build_floor">
                                    </td>
                                    <td><input type="number" class="w-75" name="" v-model="item.build_year">
                                    </td>
                                    <td><select class="" name="" v-model="item.upper_increase_yn">
                                            <option value="">select</option>
                                            <option value="1">হ্যাঁ-১</option>
                                            <option value="2">না-২</option>
                                        </select></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <label class="font-weight-bold">১.৬.৮ ভবন গৃহের মালিকানা, ধরন ও অবস্থা অনুযায়ী সংখ্যাঃ</label>
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td colspan="7">ভবন সংখ্যা</td>
                            <td colspan="2">মালিকানা অনুসারে ভবন সংখ্যা</td>
                            <td colspan="3">ধরন অনুযায়ী ভবন সংখ্যা</td>
                            <td colspan="4">অবস্থা অনুযায়ী ভবন সংখ্যা</td>
                            <td>মোট কক্ষ সংখ্যা</td>
                        </tr>
                        <tr>
                            <td>১ তলা</td>
                            <td>২ তলা</td>
                            <td>৩ তলা</td>
                            <td>৪ তলা</td>
                            <td>৫ তলা</td>
                            <td>৫ তলা+</td>
                            <td>মোট</td>
                            <td>নিজস্ব</td>
                            <td>ভাড়া</td>
                            <td>পাকা</td>
                            <td>আধাপাকা</td>
                            <td>কাঁচা</td>
                            <td>নতুন</td>
                            <td>পুরাতন</td>
                            <td>জরাজীর্ণ</td>
                            <td>কর্তৃপক্ষ কর্তৃক পরিত্যাক্ত</td>
                            <td></td>
                        </tr>
                        <tbody>
                        <tr>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_1floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_2floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_3floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_4floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_5floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building_5plus_floor">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.no_building">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.own_building">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.rented">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.packa">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.semi_packa">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.kancha">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.new_building">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.old_building">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.damage">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.abandoned">
                            </td>
                            <td><input type="number" class="w-100" name="" id="" style=""
                                       v-model="data.building_numbers.class_room">
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <label class="font-weight-bold">১.৬.৯ ভবন/গৃহের ব্যবহার</label>
                    <div class="table-bordered">
                        <table class="table table-sm table-striped table-bordered text-center">
                            <thead>
                            <tr class="custom-table-header">
                                <td>ভবন/কক্ষ</td>
                                <td>অফিস কক্ষ</td>
                                <td>প্রতিষ্ঠান প্রধানের কক্ষ</td>
                                <td>শিক্ষক মিলনায়তন</td>
                                <td>সাধারণ শ্রেণি কক্ষ</td>
                                <td>বিজ্ঞানাগার</td>
                                <td>গ্রন্থাগার কক্ষ</td>
                                <td>ছাত্র কমন রুম</td>
                                <td>ছাত্রী কমন রুম</td>
                                <td>সিক রুম</td>
                                <td>ছাত্রাবাসের সংখ্যা</td>
                                <td>ছাত্রীনিবাসের সংখ্যা</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td>সংখ্যা</td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.office_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.inst_head_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.teachers_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.class_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.laboratory">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.library">
                                </td>

                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.male_common_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.female_common_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.sick_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.hostel">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.girls_hostal">
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-sm table-striped table-bordered text-center">
                            <tr class="custom-table-header">
                                <td>ভবন/কক্ষ</td>
                                <td>ছাত্রাবাসের সিট সংখ্যা</td>
                                <td>ছাত্রাবাসে অবস্থানকারী সংখ্যা</td>
                                <td>ছাত্রীনিবাসের সিট সংখ্যা</td>
                                <td>ছাত্রীনিবাসে অবস্থানকারী সংখ্যা</td>
                                <td>প্রতিষ্ঠান প্রধানের আবাসন</td>
                                <td>শিক্ষক আবাসিক ভবন</td>
                                <td>আবাসিক শিক্ষক সংখ্যা</td>
                                <td>শিক্ষক আবাসন সিট</td>
                                <td>বিশেষ চাহিদা সম্পন্ন</td>
                                <td>কাউন্সিলিং রুম</td>
                                <td>শিক্ষা উপকরণ</td>
                                <td>অন্যান্য</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td>সংখ্যা</td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.hostal_sit"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.resident_boy_total"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.girls_hostal_sit"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.resident_girl_total"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.inst_head_residence"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.teachers_residence"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.resident_teacher_total"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.teachers_residence_sit"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.autistic_rest_room"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.counseling_room"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.edu_instrument_room"></td>
                                <td><input type="number" class="w-75" name=""
                                           v-model="data.building_use.others"></td>
                            </tr>
                            </tbody>
                        </table>
                        <label class="font-weight-bold">১.৬.১০ প্রতিষ্ঠানের প্রার্থনা গৃহঃ</label>
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td>
                                    <label class="label-number" for="">মসজিদ</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.mosjid"
                                           style="width: 20px">
                                </td>
                                <td>
                                    <label class="label-number" for="">নামাজ ঘর</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.prayer_room"
                                           style="width: 20px">
                                </td>
                                <td>
                                    <label class="label-number" for="">মন্দির</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.mondir"
                                           style="width: 20px">
                                </td>
                                <td>
                                    <label class="label-number" for="">গীর্জা</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.girja"
                                           style="width: 20px">
                                </td>
                                <td>
                                    <label class="label-number" for="">প্যাগোডা</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.pagoda"
                                           style="width: 20px">
                                </td>
                                <td>
                                    <label class="label-number" for="">অন্যান্য</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.other_religious_place"
                                           style="width: 20px">
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
@section('javascript')
    <script src="{{ asset('js/ttcSecondPage.js') }}" type="module"></script>
@stop
