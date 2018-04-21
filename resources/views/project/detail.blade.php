{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 id="header-title">{{$title}}</h1>
@stop

@section('content')
        <div id="crud-app"></div>
        <script src="{{asset('/public/js/app.js')}}" ></script>
@stop

@section('css')
    <style>
        .img-rounded {
            height: 65px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('/public/css/admin_custom.css')}}">
    <link href="{{asset('/public/css/app.css')}}" rel="stylesheet" type="text/css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop