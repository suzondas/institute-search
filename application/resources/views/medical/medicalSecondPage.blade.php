@extends('components.template')
@section('content')
    <div class="container" style="font-size:13px !important;" id="medicalSecondPage">

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
                        <div class="col-md-5">
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
                                    <td><input type="text" class="w-50"
                                               v-model="data.institutes_land_usage.attached_land_mauza1"></td>
                                    <td>মৌজার নাম:</td>
                                    <td><input type="text" name="" class="w-50"
                                               v-model="data.institutes_land_usage.outside_land_mauza1"></td>
                                </tr>
                                <tr>
                                    <td>খতিয়ান নং:</td>
                                    <td><input type="text" name="" class="w-50"
                                               v-model="data.institutes_land_usage.attached_land_khatian1"></td>
                                    <td>খতিয়ান নং:</td>
                                    <td><input type="text" name="" class="w-50"
                                               v-model="data.institutes_land_usage.outside_land_khatian1"></td>
                                </tr>
                                <tr>
                                    <td>দাগ নং:</td>
                                    <td><input type="text" name="" class="w-50"
                                               v-model="data.institutes_land_usage.attached_land_dag1"></td>
                                    <td>দাগ নং:</td>
                                    <td><input type="text" name="" class="w-50"
                                               v-model="data.institutes_land_usage.outside_land_dag1"></td>

                                </tr>
                                <tr>
                                    <td>অখন্ড (শতাংশ)</td>
                                    <td><input type="number"  v-model="data.institutes_land_usage.attached_land" class="w-50"></td>
                                    <td>অন্যত্র (শতাংশ)</td>
                                    <td><input type="number" v-model="data.institutes_land_usage.outside_land" class="w-50"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <label class="font-weight-bold">১.৫.২ প্রতিষ্ঠানটির মোট জমির পরিমাণ:</label>
                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td>
                                        <label for="">(১) দখল স্বত্বে (শতাংশ):</label>
                                        <input class="w-25" type="text" name=""
                                               v-model="data.institutes_land_usage.total_land_under_control">
                                    </td>
                                    <td>
                                        (২) দখল স্বত্বে নয় (শতাংশ):
                                        <input class="w-25" type="text" name=""
                                               v-model="data.institutes_land_usage.total_land_outof_control">
                                    </td>
                                    <td>
                                        মোট(শতাংশ):
                                        <input class="w-25" type="text" name=""
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
                        <div class="">
                            <table class="table table-sm table-striped table-bordered">
                                <tr>
                                    <td>
                                        ১.৬.১ প্রতিষ্ঠানের সবচেয়ে পুরাতন ভবনটি নির্মাণের বছর
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.oldest_building_estab_year">
                                    </td>
                                    <td>
                                        ১.৬.২ প্রতিষ্ঠানের সর্বশেষ নতুন ভবনটি নির্মাণের বছর
                                    </td>
                                    <td>
                                        <input type="number" name="" class="w-50"
                                               v-model="data.building_infos.latest_building_estab_year">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <label class="font-weight-bold">১.৬.৩ ভবন গৃহের মালিকানা, ধরন ও অবস্থা অনুযায়ী সংখ্যাঃ</label>
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr class="custom-table-header">
                            <td>ভবন সংখ্যা</td>
                            <td colspan="2">মালিকানা অনুসারে ভবন সংখ্যা</td>
                            <td colspan="3">ধরন অনুযায়ী ভবন সংখ্যা</td>
                            <td colspan="4">অবস্থা অনুযায়ী ভবন সংখ্যা</td>
                            <td>মোট কক্ষ সংখ্যা</td>
                        </tr>
                        <tr>
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

                    <label class="font-weight-bold">১.৬.৪ ভবন/গৃহের ব্যবহার</label>
                    <div class="table-bordered">
                        <table class="table table-sm table-striped table-bordered text-center">
                            <thead>
                            <tr class="custom-table-header">
                                <td>ভবন/কক্ষ</td>
                                <td>শ্রেণী কক্ষ</td>
                                <td>অফিস কক্ষ</td>
                                <td>শিক্ষক মিলনায়তন</td>
                                <td>বিজ্ঞানাগার</td>
                                <td>গ্রন্থাগার</td>
                                <td>কম্পিউটার কক্ষ</td>
                                <td>কম্পিউটার ল্যাব</td>
                                <td>ছাত্র কমন রুম</td>
                                <td>ছাত্রী কমন রুম</td>
                                <td>প্রতিবন্ধী/অটিস্টিক শিক্ষাথীর বিশ্রামাগার</td>
                                <td>ব্যয়ামাগার</td>
                                <td>ছাত্রাবাস</td>
                                <td>শিক্ষক আবাসন</td>
                                <td>অন্যান্য</td>
                            </tr>
                            <tbody>
                            <tr>
                                <td>সংখ্যা</td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.class_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.office_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.teachers_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.laboratory">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.library">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                          >
                                </td>

                                <td><input type="number" class="w-75" name="" id="" style=""
                                           >
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.male_common_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.female_common_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.autistic_rest_room">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           >
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.hostel">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.teachers_residence">
                                </td>
                                <td><input type="number" class="w-75" name="" id="" style=""
                                           v-model="data.building_use.others">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <label class="font-weight-bold">১.৬.৫ প্রতিষ্ঠানের প্রার্থনা গৃহঃ</label>
                        <table class="table table-sm table-bordered table-striped">
                            <tr>
                                <td>
                                    <label class="label-number" for="">মসজিদ</label>
                                    <input type="checkbox" true-value="1" false-value="0" class="form-control"
                                           v-model="data.building_use.mosjid"
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
            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/medicalSecondPage.js') }}" type="module"></script>
@stop
