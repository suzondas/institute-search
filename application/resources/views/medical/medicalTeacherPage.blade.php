@extends('components.template')
@section('content')
    <div class="" id="medicalTeacherPage">
        <h3 class="text-center"></h3>
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
            <div class="contentBox">
                <div class="input-group contentHeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">শিক্ষক/কর্মচারীর তথ্য বিবরণী</span>
                    </div>
                    <div class="form-control bg-number-label"> পদবী ও শিক্ষাগত যোগ্যতা ভিত্তিক শিক্ষক/কর্মচারীর তথ্য বিবরণী:</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <td rowspan="2">নং</td>
                            <td rowspan="2">নাম</td>
                            <td rowspan="2">পুরুষ/মহিলা</td>
                            <td rowspan="2">পদবী</td>
                            <td rowspan="2">চাকুরীতে প্রথম যোগদানের তারিখ দিন/মাস/বছর</td>
                            <td rowspan="2">বর্তমান পদে যোগদানের তারিখ দিন/মাস/বছর</td>
                            <td rowspan="2">জন্মতারিখ দিন/মাস/বছর</td>
                            <td colspan="8">শিক্ষাগত যোগ্যতা (বিভাগ বা জিপিএ, শ্রেণী ইত্যাদি প্রযোজ্যটি লিখুন</td>
                            <td rowspan="2">জাতীয় বেতন স্কেল’২০১৫ (মূলবেতন)</td>
                        </tr>
                        <tr>
                            <td>এসএসসি/সমমান</td>
                            <td>এইচএসসি/ সমমান</td>
                            <td>এমবিবিএস/সমমান</td>
                            <td>বিডিএস/সমমান</td>
                            <td>এফসিপিএস</td>
                            <td>এমআর সিপি</td>
                            <td>এফআরসিএস</td>
                            <td>অন্যান্য</td>
                        </tr>
                        <tbody>
                        <tr>
                            <td>১</td>
                            <td><label></label></td>
                            <td><select v-model="data.teacherInfo.sex">
                                    <option value="">Select</option>
                                    <option value="1">১.পুরুষ</option>
                                    <option value="2">২.মহিলা</option>
                                </select></td>
                            <td><select v-model="data.teacherInfo.designation_name_bn">
                                    <option value="">Select</option>
                                    <option value="18">১.অধ্যক্ষ/পরিচালক</option>
                                    <option value="19">২.উপাধ্যক্ষ</option>
                                    <option value="20">৩.অধ্যাপক</option>
                                    <option value="21">৪.সহযোগী অধ্যাপক</option>
                                    <option value="22">৫.সহকারী অধ্যাপক</option>
                                    <option value="23">৬.প্রভাষক</option>
                                    <option value="24">৭.প্রদর্শক/শিক্ষক</option>
                                    <option value="43">৮.ইনস্ট্রাকটর</option>
                                    <option value="40">৯.লাইব্রেরিয়ান</option>
                                    <option value="41">১০.সহকারী লাইব্রেরিয়ান</option>
                                    <option value="50">১১.৩য় শ্রেণি কর্মচারী</option>
                                    <option value="60">১২.৪র্থ শ্রেণি কর্মচারী</option>
                                </select></td>
                            <td><input type="date" style="width: 130px;" v-model="data.teacherInfo.first_joining_date"/></td>
                            <td><input type="date" style="width: 130px;" v-model="data.teacherInfo.current_joining_date"/></td>
                            <td><input type="date" style="width: 130px;" v-model="data.teacherInfo.birth_date"/></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>
                            <td><input type="number"  class="w-50" v-model="data.teacherInfo.ssc"></td>

                        </tr>
                        </tbody>
                    </table>
                    <input type="button" value="Add More" class="btn btn-warning"/>
                </div>
            </div>

            <br>

    </div>
    </div>
@endsection
@section('javascript')
        <script src="{{ asset('js/medicalTeacherPage.js') }}" type="module"></script>
@endsection
