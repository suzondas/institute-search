@extends('components.template')
@section('content')
    <div class="" id="teacherStaffInfo">
        <h3 style="text-align:center">শিক্ষক ও কর্মচারী সম্পর্কিত তথ্য</h3>
        <div v-if="!dataLoaded">
            <div class="d-flex justify-content-center">
                <h3 class="p-2">Loading...</h3>
                <div class="spinner-border" role="status">
                </div>
            </div>
        </div>
        <div v-if="dataLoaded" class="shadow p-3 mb-5 bg-white rounded p-2 table-responsive">

            <table class="table-bordered w-100">
                <thead>
                <tr class="custom-table-header">
                    <th class="text-center">ক্রমিক</th>
                    <th class="text-center">নাম<span style="color:red;font-weight: bold;">*</span></th>
                    <th class="text-center">পদবি<span style="color:red;font-weight: bold;">*</span></th>
                    {{--<th class="text-center">বিষয়<span style="color:red;font-weight: bold;">*</span> </th>--}}
                    <th class="text-center">জন্ম তারিখ<span style="color:red;font-weight: bold;">*</span></th>
                    <th class="text-center">NID নম্বর <br>(১০/১৩/১৭ ডিজিট)<span
                                style="color:red;font-weight: bold;">*</span></th>
                    <th class="text-center">মোবাইল নম্বর <br>(NID দ্বারা রেজিষ্ট্রিকৃত)<span
                                style="color:red;font-weight: bold;">*</span></th>
                    <th class="text-center">বর্তমানে কর্মরত কি না<span style="color:red;font-weight: bold;">*</span>
                    </th>
                    <th class="text-center">বেতন EFT <br>এর মাধ্যমে হয়
                        </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item, index) in data">
                    <td class="text-center">@{{ index+1 }}</td>
                    <td>@{{item.teach_name}}</td>
                    <td style="width:100px;">@{{ getDesignation(item.desig_id) }}</td>
                    {{--<td>@{{ getSubject(item.subject_id) }}</td>--}}
                    <td class="text-center">@{{ changeDateFormat(item.dob) }}</td>
                    <td class="text-right" v-if="exists(item.nid)">@{{ item.nid }}</td>
                    <td class="text-right" v-if="!exists(item.nid)" style="color:red !important">NID প্রদান করুন</td>
                    <td class="text-right" v-if="exists(item.mobile_number)">@{{ item.mobile_number }}</td>
                    <td class="text-right" style="color:red !important" v-if="!exists(item.mobile_number)">Mobile No
                        প্রদান করুন
                    </td>
                    <td class="text-center" v-if="item.is_inactive=='Y'">কর্মরত</td>
                    <td class="text-center" v-else-if="item.is_inactive=='R'">অবসরপ্রাপ্ত</td>
                    <td class="text-center" v-else-if="item.is_inactive=='D'">মৃত</td>
                    <td class="text-center" v-else-if="item.is_inactive=='T'">বদলি</td>
                    <td class="text-center" v-else-if="item.is_inactive=='A'">বহিঃস্কৃত</td>
                    <td class="text-center" v-else-if="item.is_inactive=='S'">সাময়িক বহিঃস্কৃত</td>
                    <td class="text-center" v-else-if="item.is_inactive=='G'">চাকুরি হতে ইস্তফা নিয়েছেন</td>
                    <td class="text-center" v-else style="color:red !important">নির্বাচন করা
                        হয়নি
                    </td>

                    <td class="text-center" v-if="item.salary_eft=='1'">হ্যাঁ</td>
                    <td class="text-center" v-else>না</td>
                {{--    <td class="text-center" v-if="item.salary_eft===null" style="color:red !important">নির্বাচন করা হয়
                        নি
                    </td>--}}

                </tr>
                </tbody>
            </table>
            <br>
            <br>
            <div align="center" class="">
                <button type="button" class="btn btn-info" onclick="window.print()"> Print</button>
            </div>
        </div>
        <teacher-modal ref="modal" :newteacher="newTeacher" :data="selectedTeacherData" :trainings="trainings"
                       :designations="designations" :subjects="subjects" :training-array="trainingArray"
                       @cancel-update="cancelUpdate"></teacher-modal>

    </div>
    @include('components/teacherStaffInfoModal')
@endsection
@section('javascript')
    <?php $inst_type = Auth::user()->institute_type; ?>
    @if($inst_type ==1)
        <script src="{{ asset('cache/desigAndSubjectSchool.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==3)
        <script src="{{ asset('cache/desigAndSubjectCollege.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==4)
        <script src="{{ asset('cache/desigAndSubjectSnC.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==2)
        <script src="{{ asset('cache/desigAndSubjectMadrasa.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==5)
        <script src="{{ asset('cache/desigAndSubjectTech.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==6)
        <script src="{{ asset('cache/desigAndSubjectTtc.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==7)
        <script src="{{ asset('cache/desigAndSubjectProf.js') }}" type="text/javascript"></script>
    @elseif($inst_type ==9)
        <script src="{{ asset('cache/desigAndSubjectEng.js') }}" type="text/javascript"></script>
    @endif
    <script src="{{ asset('cache/training.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/teacherStaffInfo.js') }}" type="module"></script>
@endsection
