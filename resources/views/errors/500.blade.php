@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/500.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #37c5f1;
        background-repeat: no-repeat;
        background-size: contain;
        color: white;
    }
    </style>
@endsection
@section('title', 'Erreur Serveur')
@section('code', '500')
@section('message', 'La requête ne peut aboutir à cause d\'une erreur serveur')
