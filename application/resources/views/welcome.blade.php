@extends('welcomeTemplate')
@section('content')
    <div class="container" id="pagecontainer">
        @include('components/banner')
        {{--Login Area--}}
        <div style="margin-left: -60px;">
            <div class="row justify-content-center pt-5">
                <a href="{{ asset('upload/USEO_Letter.pdf') }}" target="_blank" class="btn m-1" style="background-color: gainsboro;border-bottom: 2px solid #e57525;">জরিপের
                    সময়সূচী</a>
                <a href="{{ asset('upload/instruction.pdf') }}" target="_blank" class="btn m-1" style="background-color: gainsboro;border-bottom: 2px solid #e57525;">জরিপ
                    নির্দেশিকা</a>
                <a href="{{ asset('upload/contact.pdf') }}" target="_blank" class="btn m-1"
                   style="background-color: gainsboro;border-bottom: 2px solid #e57525;">যোগাযোগ</a>
            </div>

            <div class="row justify-content-center pt-3">


                <div class="row card">

                    <div class="card-header" style="background:#e57525;color:white;font-weight: bold;text-align:center">
                        তথ্য হালনাগাদ করতে Login করুন
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="login" method="post" class="form-group">
                            {{ csrf_field()}}
                            <div class="input-group mb-3" style="width:250px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width:90px" id="basic-addon1">EIIN</span>
                                </div>
                                <input type="text" name="eiin" style="width:90px" class="form-control"
                                       placeholder="EIIN"/>
                            </div>
                            <div class="input-group mb-3" style="width:250px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>
                            <input class="form-control mt-2 btn-info text-white" type="submit" value="Log In"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-1 fixed-bottom btn btn-success" style="margin-left:-60px;">
                Developed by ICT DIVISION © BANBEIS, MoE
            </div>
        </div>
        {{--<div class="row justify-content-center pt-5">
            <a href="" class="font-weight-bold p-1" style="border:1px solid black">BANBEIS Panel</a>
            <a href="" class="font-weight-bold p-1 pl-2" style="border:1px solid black">DEO Panel</a>
            <a href="" class="font-weight-bold p-1 pl-2" style="border:1px solid black">AP/USEO Panel</a>
        </div>--}}

    </div>
@endsection
