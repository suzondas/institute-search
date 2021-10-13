@extends('components.ngTemplate')
@section('content')
    <style>
        .w-50 {
            width: 40px !important;
        }
    </style>
    <div class="container-fluid" data-ng-app="tecStdEightPage" ng-controller="myCtrl">
        <h3 style="text-align:center">সেকশন ২: শিক্ষার্থী, শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>

        <div class="row  contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৩</span>
                </div>
                <div class="form-control bg-number-label"> শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক সংখ্যা</div>
            </div>
            <div class="col-md-4 contentBoxBody">
                <label class="font-weight-bold"> ২.৩৩.১ মূল প্রতিষ্ঠানের সার্বোচ্চ শিক্ষাগত যোগ্যতাভিত্তিক শিক্ষক সংখ্যা:</label>

                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">শিক্ষাগত যোগ্যতা</td>
                        <td colspan="2">শিক্ষক সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.teachQualiSum">
                        <td ng-bind="qualiName(item.quli_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 contentBoxBody">
                <label class="font-weight-bold"> ২.৩৩.২ মূল প্রতিষ্ঠানের সর্বোচ্চ পেশাগত ডিগ্রিপ্রাপ্ত শিক্ষক সংখ্যা:</label>
                <table class="table table-sm table-bordered  table-striped text-center">
                    <tr>
                        <td rowspan="2">ডিগ্রী</td>
                        <td colspan="2">শিক্ষক সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.hdTeachSum">
                        <td class="text-left" ng-bind="hdName(item.higher_degree_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 contentBoxBody">
                <label class="font-weight-bold"> ২.৩৩.৩ আইসিটি বিষয়ক প্রশিক্ষণ/ ডিগ্রি প্রাপ্ত শিক্ষক সংখ্যা</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">প্রশিক্ষণ/ ডিগ্রি</td>
                        <td colspan="2">শিক্ষক সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr ng-repeat="item in data.hdTrnSum">
                        <td class="text-left" ng-bind="hdTrName(item.higher_degree_id)"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.total_teacher"/></td>
                        <td><input type="number" number-converter class="w-50" ng-model="item.female_teacher"/></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        {{--Special Training Info --}}
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৪</span>
                </div>
                <div class="form-control bg-number-label">বিশেষ প্রশিক্ষণের তথ্য
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <td>

                            <label class="font-weight-bold">২.৩৪.১ সৃজনশীল প্রশ্নপত্র প্রণয়ন ও উত্তরপত্র মূল্যায়ন বিষয়ক প্রশিক্ষণপ্রাপ্ত শিক্ষক
                                সংখ্যা</label>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td colspan="2" class="text-center">৩ দিন প্রশিক্ষণপ্রাপ্ত</td>
                                    <td colspan="2" class="text-center">১২ দিন প্রশিক্ষণপ্রাপ্ত</td>
                                </tr>
                                <tr>
                                    <td class="text-center"> মোট: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.creative_3day_total"/></td>
                                    <td class="text-center"> মহিলা: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.creative_3day_female"/></td>
                                    <td class="text-center"> মোট: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.creative_12day_total"/></td>
                                    <td class="text-center"> মহিলা: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.creative_12day_female"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <td><label class="">২.৩৪.২ বিশেষ চাহিদাসম্পন্ন শিক্ষক এর কর্মকালীন প্রশিক্ষণের তথ্য (সংখ্যা লিখুন)</label><br>
                            মোট: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.onjob_training_total"/>
                            মহিলা: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.onjob_training_female"/></td>
                        <td><label class="">২.৩৪.৩ ক্ষুদ্র-নৃ-গোষ্ঠী শিক্ষক এর কর্মকালীন প্রশিক্ষণের তথ্য (সংখ্যা
                                লিখুন)</label><br>
                            মোট: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.onjob_training_tribe_total"/>
                            মহিলা: <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.onjob_training_tribe_female"/></td>
                        <td class="form-inline"><label class="">২.৩৪.৪ বিশেষ চাহিদাসম্পন্ন শিক্ষার্থীর জন্য গাইড শিক্ষক আছে
                                কি? </label><br>
                            <select class="w-25" ng-model="data.teacherTrainInfo.autism_guide_teacher_yn">
                                <option value="1"> হ্যাঁ</option>
                                <option value="2"> না</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td class="form-inline"><label class="">২.৩৪.৫ দুর্যোগ ব্যবস্থাপনা সংক্রান্ত প্রশিক্ষণপ্রাপ্ত শিক্ষক আছে কি? </label><br>
                            <select class="w-25" ng-model="data.teacherTrainInfo.disaster_train_teacher_yn">
                                <option value="1"> হ্যাঁ</option>
                                <option value="2"> না</option>
                            </select></td>
                        <td><label class="">২.৩৪.৬ উত্তর হ্যাঁ হলে কয়জন?</label><br>
                            <input type="number" number-converter class="w-25" ng-model="data.teacherTrainInfo.disaster_train_teacher"/>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td class="">২.৩৪.৭ শিক্ষকদের কোন কোন বিষয়ে প্রশিক্ষণ প্রয়োজন?</td>
                        <td>১.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required1"/></td>
                        <td>২.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required2"/></td>
                        <td>৩.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required3"/></td>
                        <td>৪.<input type="text" class="" ng-model="data.teacherTrainInfo.training_required4"/></td>
                    </tr>
                </table>
            </div>
        </div>
        {{--Special Trainig Ends--}}
        <br>
        <div class="contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৫</span>
                </div>
                <div class="form-control bg-number-label">কর্মকালীন প্রশিক্ষণের তথ্য (সংখ্যা লিখুন):</div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">প্রশিক্ষণ</td>
                        <td colspan="2">প্রশিক্ষণপ্রাপ্ত শিক্ষক</td>
                        <td rowspan="2">প্রশিক্ষণ</td>
                        <td colspan="2">প্রশিক্ষণপ্রাপ্ত শিক্ষক</td>
                    </tr>
                    <tr>
                        <td colspan="2">হ্যাঁ/না</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>হেড টিচার ট্রেনিং (২১ দিন)</td>
                        <td colspan="2"><select class=" " ng-model="data.teacherInservTr.ht_training_yn" style="width: 90px" >
                                <option value="">Select</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="2">না</option>
                            </select></td>
                        <td>সিপিডি-১ শুধুমাত্র ইংরেজি ট্রেনিং (২১ দিন)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd1_eng_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd1_eng_female"></td>
                    </tr>

                    <tr>
                        <td>হেড টিচার ফলো-আপ ট্রেনিং (৬ দিন)</td>
                        <td colspan="2"><select class=" " ng-model="data.teacherInservTr.ht_fl_training_yn" style="width: 90px">
                                <option value="">Select</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="2">না</option>
                            </select></td>
                        <td>সিপিডি-২ ট্রেনিং (৫ দিন)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd2_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd2_female"></td>
                    </tr>
                    <tr>
                        <td>হেড টিচার প্রি-সার্ভিস ট্রেনিং (৩৫ দিন)</td>
                        <td colspan="2"><select class=" " ng-model="data.teacherInservTr.ht_prserv_training_yn" style="width: 90px">
                                <option value="">Select</option>
                                <option value="1">হ্যাঁ</option>
                                <option value="2">না</option>
                            </select></td>
                        <td>ক্লাস্টার ট্রেনিং (১ দিন)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cluster_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cluster_female"></td>
                    </tr>
                    <tr>
                        <td rowspan="2"></td>
                        <td colspan="2">প্রশিক্ষণপ্রাপ্ত শিক্ষক সংখ্যা</td>
                        <td>এস.বি. এ ট্রেনিং</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.sba_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.sba_female"></td>
                    </tr>
                    <tr>

                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>সৃজনশীল প্রশ্ন সংক্রান্ত ট্রেনিং</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.srizonsil_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.srizonsil_female"></td>
                    </tr>
                    <tr>
                        <td>এসটিসি ট্রেনিং (৩ মাস)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.stc_training_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.stc_training_female"></td>
                        <td>অন্যান্য ট্রেনিং</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.other_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.other_female"></td>
                    </tr>
                    <tr>
                        <td>এসটিটি থেকে বি.এড (৯ মাস)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.stt_bed_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.stt_bed_female"></td>
                        <td colspan="3" rowspan="2">•প্রধান শিক্ষকগণ হ্যাঁ/না টিক দিবেন <br>
                            •অন্যান্য শিক্ষকগণের সংখ্যা লিখবেন
                        </td>
                    </tr>
                    <tr>
                        <td>সিপিডি-১ ট্রেনিং (১৪ দিন)</td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd1_total"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherInservTr.cpd1_female"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৬</span>
                </div>
                <div class="form-control bg-number-label"> বিষয়ভিত্তিক শিক্ষক সংখ্যা</div>
            </div>
            <div class="row contentBoxBody">
            <div class="col-md-6">
                <div class="">
                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            <td></td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td style="width: 350px" class="font-weight-bold">২.৩৬.১ ক্লাস রুটিন অনুযায়ী ইংরেজি পাঠদানকারী শিক্ষক সংখ্যা:</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.total_eng_teachers"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.female_eng_teacher"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <label class="font-weight-bold">২.৩৬.২ ইংরেজি বিষয়ে পাঠদানকারী শিক্ষকের স্নাতক (পাস), স্নাতক (সম্মান) ও স্নাতকোত্তর
                    পর্যায়ে ইংরেজি বিষয় অধ্যয়ন সম্পর্কিত তথ্য:</label>

                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            <td>ক্রমিক নং</td>
                            <td>বিবরণ</td>
                            <td>শিক্ষক/ শিক্ষিকার সংখ্যা</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>১</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে বাধ্যতামূলক ১০০ নম্বরের ইংরেজি ছিল</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_100_eng"></td>
                        </tr>
                        <tr>
                            <td>২</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে ৩০০ নম্বরের ইংরেজি ছিল</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_300_eng"></td>
                        </tr>
                        <tr>
                            <td>৩</td>
                            <td style="width: 350px" class="text-left">ইংরেজিতে স্নাতক সম্মান</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.eng_hons"></td>
                        </tr>
                        <tr>
                            <td>৪</td>
                            <td style="width: 350px" class="text-left">ইংরেজিতে স্নাতকোত্তর</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.eng_hons_mst"></td>
                        </tr>
                        <tr>
                            <td>৫</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে ইংরেজি ছিলা না</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_without_eng"></td>
                        </tr>
                        <tr>
                            <td>৬</td>
                            <td style="width: 350px" class="text-left">এইচ এস সি পাস</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.eng_hsc_pass"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <table class="table table-sm table-bordered  table-striped text-center">
                        <tr>
                            <td></td>
                            <td>মোট</td>
                            <td>মহিলা</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td style="width: 390px" class="font-weight-bold">২.৩৬.৩ ক্লাস রুটিন অনুযায়ী গণিত বিষয়ে পাঠদানকারী শিক্ষক সংখ্যা:
                            </td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.total_math_teachers"></td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.female_math_teacher"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="">
                    <label class="font-weight-bold">২.৩৬.৪ গণিত বিষয়ে পাঠদানকারী শিক্ষকের স্নাতক (পাস), স্নাতক (সম্মান) ও স্নাতকোত্তর
                    পর্যায়ে গণিত বিষয় অধ্যয়ন সম্পর্কিত তথ্য:</label>

                    <table class="table table-sm table-bordered table-striped text-center">
                        <tr>
                            <td>ক্রমিক নং</td>
                            <td>বিবরণ</td>
                            <td>শিক্ষক/ শিক্ষিকার সংখ্যা</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>১</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে পদার্থ ও রসায়নসহ গণিত ছিল</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_pcm"></td>
                        </tr>
                        <tr>
                            <td>২</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে অন্যান্য বিষয়সহ গণিত ছিল</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_other_math"></td>
                        </tr>
                        <tr>
                            <td>৩</td>
                            <td style="width: 350px" class="text-left">গণিতে স্নাতক সম্মান</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.math_hons"></td>
                        </tr>
                        <tr>
                            <td>৪</td>
                            <td style="width: 350px" class="text-left">গণিতে স্নাতকোত্তর</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.math_hons_mst"></td>
                        </tr>
                        <tr>
                            <td>৫</td>
                            <td style="width: 350px" class="text-left">স্নাতক (পাস) পর্যায়ে গণিত ছিল না কিন্তু এইচএসসিতে ছিল</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.deg_hsc_with_math"></td>
                        </tr>
                        <tr>
                            <td>৬</td>
                            <td style="width: 350px" class="text-left">স্নাতক বা এইচ এস সি পর্যায়ে ছিল না</td>
                            <td><input type="number" number-converter class="w-50" ng-model="data.teacherTrainInfo.hons_without_math"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <br>
        <div class="contentBox ">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৭</span>
                </div>
                <div class="form-control bg-number-label">অবসর গ্রহণ, নতুন নিয়োগপ্রাপ্ত, গবেষণা কাজ, পুরষ্কার প্রাপ্ত
                    ইত্যাদি সম্পর্কিত শিক্ষকের সংখ্যা
                </div>
            </div>
            <div class="contentBoxBody col-md-10">
                <table class="table table-sm table-bordered table-striped text-center">
                    <tr>
                        <td rowspan="2">ক্রমিক নং</td>
                        <td rowspan="2" style="width:450px">বিবরণ</td>
                        <td colspan="2"> শিক্ষকের সংখ্যা</td>
                    </tr>
                    <tr>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tbody>
                    <tr>
                        <td>১</td>
                        <td style="width: 300px" class="text-left">তথ্য প্রদানের দিন শিক্ষক উপস্থিতি</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.count_day_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.count_day_female" id=""></td>
                    </tr>
                    <tr>
                        <td>২</td>
                        <td style="width: 300px" class="text-left">অবসরে গিয়েছেন (১/৭/২০২০থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.retired_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.rerired_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৩</td>
                        <td style="width: 300px" class="text-left">অবসরে যাবেন (১/৭/২০২০ থেকে ৩০/৬/২০২২ পর্যন্ত)</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.retiredfu_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.reriredfu_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৪</td>
                        <td style="width: 300px" class="text-left">নতুন নিয়োগপ্রাপ্ত (১/৭/২০২০ থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.new_recruite_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.new_recruite_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৫</td>
                        <td style="width: 300px" class="text-left">শিক্ষকতা পেশা ছেড়ে দিয়েছেন (১/৭/২০২০ থেকে ৩০/৬/২০২০ পর্যন্ত)</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.leave_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.leave_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৬</td>
                        <td style="width: 300px" class="text-left">NTRCA কর্তৃক সুপারিশকৃত শিক্ষকের সংখ্যা</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.ntrc_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.ntrc_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৭</td>
                        <td style="width: 300px" class="text-left">বর্তমানে কতজন শিক্ষক গবেষণা কাজে সম্পৃক্ত</td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.research_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25"ng-model="data.teacherRetAwInfo.research_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৮</td>
                        <td style="width: 300px" class="text-left">একাডেমিক বিষয়ের ওপর পুরষ্কারপ্রাপ্ত শিক্ষকের সংখ্যা</td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.awarded_teacher_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.awarded_teacher_female" id=""></td>
                    </tr>
                    <tr>
                        <td>৯</td>
                        <td style="width: 300px" class="text-left">শিখন-শেখানো বিষয়ে প্রশিক্ষণপ্রাপ্ত (১/৭/২০২০ থেকে ৩০/৬/২০২০ পর্যন্ত)
                        </td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.learning_trained_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.learning_trained_female" id=""></td>
                    </tr>
                    <tr>
                        <td>১০</td>
                        <td style="width: 300px" class="text-left">বিশেষ চাহিদাসম্পন্ন (Special needs) শিক্ষার্থীর শিক্ষা বিষয়ে
                            প্রশিক্ষণপ্রাপ্ত শিক্ষকের সংখ্যা
                        </td>
                        <td><input type="number" number-converter class="w-25" ng-model="data.teacherRetAwInfo.special_trained_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.special_trained_female" id=""></td>
                    </tr>
                    <tr>
                        <td>১১</td>
                        <td style="width: 300px" class="text-left">একীভূত শিক্ষা (Inclusive education), শিশু অধিকার এবং বিদ্যালয়ের ইতিবাচক
                            শৃঙ্খলা বিষয়ের ওপর প্রশিক্ষণপ্রাপ্ত শিক্ষকের সংখ্যা
                        </td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.inclusive_total" id=""></td>
                        <td><input type="number" number-converter class=" w-25" ng-model="data.teacherRetAwInfo.inclusive_female" id=""></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row contentBox">
            <div class="input-group contentHeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">২.৩৮ </span>
                </div>
                <div class="form-control bg-number-label">প্রাপ্ত পুরষ্কার সম্পর্কিত তথ্য</div>
            </div>
            <div class="col-md-6">
                <label class="font-weight-bold">২.৩৮.১ শিক্ষা প্রতিষ্ঠানে প্রাপ্ত পুরষ্কার সম্পর্কিত তথ্য (নির্দিষ্ট স্থানে টিক চিহ্ন দিন)</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tbody>
                    <tr>
                        <td rowspan="7">শিক্ষকদের জন্য</td>
                        <td>বিষয়</td>
                        <td>জাতীয়</td>
                        <td>বিভাগ/মহানগর</td>
                        <td>জেলা</td>
                        <td>উপজেলা/থানা</td>
                        <td style="width:100px">সাল</td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষা প্রতিষ্ঠান</td>
                        <td><input type="checkbox" ng-checked="data.teacherRetAwInfo.best_inst_national==1" ng-true-value="'1'" ng-false-value="'0'" ng-model="data.teacherRetAwInfo.best_inst_national"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_division" ng-checked="data.teacherRetAwInfo.best_inst_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_district" ng-checked="data.teacherRetAwInfo.best_inst_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_thana" ng-checked="data.teacherRetAwInfo.best_inst_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="number" number-converter class="w-50" ng-model="data.teacherRetAwInfo.best_inst_year"></td>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষা প্রতিষ্ঠান প্রধান</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_head_national" ng-checked="data.teacherRetAwInfo.best_inst_head_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_head_division" ng-checked="data.teacherRetAwInfo.best_inst_head_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_head_district" ng-checked="data.teacherRetAwInfo.best_inst_head_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_inst_head_thana" ng-checked="data.teacherRetAwInfo.best_inst_head_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_inst_head_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left"> শ্রেষ্ঠ শ্রেণি শিক্ষক</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_class_tea_national" ng-checked="data.teacherRetAwInfo.best_class_tea_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_class_tea_division" ng-checked="data.teacherRetAwInfo.best_class_tea_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_class_tea_district" ng-checked="data.teacherRetAwInfo.best_class_tea_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_class_tea_thana" ng-checked="data.teacherRetAwInfo.best_class_tea_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_class_tea_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষক (বিএনসিসি)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_bncc_national" ng-checked="data.teacherRetAwInfo.best_tea_bncc_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_bncc_division" ng-checked="data.teacherRetAwInfo.best_tea_bncc_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_bncc_district" ng-checked="data.teacherRetAwInfo.best_tea_bncc_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_bncc_thana" ng-checked="data.teacherRetAwInfo.best_tea_bncc_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_tea_bncc_year"></td>
                    </tr>
                    <tr>
                        <td>শ্রেষ্ঠ শিক্ষক (রোভার)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_scout_national" ng-checked="data.teacherRetAwInfo.best_tea_scout_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_scout_division" ng-checked="data.teacherRetAwInfo.best_tea_scout_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_scout_district" ng-checked="data.teacherRetAwInfo.best_tea_scout_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_scout_thana" ng-checked="data.teacherRetAwInfo.best_tea_scout_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_tea_scout_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষক (রেঞ্জার)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_gguide_national" ng-checked="data.teacherRetAwInfo.best_tea_gguide_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_gguide_division" ng-checked="data.teacherRetAwInfo.best_tea_gguide_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_gguide_district" ng-checked="data.teacherRetAwInfo.best_tea_gguide_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_tea_gguide_thana" ng-checked="data.teacherRetAwInfo.best_tea_gguide_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_tea_gguide_year"></td>
                    <tr>
                    </tr>
                    <tr>
                        <td rowspan="4"> শিক্ষার্থীদের জন্য</td>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_national" ng-checked="data.teacherRetAwInfo.best_std_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_division" ng-checked="data.teacherRetAwInfo.best_std_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_district" ng-checked="data.teacherRetAwInfo.best_std_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_thana" ng-checked="data.teacherRetAwInfo.best_std_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_std_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (বিএনসিসি)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_bncc_national" ng-checked="data.teacherRetAwInfo.best_std_bncc_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_bncc_divisional" ng-checked="data.teacherRetAwInfo.best_std_bncc_divisional==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_bncc_district" ng-checked="data.teacherRetAwInfo.best_std_bncc_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_bncc_thana" ng-checked="data.teacherRetAwInfo.best_std_bncc_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_std_bncc_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (রোভার)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_scout_national" ng-checked="data.teacherRetAwInfo.best_std_scout_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_scout_division" ng-checked="data.teacherRetAwInfo.best_std_scout_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_scout_district" ng-checked="data.teacherRetAwInfo.best_std_scout_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_scout_thana" ng-checked="data.teacherRetAwInfo.best_std_scout_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_std_scout_year"></td>
                    </tr>
                    <tr>
                        <td class="text-left">শ্রেষ্ঠ শিক্ষার্থী (রেঞ্জার)</td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_gguide_national" ng-checked="data.teacherRetAwInfo.best_std_gguide_national==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_gguide_division" ng-checked="data.teacherRetAwInfo.best_std_gguide_division==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_gguide_district" ng-checked="data.teacherRetAwInfo.best_std_gguide_district==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="checkbox" ng-model="data.teacherRetAwInfo.best_std_gguide_thana" ng-checked="data.teacherRetAwInfo.best_std_gguide_thana==1" ng-true-value="'1'" ng-false-value="'0'"></td>
                        <td><input type="text" class="w-50" ng-model="data.teacherRetAwInfo.best_std_gguide_year"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="col-md-6">
                <label class="font-weight-bold">২.৩৮.২ বিভিন্ন পর্যায়ে অংশগ্রহণকারী ও পুরষ্কারপ্রাপ্ত শিক্ষার্থী সংখ্যা</label>
                <table class="table table-sm table-bordered table-striped text-center">
                    <tbody>
                    <tr>
                        <td>বিষয়</td>
                        <td></td>
                        <td>প্রতিষ্ঠান পর্যায়ে</td>
                        <td>উপজেলা/থানা পর্যায়ে</td>
                        <td>জেলা পর্যায়ে</td>
                        <td>বিভাগীয় পর্যায়ে</td>
                        <td>জাতীয় পর্যায়ে</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-left">সাহিত্য ও সংস্কৃতি</td>
                        <td class="text-left">অংশগ্রহণকারী</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_cultureal_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_cultureal_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_cultureal_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_cultureal_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_cultureal_parti" class="w-50"></td>
                    </tr>
                    <tr>
                        <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_cultureal_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_cultureal_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_cultureal_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_cultureal_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_cultureal_award" class="w-50"></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-left">ক্রীড়া (আউটডোর)</td>
                        <td class="text-left">অংশগ্রহণকারী</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_sports_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_sports_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_sports_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_sports_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_sports_parti" class="w-50"></td>
                    </tr>
                    <tr>
                        <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_sports_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_sports_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_sports_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_sports_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_sports_award" class="w-50"></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-left">ক্রীড়া (ইনডোর)</td>
                        <td class="text-left">অংশগ্রহণকারী</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_indoor_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_indoor_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_indoor_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_indoor_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_indoor_parti" class="w-50"></td>
                    <tr>
                        <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_indoor_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_indoor_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_indoor_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_indoor_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_indoor_award" class="w-50"></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-left">সৃজনশীল মেধা অন্বেষণ</td>
                        <td class="text-left">অংশগ্রহণকারী</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_creative_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_creative_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_creative_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_creative_parti" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_creative_parti" class="w-50"></td>
                    </tr>
                    <tr>
                        <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_creative_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_creative_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_creative_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_creative_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_creative_award" class="w-50"></td>
                    </tr>
                    <tr>
                        <td class="text-left">বিশেষ কৃতিত্বপূর্ণ অবদান</td>
                        <td class="text-left">পুরষ্কারপ্রাপ্ত</td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.institute_special_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.upazila_special_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.district_special_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.division_special_award" class="w-50"></td>
                        <td><input type="number" number-converter ng-model="data.teacherRetAwInfo.national_special_award" class="w-50"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center">
            <button type="button" class="btn btn-info" onclick="window.print()"> Print</button> </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/tecStdEightPage.js') }}" type="module" defer></script>
@stop
