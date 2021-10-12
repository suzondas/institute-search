@extends('components.template')
@section('content')
    <div class="container-fluid" id="privateComSecondPage">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>

        <div v-if="dataLoaded">
            <h3 class="text-center" style="margin-top: 10px">সেকশন ২: ভৌত সুযোগ-সুবিধা</h3>
            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.১</span>
                    </div>
                    <div class="form-control bg-number-label">ভৌত অবকাঠামো</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td style="width:350px"><label>২.১.১ বিশ্ববিদ্যালয়ের নিজস্ব ক্যাম্পাস আছে কি?</label>
                                <select class="" v-model="data.institutes_land_usage.uni_campus_yn">
                                    <option value=""></option>
                                    <option value="1">হ্যা-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
                            <td>
                                <label> ২.১.২ বিশ্ববিদ্যালয়ের জমির পরিমাণ (শতাংশে):</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="total"> নিজস্ব:</label>
                                        <input type="number" v-model="data.institutes_land_usage.land_own" class="w-50">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="female"> ভাড়া: </label>
                                        <input type="number" v-model="data.institutes_land_usage.attached_land" class="w-50">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="female"> অন্যান্য: </label>
                                        <input type="number" v-model="data.institutes_land_usage.outside_land" class="w-50">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <label> ২.১.৩ বিশ্ববিদ্যালয়ের ভবন সংখ্যা:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="total"> নিজস্ব:</label>
                                        <input type="number" v-model="data.institutes_land_usage.own_building" class="w-50">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="female"> ভাড়া: </label>
                                        <input type="number" v-model="data.institutes_land_usage.rent_building" class="w-50">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="font-weight-bold">২.১.৪ ভৌত অবকাঠামোর বিবরণ:</label>
                            <table class="table table-sm table-striped table-bordered text-center">
                                <tr>
                                    <td>ক্র.</td>
                                    <td>কক্ষ/ভবনের প্রকার</td>
                                    <td>সংখ্যা</td>
                                    <td>মোট আয়তন (বর্গফুট)</td>
                                </tr>
                                <tr v-for="item in data.univ_building_dtls_own">
                                    <td>@{{ roomName(item.room_id) }}</td>
                                    <td><input type="number" class="w-50"  v-model="item.room_num"/></td>
                                    <td><input type="number" class="w-50"  v-model="item.room_area"/></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">২.১.৫ ভাড়াকৃত অবকাঠামোর বিবরণ:</label>
                            <table class="table table-sm table-striped table-bordered text-center">
                                <tr>
                                    <td>কক্ষ/ভবনের প্রকার</td>
                                    <td>সংখ্যা</td>
                                    <td>মোট আয়তন (বর্গফুট)</td>
                                </tr>
                                <tr v-for="item in data.univ_building_dtls_rent">
                                    <td>@{{ roomName(item.room_id) }}</td>
                                    <td><input type="number" class="w-50"  v-model="item.room_num"/></td>
                                    <td><input type="number" class="w-50"  v-model="item.room_area"/></td>
                                </tr>
                            </table>
                            <label class="font-weight-bold">২.১.৬ বিশ্ববিদ্যালয়ের আবাসিক হল/হোস্টেলসমূহ সংখ্যা ও আসন সংখ্যা:</label>
                            <table class="table table-sm table-striped table-bordered text-center">
                                <tr>
                                    <td>ক্র.</td>
                                    <td>ব্যবহারকারী</td>
                                    <td>হল/হোস্টেলের সংখ্যা</td>
                                    <td>আসন সংখ্যা</td>
                                    <td>আবাসিক শিক্ষার্থীর সংখ্যা</td>
                                </tr>
                                <tr>
                                    <td>১</td>
                                    <td>ছাত্র</td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_no_male"/></td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_sit_male"/></td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_total_std_male"/></td>
                                </tr>
                                <tr>
                                    <td>২</td>
                                    <td>ছাত্রী</td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_no_female"/></td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_sit_female"/></td>
                                    <td><input type="number" class="w-50" v-model="data.institutes_land_usage.hall_total_std_female"/></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- General Info ends here--}}

            <div class="contentBox">
                <div class="input-group contentdeader">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-number">২.২</span>
                    </div>
                    <div class="form-control bg-number-label">লাইব্রেরি সংক্রান্ত তথ্য</div>
                </div>
                <div class="contentBoxBody">
                    <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <td colspan="2">
                                ২.২.১ কেন্দ্রীয় লাইব্রেরিতে মোট বইয়ের সংখ্যা: &nbsp
                                <input type="number" v-model="data.institutes_libraries.no_book" class="w-25" />
                            </td>
                            <td colspan="2">
                                <label class="">২.২.২ কেন্দ্রীয় লাইব্রেরিতে ডিজিটাল ক্যাটালগিং সিস্টেম চালু আছে কি? </label>
                                <select class="" v-model="data.institutes_libraries.computerized_catelog_yn">
                                    <option value="">Select</option>
                                    <option value="1">হ্যাঁ-১</option>
                                    <option value="2">না-২</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-striped table-bordered text-center">
                        <label class="font-weight-bold">২.২.৩ গ্রন্থাগার ও পাঠোপকরণের বিবরণ:</label>
                        <tr>
                            <td>বিবরণ</td>
                            <td>বই</td>
                            <td>জার্নাল</td>
                            <td>অডিওভিজ্যুয়াল সামগ্রী</td>
                        </tr>
                        <tr>
                            <td class="text-left">১. ২০২০ সাল পর্যন্ত গ্রন্থাগার সামগ্রীর মোট ক্রমপূঞ্জিত (cumulative) সংখ্যা</td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_total_book"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_total_jurnal"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_total_audio"/></td>
                        </tr>
                        <tr>
                            <td class="text-left">২. শুধুমাত্র ২০২০ সালে সংগৃহীত গ্রন্থাগার সামগ্রীর সংখ্যা</td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_curr_year_book"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_curr_year_jurnal"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_curr_year_audio"/></td>
                        </tr>
                        <tr>
                            <td class="text-left">৩. ২০২০ সালে গৃহীত (subscribed) ইলেকট্রনিক পুস্তক ও সাময়িকীর সংখ্যা</td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_ebook"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_ejurnal"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_eaudio"/></td>
                        </tr>
                        <tr>
                            <td class="text-left">৪. অন্যান্য</td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_other_book"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_other_jurnal"/></td>
                            <td><input type="number" class="w-50" v-model="data.institutes_libraries.univ_other_audio"/></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div align="center"><button type="button" @click="submitData" class="btn btn-success">Save and Next</button>
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>

        <div v-show="dataLoadingError">
            <span class="d-flex justify-content-center btn-warning">Error in Fetching Data, Please contact System Administrator!</span>
        </div>
    </div>
@endsection
{{--Page wise js--}}
@section('javascript')
    <script src="{{ asset('js/privateComSecondPage.js') }}" type="module" defer></script>
@stop