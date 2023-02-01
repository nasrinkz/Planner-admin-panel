<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ورود به سامانه مدیریتی اپلیکیشن برنامه ریزی</title>
    <link type="text/css" href="{{asset('loginStyle/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('loginStyle/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{asset('loginStyle/css/style.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    @livewireStyles
</head>
<body dir="rtl">
<livewire:manage-login.do-login-component/>
<script src="{{asset('loginStyle/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('loginStyle/js/jquery-3.1.1.min.js')}}"></script>
@livewireScripts
<script src="https://cdn.jsdeliver.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
