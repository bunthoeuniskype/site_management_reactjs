{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
        <div id="crud-app"></div>
        <script src="{{asset('/public/js/app.js')}}" ></script>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('/public/css/admin_custom.css')}}">
    <link href="{{asset('/public/css/app.css')}}" rel="stylesheet" type="text/css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop