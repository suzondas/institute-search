@extends('welcomeTemplate')
@section('content')
    <div class="container" id="pagecontainer">
        @include('components/banner')
        {{--Login Area--}}

        <div class="row justify-content-center pt-5" style="margin-left:-60px;">

            <div class="card">
                <div class="card-header" style="text-align:center">
                    তথ্য প্রদান করতে সাইন ইন করুন <br><b>(EIIN-বিহীন  প্রতিষ্ঠান)</b>
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
                        <input type="text" name="eiin" class="form-control mt-2" placeholder="User Id" />
                        <input type="password"  name="password" class="form-control mt-2" placeholder="Password" />
                        <input class="form-control mt-2 btn-success" type="submit" value="Log In" />
                    </form>
                </div>
            </div>
        </div>
        {{--<div class="row justify-content-center pt-5">
            <a href="" class="font-weight-bold p-1" style="border:1px solid black">BANBEIS Panel</a>
            <a href="" class="font-weight-bold p-1 pl-2" style="border:1px solid black">DEO Panel</a>
            <a href="" class="font-weight-bold p-1 pl-2" style="border:1px solid black">AP/USEO Panel</a>
        </div>--}}

        @include('components/footer')

    </div>
@endsection
