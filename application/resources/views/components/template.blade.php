<?php
$inst_id = Auth::user()->institute_id;
$inst_type = Auth::user()->institute_type;
$user_type = Auth::user()->user_type;
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>বার্ষিক শিক্ষা জরিপ-২০২০। ব্যানবেইস</title>
    <style>
        input {pointer-events: none !important;} option {pointer-events: none !important;} button {pointer-events: none !important;}  select {pointer-events: none !important;}  textarea{pointer-events: none !important;}
    </style>
    <!-- Scripts -->
    <script type="text/javascript">
        {{--var apiServer = "<?php echo GetApiServer::URL();?>";--}}
        // var apiServer = "http://202.72.235.210/survey_api/public";
        // var apiServer = "http://192.168.245.33/survey_api/public";
        var apiServer = "http://localhost:8000";
        var inst_id = "<?php echo $inst_id;?>";
        var inst_type = "<?php echo $inst_type?>"</script>
    <script src="{{ asset('js/app.js') }}" defer></script>
@yield('javascript')
<!-- Styles -->
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid" id="pagecontainer">
    {{--Top Banner--}}
    @include('components.banner')
    {{--Navbar--}}
    @include('components.navBar')
    {{--Content Inject--}}
    @yield('content')
    {{--Content Inject End--}}
    {{--Footer--}}
    @include('components.footer')
</div>
<div class="locker">
    <div class="d-flex justify-content-center">
        <h3 class="p-2">Wait...</h3>
        <div class="spinner-border" role="status"></div>
    </div>
</div>
<script>
    let elems = document.getElementById('pagecontainer').getElementsByTagName('input');

    for(let i = 0; i < elems.length; i++) {
        elems[i].disabled = true;
    }
</script>
</body>
</html>
