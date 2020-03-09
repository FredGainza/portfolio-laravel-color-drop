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
            Fiche Parent
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mt-3"><b>Nom</b> :  {{ $user->name }}</li>
                    <hr>
                    <li class="mt-3"><b>Adresse mail</b> :  {{ $user->email }}</li>
                    <hr>
                    <li class="mt-3"><b>Notifications activées</b> :  <?= $user->message2players == 1 ? "oui" : "non"; ?></li>
                    <hr>
                    <li class="mt-3"><b>Accepte les mails</b> :  <?= $user->newsletter == 1 ? "oui" : "non"; ?></li>
                    <hr>
                    <li class="mt-3 mb-0"><b>Liste des joueurs</b> : </li>
                    <ul class="list-unstyled">
                        @if(!empty($players))
                            @foreach($players as $player)
                                @php
                                    $playerId = $player->id;
                                @endphp
                                <li><a href="/players/{{ $player->id}}">{{ $player->name}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </ul>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
