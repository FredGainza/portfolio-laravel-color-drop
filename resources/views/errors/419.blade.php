@extends('errors::minimal')
@section('scripts-header')
    <style>
       html, body {
        background-image: url("../../../img/erreurs/500.png");
        background-attachment: fixed;
        background-position: top;
        background-position-x: center;
        background-color: #3787f1;
        background-repeat: no-repeat;
        background-size: contain;
        color: white;
    }
    </style>
@endsection
@section('title', 'Page expirée')
@section('code', '419')
@section('message', 'La page a expiré. Veuillez recommencer')
