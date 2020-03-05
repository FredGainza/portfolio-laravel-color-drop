@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/404.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #07213a !important;
        background-repeat: no-repeat;
        background-size: contain;
    }
    .bg-opacite {
        background-color: hsl(210, 6%, 73.7%) !important;
    }
    </style>
@endsection
@section('title', 'Non trouvé')
@section('code', '404')
@section('message', 'Oups... Cette page ne semble pas exister')
