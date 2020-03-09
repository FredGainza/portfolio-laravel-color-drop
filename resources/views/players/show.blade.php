@extends('layouts.admin')

@section('scripts-header')
    <style>
    tr td img{
        width: 75px;
    }

    img.col-perso{
        width: 60px;
    }

    img.col-view{
        width: 400px;
        height: auto;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto my-3">
            <div class="card">
                <div class="card-header">
                Fiche Joueur
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mt-3"><b>Nom</b> :  {{ $player->name }}</li>
                        <hr>
                        <li class="mt-3"><b>Difficulté</b> :  {{ ucfirst($player->difficulty) }}</li>
                        <hr>
                        <li class="mt-3 mb-0"><b>Nom des parents</b> : <a href="/users/{{$user->id}}">{{ ucfirst($user->name)}}</a> </li>
                        <hr>
                        <li class="mt-3"><b>Nombre de parties</b> :  {{ $player->nbGames}}</li>
                        <hr>
                        <li class="mt-3"><b>Score cumulé</b> :  {{ $player->score }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
