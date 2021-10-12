<?php

namespace App\Http\Controllers;

use App\Models\Institutes;
use App\Models\Submission_infos;
use App\Models\Teachers_staff_summaries;
use App\Models\Technical_teachers_summaries;
use App\Models\Teach_general_infos;

class SubmissionInfosController extends Controller
{
    public function getInfo($inst_id, $inst_type)
    {
        $err = [];
        $message = [];
        try {
            $row = Submission_infos::where(['institute_id' => $inst_id])->first();
            if ($row) {
                if ($inst_type == '1') {
                    if ($row->school_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->school_3rd_page != '1') {
                        array_push($message, 'শিক্ষার্থী-৩ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->school_5th_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '3') {
                    if ($row->college_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->college_3rd_page != '1') {
                        array_push($message, 'শিক্ষার্থী-৩ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->college_5th_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '4') {
                    if ($row->school_col_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->school_col_4th_page != '1') {
                        array_push($message, 'শিক্ষার্থী-৪ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->school_col_6th_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '2') {
                    $teachStaff = Teachers_staff_summaries::where(['institute_id' => $inst_id])->sum('teachers_in_service');
                    $FemteachStaff = Teachers_staff_summaries::where(['institute_id' => $inst_id])->sum('female_teachers_in_service');
                    $vocTeachStaff= Technical_teachers_summaries::where(['institute_id' => $inst_id])->sum('teachers_in_service');
                    $vocFemTeachStaff= Technical_teachers_summaries::where(['institute_id' => $inst_id])->sum('female_teachers_in_service');
                    $totTeachStaff=$teachStaff+$vocTeachStaff;
                    $totFemTeachStaff=$FemteachStaff+$vocFemTeachStaff;
                    $teachStaffProfile = Teach_general_infos::where(['institute_id' => $inst_id])->count('institute_id');
                    $femTeachStaffProfile = Teach_general_infos::where(['institute_id' => $inst_id])->where(['sex' => 2])->count('institute_id');

                    if ($row->com_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->madrasa_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->madrasa_4th_page != '1') {
                        array_push($message, 'শিক্ষার্থী(বয়সভিত্তিক)-৪ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->madrasa_7th_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }  if ($totTeachStaff != $teachStaffProfile) {
                        array_push($message, 'শিক্ষক-১ পাতার মোট শিক্ষক সংখ্যা'.'('.$totTeachStaff.')'.' এবং শিক্ষক-কর্মচারী তথ্য পাতার মোট শিক্ষক সংখ্যা'.'('.$teachStaffProfile.')'.' এর মিল নাই বিধায় সঠিক তথ্য প্রদান করুন');
                    } if ($totFemTeachStaff != $femTeachStaffProfile) {
                        array_push($message, 'শিক্ষক-১ পাতার মোট মহিলা শিক্ষক সংখ্যা'.'('.$totFemTeachStaff.')'.' এবং শিক্ষক-কর্মচারী তথ্য পাতার মোট মহিলা শিক্ষক সংখ্যা'.'('.$femTeachStaffProfile.')'.' এর মিল নাই বিধায় সঠিক তথ্য প্রদান করুন');
                    }
                }
                if ($inst_type == '5') {
                    if ($row->com_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->tec_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->tec_7th_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '6') {
                    if ($row->com_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->ttc_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->ttc_2nd_page != '1') {
                        array_push($message, 'শিক্ষক-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '7') {
                    if ($row->prof_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->prof_3rd_page != '1') {
                        array_push($message, 'শিক্ষার্থী-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }
                }
                if ($inst_type == '9') {
                    $teachStaff = Teachers_staff_summaries::where(['institute_id' => $inst_id])->sum('teachers_in_service');
                    $FemteachStaff = Teachers_staff_summaries::where(['institute_id' => $inst_id])->sum('female_teachers_in_service');
                    $teachStaffProfile = Teach_general_infos::where(['institute_id' => $inst_id])->count('institute_id');
                    $femTeachStaffProfile = Teach_general_infos::where(['institute_id' => $inst_id])->where(['sex' => 2])->count('institute_id');

                    if ($row->english_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->english_2nd_page != '1') {
                        array_push($message, 'শিক্ষার্থীর তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->english_3rd_page != '1') {
                        array_push($message, 'শিক্ষকের তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->com_tech_staf_page != '1') {
                        array_push($message, 'শিক্ষক-কর্মচারী তথ্য পাতার তথ্য প্রদান করুন।');
                    }  if ($teachStaff != $teachStaffProfile) {
                        array_push($message, 'শিক্ষক-১ পাতার মোট শিক্ষক সংখ্যা'.'('.$teachStaff.')'.' এবং শিক্ষক-কর্মচারী তথ্য পাতার মোট শিক্ষক সংখ্যা'.'('.$teachStaffProfile.')'.' এর মিল নাই বিধায় সঠিক তথ্য প্রদান করুন');
                    } if ($FemteachStaff != $femTeachStaffProfile) {
                        array_push($message, 'শিক্ষক-১ পাতার মোট মহিলা শিক্ষক সংখ্যা'.'('.$FemteachStaff.')'.' এবং শিক্ষক-কর্মচারী তথ্য পাতার মোট মহিলা শিক্ষক সংখ্যা'.'('.$femTeachStaffProfile.')'.' এর মিল নাই বিধায় সঠিক তথ্য প্রদান করুন');
                    }
                }
                if ($inst_type == '8') {
                    if ($row->com_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->pub_uni_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থীর তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->pub_uni_4th_page != '1') {
                        array_push($message, 'শিক্ষকের তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }

                }
                if ($inst_type == '12') {
                    if ($row->com_1st_page != '1') {
                        array_push($message, 'মৌলিক তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->prv_uni_1st_page != '1') {
                        array_push($message, 'শিক্ষার্থীর তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }
                    if ($row->prv_uni_4th_page != '1') {
                        array_push($message, 'শিক্ষকের তথ্য-১ পাতার তথ্য প্রদান করুন।');
                    }

                }
                if (sizeof($message) == 0) {
                    try {
                        Institutes::where(['institute_id' => $inst_id])->update(['submitted' => 1, 'upload_done' => 'Y']);
                    } catch (\Exception $e) {
                    }
                } else {
                    try {
                        Institutes::where(['institute_id' => $inst_id])->update(['submitted' => null, 'upload_done' => null]);
                    } catch (\Exception $e) {
                    }
                }
                return response()->json($message, 200);
            } else {
                array_push($message, 'সকল পাতার তথ্য প্রদান করুন।');
                return response()->json($message, 200);
            }
        } catch (\Exception $e) {
            array_push($err, $e->getMessage());
            return response()->json($err, 500);
        }
    }
}
