<nav class="navbar navbar-expand-sm navbar-dark bg-primary p-0 pb-0 sticky-top">
    <ul class="navbar-nav">
        <?php if(in_array($inst_type, array(1, 3, 4))){?>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('common/firstPage')) ? 'active' : '' }}"
               href="{{ url('common/firstPage') }}"> মৌলিক তথ্য-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 2){?>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('common/madFirstPage')) ? 'active' : '' }}"
               href="{{ url('common/madFirstPage') }}"> মৌলিক তথ্য-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 5){?>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('technical/tecFirstPage')) ? 'active' : '' }}"
               href="{{ url('technical/tecFirstPage') }}"> মৌলিক তথ্য-১</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 7){?>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('professional/profFirstPage')) ? 'active' : '' }}"
               href="{{ url('professional/profFirstPage') }}"> মৌলিক তথ্য-১</a>
        </li>
        <?php }?>
        <?php if (!in_array($inst_type, array(6, 8, 9, 12, 13, 14))){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('common/secondPage') ? 'active' : '' }}"
               href="{{ url('common/secondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <?php }?>
        {{--School pages--}}
        <?php if ($inst_type == 1){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('school/schoolFirstPage') ? 'active' : '' }}"
               href="{{ url('school/schoolFirstPage') }}">শিক্ষার্থী-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('school/schoolSecondPage') ? 'active' : '' }}"
               href="{{ url('school/schoolSecondPage') }}">শিক্ষার্থী-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('school/schoolThirdPage') ? 'active' : '' }}"
               href="{{ url('school/schoolThirdPage') }}">শিক্ষার্থী-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('school/schoolFourthPage') ? 'active' : '' }}"
               href="{{ url('school/schoolFourthPage') }}">শিক্ষার্থী-৪</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('school/schoolFifthPage') ? 'active' : '' }}"
               href="{{ url('school/schoolFifthPage') }}">শিক্ষক-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 3){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('college/collegeFirstPage') ? 'active' : '' }}"
               href="{{ url('college/collegeFirstPage') }}">শিক্ষার্থী-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('college/collegeSecondPage') ? 'active' : '' }}"
               href="{{ url('college/collegeSecondPage') }}">শিক্ষার্থী-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('college/collegeThirdPage') ? 'active' : '' }}"
               href="{{ url('college/collegeThirdPage') }}">শিক্ষার্থী-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('college/collegeFourthPage') ? 'active' : '' }}"
               href="{{ url('college/collegeFourthPage') }}">শিক্ষার্থী-৪</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('college/collegeFifthPage') ? 'active' : '' }}"
               href="{{ url('college/collegeFifthPage') }}">শিক্ষক-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 4){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncFirstPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncFirstPage') }}">শিক্ষার্থী-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncSecondPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncSecondPage') }}">শিক্ষার্থী-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncThirdPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncThirdPage') }}">শিক্ষার্থী-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncFourthPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncFourthPage') }}">শিক্ষার্থী-৪</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncFifthPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncFifthPage') }}">শিক্ষার্থী-৫</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('schoolAndCollege/sncSixPage') ? 'active' : '' }}"
               href="{{ url('schoolAndCollege/sncSixPage') }}">শিক্ষক-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 2){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdFirstPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdFirstPage') }}">শিক্ষার্থী-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdSecondPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdSecondPage') }}">শিক্ষার্থী-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdThirdPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdThirdPage') }}">শিক্ষার্থী-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdFourthPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdFourthPage') }}">শিক্ষার্থী(বয়সভিত্তিক)-৪</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdFifthPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdFifthPage') }}">শিক্ষার্থী-৫</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdSixthPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdSixthPage') }}">শিক্ষার্থী-৬</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('madrasah/madStdSeventhPage') ? 'active' : '' }}"
               href="{{ url('madrasah/madStdSeventhPage') }}">শিক্ষক-১</a>
        </li>
        <?php } ?>
        <?php if ($inst_type == 5){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdFirstPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdFirstPage') }}">শিক্ষার্থী-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdSecondPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdSecondPage') }}">শিক্ষার্থী-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdThirdPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdThirdPage') }}">শিক্ষার্থী-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdFourthPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdFourthPage') }}">শিক্ষার্থী-৪</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdFifthPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdFifthPage') }}">শিক্ষার্থী-৫</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdSixthPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdSixthPage') }}">শিক্ষার্থী(বয়সভিত্তিক)-৬</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdSeventhPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdSeventhPage') }}">শিক্ষক-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('technical/tecStdEightPage') ? 'active' : '' }}"
               href="{{ url('technical/tecStdEightPage') }}">শিক্ষক-২</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 12){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateComFirstPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateComFirstPage') }}">মৌলিক তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateComSecondPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateComSecondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateStdFirstPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateStdFirstPage') }}">শিক্ষার্থীর তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateStdSecondPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateStdSecondPage') }}">শিক্ষার্থীর তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateStdThirdPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateStdThirdPage') }}">শিক্ষার্থীর তথ্য-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateTeachFirstPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateTeachFirstPage') }}">শিক্ষকের তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateTeachSecondPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateTeachSecondPage') }}">শিক্ষকের তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateTeachThirdPage') ? 'active' : '' }}"
               href="{{ url('privateUni/privateTeachThirdPage') }}">শিক্ষকের তথ্য-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('privateUni/privateBibidho') ? 'active' : '' }}"
               href="{{ url('privateUni/privateBibidho') }}">বিবিধ</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 8){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicComFirstPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicComFirstPage') }}">মৌলিক তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicComSecondPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicComSecondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicStdFirstPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicStdFirstPage') }}">শিক্ষার্থীর তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicStdSecondPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicStdSecondPage') }}">শিক্ষার্থীর তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicStdThirdPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicStdThirdPage') }}">শিক্ষার্থীর তথ্য-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicTeachFirstPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicTeachFirstPage') }}">শিক্ষকের তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicTeachSecondPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicTeachSecondPage') }}">শিক্ষকের তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicTeachThirdPage') ? 'active' : '' }}"
               href="{{ url('publicUni/publicTeachThirdPage') }}">শিক্ষকের তথ্য-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('publicUni/publicBibidho') ? 'active' : '' }}"
               href="{{ url('publicUni/publicBibidho') }}">বিবিধ</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 9){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('english/engComFirstPage') ? 'active' : '' }}"
               href="{{ url('english/engComFirstPage') }}">মৌলিক তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('english/engComSecondPage') ? 'active' : '' }}"
               href="{{ url('english/engComSecondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('english/engStdFirstPage') ? 'active' : '' }}"
               href="{{ url('english/engStdFirstPage') }}">শিক্ষার্থীর তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('english/engStdSecondPage') ? 'active' : '' }}"
               href="{{ url('english/engStdSecondPage') }}">শিক্ষার্থীর তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('english/engTeachFirstPage') ? 'active' : '' }}"
               href="{{ url('english/engTeachFirstPage') }}">শিক্ষকের তথ্য-১</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 7){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('professional/profStdFirstPage') ? 'active' : '' }}"
               href="{{ url('professional/profStdFirstPage') }}">শিক্ষার্থীর তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('professional/profStdSecondPage') ? 'active' : '' }}"
               href="{{ url('professional/profStdSecondPage') }}">শিক্ষার্থীর তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('professional/profStdThirdPage') ? 'active' : '' }}"
               href="{{ url('professional/profStdThirdPage') }}">শিক্ষার্থীর তথ্য-৩</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('professional/profStdFourthPage') ? 'active' : '' }}"
               href="{{ url('professional/profStdFourthPage') }}">শিক্ষার্থীর তথ্য-৪</a>
        </li>
        <?php }?>
        <?php if ($inst_type == 6){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('ttc/ttcFirstPage') ? 'active' : '' }}"
               href="{{ url('ttc/ttcFirstPage') }}">মৌলিক তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('ttc/ttcSecondPage') ? 'active' : '' }}"
               href="{{ url('ttc/ttcSecondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('ttc/ttcStdFirstPage') ? 'active' : '' }}"
               href="{{ url('ttc/ttcStdFirstPage') }}">শিক্ষার্থীর তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('ttc/ttcTeacherFirstPage') ? 'active' : '' }}"
               href="{{ url('ttc/ttcTeacherFirstPage') }}">শিক্ষকের তথ্য-১</a>
        </li>
        <?php }?>

        {{--Medical pages--}}
        <?php if (in_array($inst_type, array(13, 14)) ){?>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('medical/medicalFirstPage')) ? 'active' : '' }}"
               href="{{ url('medical/medicalFirstPage') }}"> মৌলিক তথ্য-১</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('medical/medicalSecondPage') ? 'active' : '' }}"
               href="{{ url('medical/medicalSecondPage') }}">মৌলিক তথ্য-২</a>
        </li>
        <?php }?>
        <?php if (in_array($inst_type, array(13, 14)) ){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('medical/medicalStdFirstPage') ? 'active' : '' }}"
               href="{{ url('medical/medicalStdFirstPage') }}">শিক্ষার্থীর তথ্য</a>
        </li>
        <?php }?>
        <?php if (in_array($inst_type, array(13, 14)) ){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('medical/medicalStdSecondPage') ? 'active' : '' }}"
               href="{{ url('medical/medicalStdSecondPage') }}">শিক্ষক/কর্মকর্তা/কর্মচারী সম্পর্কিত</a>
        </li>
        <?php }?>

        <?php if (in_array($inst_type, array(13, 14)) ){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('medical/medicalBibidho') ? 'active' : '' }}"
               href="{{ url('medical/medicalBibidho') }}">বিবিধ</a>
        </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('medical/medicalTeacher') ? 'active' : '' }}"
                   href="{{ url('medical/medicalTeacherPage') }}">শিক্ষক/কর্মচারীর তথ্য বিবরণী</a>
            </li>
        <?php }?>
            {{--Medical ends--}}
            <?php if (in_array($inst_type, array(9))){?>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('common/thirdPageEng') ? 'active' : '' }}"
                   href="{{ url('common/thirdPageEng') }}"> বিবিধ-১ </a>
            </li>
            <?php }?>
            <?php if (in_array($inst_type, array(2))){?>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('common/thirdPageMad') ? 'active' : '' }}"
                   href="{{ url('common/thirdPageMad') }}"> বিবিধ-১ </a>
            </li>
            <?php }?>

        <?php if (!in_array($inst_type, array(8, 12, 13, 14))){?>
            <?php if (!in_array($inst_type, array(2,9))){?>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('common/thirdPage') ? 'active' : '' }}"
                   href="{{ url('common/thirdPage') }}"> বিবিধ-১ </a>
            </li>
            <?php }?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('common/fourthPage') ? 'active' : '' }}"
               href="{{ url('common/fourthPage') }}">বিবিধ-২</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('common/fifthPage') ? 'active' : '' }}"
               href="{{ url('common/fifthPage') }}">বিবিধ-৩</a>
        </li>
        <?php }?>
        <?php if (!in_array($inst_type, array(8, 12, 13, 14))){?>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('common/teacherStaffInfo') ? 'active' : '' }}"
               href="{{ url('common/teacherStaffInfo') }}">শিক্ষক-কর্মচারী তথ্য</a>
        </li>
        <?php }?>
    </ul>
    <ul class="navbar-nav justify-content-end ml-auto">
        <li>
            <a href="{{ url('logout') }}" class="btn logOutButton" style="">Home Page</a>
        </li>
    </ul>
</nav>

