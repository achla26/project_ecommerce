<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.ico')}}">

 
        @yield('css')
        <!-- Theme Config Js -->
        <script src="{{asset('assets/backend/js/hyper-config.js')}}"></script>

        <!-- App css -->
        <link href="{{asset('assets/backend/css/app-saas.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
        <link href="{{asset('assets/backend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- Icons css -->
        <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        
    </head>
    <style>
        .error_msg{
            color:red;
        }
    </style>
    <body>