@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/403.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #fcb82f;
        background-repeat: no-repeat;
        background-size: contain;
    }
    </style>
@endsection
@section('title', 'Interdit')
@section('code', '403')

