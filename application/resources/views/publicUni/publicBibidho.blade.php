@extends('components.template')
@section('content')
    <div class="container-fluid" id="publicBibidho">
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded">
        <h3 style="text-align:center">সেকশন ৫: গবেষণা প্রকল্প, প্রকাশনা এবং আয়-ব্যয় সংক্রান্ত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">৫.১</span>
                </div>
                <div class="form-control bg-number-label">গবেষণা/প্রকাশনা
                </div>
            </div>
            <div class="contentBoxBody">
                <div class="row">
                    <div class="col-md-10">
                        <label class="font-weight-bold">৫.১.১ ২০১৯ সালে সমাপ্ত গবেষণা/প্রকাশনার বিবরণ: </label>
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                {{--<td>স্তর</td>--}}
                                <td>ক্র</td>
                                <td>গবেষণা/প্রকাশনা (প্রকাশিত ও অপ্রকাশিত)- এর বিবরণ</td>
                                <td>সংখ্যা</td>
                            </tr>
                            <tr>
                                <td>১</td>
                                <td class="text-left">নিজস্ব ও সরকারি অর্থায়নে পরিচালিত গবেষণা প্রকল্প</td>
                                <td><input type="number" v-model="data.institutes_researchs.own_fund" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td class="text-left">দেশের বিভিন্ন সরকারি ও বেসরকারি প্রতিষ্ঠানের আর্থিক সাহায্যে পরিচালিত গবেষণা প্রকল্প</td>
                                <td><input type="number" v-model="data.institutes_researchs.private_fund" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td class="text-left">বিদেশি সংস্থার অর্থায়নে পরিচালিত গবেষণা প্রকল্প</td>
                                <td><input type="number" v-model="data.institutes_researchs.foreign_fund" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td class="text-left">মাস্টার্স পর্যায়ে অভিসন্দর্ভ (Thesis)</td>
                                <td><input type="number" v-model="data.institutes_researchs.masters_level" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td class="text-left">এমফিল পর্যায়ে অভিসন্দর্ভ (Thesis)</td>
                                <td><input type="number" v-model="data.institutes_researchs.mfil_level" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৬</td>
                                <td class="text-left">পিএইচডি পর্যায়ে অভিসন্দর্ভ (Thesis)</td>
                                <td><input type="number" v-model="data.institutes_researchs.phd_level" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৭</td>
                                <td class="text-left">পিয়ার রিভিউকৃত দেশি এবং বিদেশি সাময়িকীতে প্রকাশিত প্রকল্প</td>
                                <td><input type="number" v-model="data.institutes_researchs.pear_review" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৮</td>
                                <td class="text-left">প্রকাশিত পিয়ার রিভিউকৃত সাময়িকী</td>
                                <td><input type="number" v-model="data.institutes_researchs.pear_review_artical" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>৯</td>
                                <td class="text-left">প্রকাশিত বই</td>
                                <td><input type="number" v-model="data.institutes_researchs.published_book" class="w-50"/></td>
                            </tr>
                            <tr>
                                <td>১০</td>
                                <td class="text-left">প্রকাশিত ইলেকট্রনিক সাময়িকী/বই</td>
                                <td><input type="number" v-model="data.institutes_researchs.electric_book" class="w-50"/></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        <div class="contentBox">
                    <div class="input-group contentdeader">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-number">৫.২</span>
                        </div>
                        <div class="form-control bg-number-label">বাজেট সংক্রান্ত তথ্য
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">৫.২.১ ২০২০-২০২০ অর্থ বছরে গবেষণা খাতে ব্যয়ের পরিমাণ: </label>
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                {{--<td>স্তর</td>--}}
                                <td>ক্র</td>
                                <td>উৎস</td>
                                <td>ব্যয়ের পরিমাণ (টাকায়)	</td>
                                <td>ব্যয়ের কত শতাংশ</td>
                            </tr>
                            <tr>
                                <td>১</td>
                                <td class="text-left">রাজস্ব বরাদ্দ</td>
                                <td><input type="number" v-model="data.institutes_expenses.research_tax" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_tax_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td class="text-left"> উন্নয়ন বরাদ্দ</td>
                                <td><input type="number" v-model="data.institutes_expenses.research_devlop" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_devlop_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td class="text-left">নিজস্ব আয়</td>
                                <td><input type="number" v-model="data.institutes_expenses.research_income" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_income_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td class="text-left">বিদেশি উৎস থেকে প্রাপ্ত</td>
                                <td><input type="number" v-model="data.institutes_expenses.research_fund_for" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_fund_for_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td class="text-left">অন্যান্য উৎস থেকে প্রাপ্ত</td>
                                <td><input type="number" v-model="data.institutes_expenses.research_fund_other" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_fund_other_per" class="w-75"/></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold">৫.২.২ ২০২০-২০২০ অর্থ বছরে বিশ্ববিদ্যালয়ের বাজেটের অর্থের উৎস ও টাকার পরিমাণ: </label>
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                {{--<td>স্তর</td>--}}
                                <td>ক্র</td>
                                <td>উৎস</td>
                                <td>অর্থের পরিমাণ (টাকা)</td>
                            </tr>
                            <tr>
                                <td>১</td>
                                <td class="text-left">UGC হতে অনুদানপ্রাপ্ত</td>
                                <td><input type="number" v-model="data.institutes_incomes.student_fund" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td class="text-left">নিজস্ব আয়</td>
                                <td><input type="number" v-model="data.institutes_incomes.own_fund" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td class="text-left">বিশেষ উন্নয়ন বরাদ্দ</td>
                                <td><input type="number" v-model="data.institutes_incomes.foreign_fund" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td class="text-left">অন্যান্য</td>
                                <td><input type="number" v-model="data.institutes_incomes.other_fund" class="w-75"/></td>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="font-weight-bold">৫.২.৩ ২০২০-২০২০ অর্থ বছরে বিভিন্ন খাতে মোট ব্যয়ের বিবরণ: </label>
                        <table class="table table-sm table-bordered table-striped text-center">
                            <tr>
                                {{--<td>স্তর</td>--}}
                                <td>ক্র</td>
                                <td>খাত</td>
                                <td>টাকার পরিমাণ (ব্যয়)</td>
                                <td>বাজেটের কত শতাংশ</td>
                            </tr>
                            <tr>
                                <td>১</td>
                                <td class="text-left">শিক্ষা</td>
                                <td><input type="number" v-model="data.institutes_expenses.education" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.education_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td class="text-left">গবেষণা </td>
                                <td><input type="number" v-model="data.institutes_expenses.research" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.research_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td class="text-left">বেতন ভাতা </td>
                                <td><input type="number" v-model="data.institutes_expenses.salary" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.salary_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td class="text-left">গবেষণা বৃত্তি</td>
                                <td><input type="number" v-model="data.institutes_expenses.scholarship" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.scholarship_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td class="text-left">পরিবহন </td>
                                <td><input type="number" v-model="data.institutes_expenses.transport" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.transport_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৬</td>
                                <td class="text-left">বিদ্যুৎ</td>
                                <td><input type="number" v-model="data.institutes_expenses.electricity" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.electricity_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৭</td>
                                <td class="text-left">অবকাঠামোগত উন্নয়ন ও রক্ষণাবেক্ষণ </td>
                                <td><input type="number" v-model="data.institutes_expenses.structural_develop" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.structural_develop_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৮</td>
                                <td class="text-left">চিকিৎসা</td>
                                <td><input type="number" v-model="data.institutes_expenses.medical" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.medical_per" class="w-75"/></td>
                            </tr>
                            <tr>
                                <td>৯</td>
                                <td class="text-left">অন্যান্য </td>
                                <td><input type="number" v-model="data.institutes_expenses.others" class="w-75"/></td>
                                <td><input type="number" v-model="data.institutes_expenses.others_per" class="w-75"/></td>
                            </tr>
                        </table>
                        <label class="font-weight-bold">৫.২.৪ ২০২০-২০২০ অর্থ বছরে বিভিন্ন খাতে মোট ব্যয়ের বিবরণ: </label> &nbsp;
                        <input type="number" v-model="data.institutes_expenses.per_std_cost" style="width: 100px;" />
                    </div>
                    </div>
            </div>
        <hr />
        <h3 style="text-align:center">সেকশন ৬: কোভিড-১৯ (করোনা) কালে গৃহীত ব্যবস্থা সংক্রান্ত তথ্য</h3>
        <div class="contentBox">
            <div class="input-group contentdeader">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-number">৬.১</span>
                </div>
                <div class="form-control bg-number-label">কোভিড-১৯ সংক্রান্ত তথ্য
                </div>
            </div>
            <div class="contentBoxBody">
                <table class="table table-sm table-bordered">

                    <tr>
                        <td>৬.১.১ করোনাকালীন শিক্ষার্থীদের পড়াশোনার ক্ষেত্রে আপনার প্রতিষ্ঠানের ভূমিকা কী ছিল?</td>
                        <td>
                            <label>৬.১.৪ আপনার প্রতিষ্ঠানে স্বাস্থ্যবিধি নিশ্চিত করে পাঠদান কার্যক্রম পরিচালনা করা
                                সম্ভব হচ্ছে কি না?</label>
                            <select class="contentBox"  v-model="data.covid_infos.class_start_yn">
                                <option value="1">হ্যাঁ-১</option>
                                <option value="2">না-২</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.online_class_yn">অনলাইন ক্লাসের আয়োজন করা
                            হয়েছে-১
                        </td>
                    </tr>
                    <tr>
                        <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.tele_monitoring_yn">শিক্ষার্থীদের পড়াশোনার
                            বিষয়ে টেলিফোনিক তদারকি করা হয়েছে-২
                        </td>
                    </tr>
                    <tr>
                        <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.lockdown_no_action_yn">লকডাউনের কারণে কোন উদ্যোগ
                            নেওয়া যায়নি-৩
                        </td>
                    </tr>
                    <tr>
                        <td><input class="mr-2" type="checkbox" v-model="data.covid_infos.online_exam_yn">অনলাইনে পরীক্ষা নেওয়া হয়েছে-৪
                        </td>
                    </tr>
                </table>
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <td colspan="6" class="font-weight-bold">৬.১.২ করোনায় আক্রান্ত শিক্ষার্থী, শিক্ষক ও কর্মচারীদের তথ্য:</td>
                        <td colspan="6" class="font-weight-bold">৬.১.৩ করোনায় মৃত্যুবরণকারী শিক্ষার্থী, শিক্ষক ও কর্মচারীদের তথ্য:</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="2">শিক্ষার্থী</td>
                        <td colspan="2">শিক্ষক</td>
                        <td colspan="2">কর্মচারী</td>
                        <td colspan="2">শিক্ষার্থী</td>
                        <td colspan="2">শিক্ষক</td>
                        <td colspan="2">কর্মচারী</td>
                    </tr>
                    <tr class="text-center">
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>ছাত্রী</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                        <td>মোট</td>
                        <td>মহিলা</td>
                    </tr>
                    <tr class="text-center">
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_std_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_std_girl"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_tea_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_tea_female"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_staff_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.infected_staff_female"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_std_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_std_girl"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_tea_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_tea_female"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_staff_total"></td>
                        <td><input type="number" class="w-50" v-model="data.covid_infos.died_staff_female"></td>
                </table>
            </div>
        </div>
            <div align="center">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
        <div v-show="dataLoadingError">
            <span class="d-flex justify-content-center btn-warning">Error in Fetching Data, Please contact System Administrator!</span>
        </div>
    </div>

@endsection
@section('javascript')
    <script src="{{ asset('js/publicBibidho.js') }}" type="module" defer></script>
@stop
