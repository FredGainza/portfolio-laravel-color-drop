@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/403.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #fcb82f !important;
        background-repeat: no-repeat;
        background-size: contain;
    }
    .bg-opacite {
        background-color: ##fdd250a3 !important;
    }
    .color-msg{
        color: #f7f8f8 !important;
        background-color: #fcb82f !important;
    }

    </style>
@endsection
@section('title', 'Interdit')
@section('code', '403')
@section('message', 'Vous n\'êtes pas autorisé à accéder à cette ressource')

