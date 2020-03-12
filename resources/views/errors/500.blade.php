@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/500.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #c9e28d !important;
        background-repeat: no-repeat;
        background-size: contain;
        color: white;
    }
    .bg-opacite {
        background-color: #f0f9d7 !important;
    }
    .color-msg{
        color: #4f4f4f !important;
        background-color: white !important;
    }

    </style>
@endsection
@section('title', 'Erreur Serveur')
@section('code', '500')
@section('message', 'La requête ne peut aboutir à cause d\'une erreur serveur')
