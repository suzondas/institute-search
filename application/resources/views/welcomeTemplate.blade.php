<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ব্যানবেইস বার্ষিক শিক্ষা জরিপ-২০২০</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /*mujib borsho logo*/
        .mujib_borsho {
            float: right;
            width: 80px;
            height: 80px;
            vertical-align: center;
        }
    </style>
</head>
<body class="">
{{--=============================Javascript Compatibility==========================--}}
<noscript>
    <style type="text/css">
        #pagecontainer {
            display: none;
        }
    </style>
    <h1 style="color:red;text-align: center;">We're sorry but This Website doesn't work properly without JavaScript
        enabled. Please enable it to continue.</h1>
</noscript>
{{--=============================Javascript Compatibility==========================--}}

{{--Loading Content--}}
@yield('content')
{{--Loading Content--}}

{{--Checking Browser Compatibility--}}
<script src="{{ asset('js/browserCheck.js') }}" type="text/javascript"></script>
</body>
</html>
