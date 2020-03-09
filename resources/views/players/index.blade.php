@extends('layouts.admin')

@section('scripts-header')
    <style>
    tr td img{
        width: 75px;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: .5rem .75rem;
    }

    img.col-perso{
        width: 60px;
    }

    img.col-view{
        width: 400px;
        height: auto;
    }

    .bg-body{
        background-color: #f8fafc;
    }
    .bg-body {
        background-color: #f8fafc;
    }
    table thead th {
        vertical-align: middle !important;
    }

    @media screen and (max-width: 767px){
        .table th, .table td {
            padding: 0.6rem !important;
        }
        thead tr {
            font-size: .8rem !important;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <h1>Liste des joueurs</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('players.create') }}"><button class="btn btn-dark mr-0">Ajouter un joueur</button></a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="table-responsive">
            <table class="table center text-center table-striped" id="tab_player">
                <thead>
                    <tr class="text-center bg-dark text-white">
                        <th>Nom</th>
                        <th>Nom des parents</th>
                        <th>Difficulté</th>
                        <th>Nombre de parties</th>
                        <th>Score cumulé</th>
                        <th class="text-nowrap">Actions</th>
                      </tr>
                </thead>
                <tbody>
                    @if(!empty($players))
                        @foreach($players as $player)
                            <tr id="{{ $player->id }}">
                                <td>{{ ucfirst($player->name) }}</td>
                                <td>
                                    @foreach($users as $user)
                                        {{ $player->user_id == $user->id ? ucfirst($user->name) : ''}}
                                    @endforeach
                                </td>
                                <td>{{ ucfirst($player->difficulty) }}</td>
                                <td>{{ $player->nbGames}}</td>
                                <td>{{ $player->score }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('players.show', $player->id) }}"><i class="far fa-eye text-info mx-3"></i></a>
                                    <a href="{{ route('players.edit', $player->id) }}"><i class="fas fa-pen text-success mx-3"></i></a>
                                    <form action="{{ route('players.destroy', $player->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="_id" id="_id" value="{{$player->id}}">
                                        <button type="submit" class="btn btn" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection




