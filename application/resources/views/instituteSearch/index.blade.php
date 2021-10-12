@extends('welcomeTemplate')
@section('content')
    <div class="container" id="pagecontainer">
        <div class="row justify-content-center pt-3">
            <div class="text-center">
                <img src="{{ URL::to('/') }}/img/mujib_borsho.png" alt="মুজিব বর্ষ" class="mujib_borsho">
                <div class="d-table-cell" style="font-size: 18px;line-height: 20px">
                    গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
                    শিক্ষা মন্ত্রণালয়<br>
                    বাংলাদেশ শিক্ষাতথ্য ও পরিসংখ্যান ব্যুরো(ব্যানবেইস)<br>
                    www.banbeis.gov.bd<br><br>

            <h2 style="color:#c51f1a;" class="">Institute Search</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center pt-1" style="margin-left: -60px;">

            <form action="login" method="post" class="form-group">
                {{ csrf_field()}}
            <label for="eiin" style="font-size: 18px;">Search Your Institute by EIIN</label>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="input-group" style="width:250px;">
                <input type="number" id="eiin" class="form-control" name="eiin">&nbsp;
                <span class="input-group-btn">
                  <input  class="btn btn-success" type="submit" value="Search"/>
                  </span>
            </div>
        </form>
        </div>
        <div class="row justify-content-center pt-1 fixed-bottom btn btn-success" style="margin-left:-60px;">
            Developed by ICT DIVISION © BANBEIS, MoE
        </div>
    </div>
@endsection
