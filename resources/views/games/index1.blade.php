@extends('layouts.admin')
@section('scripts-header')
    <style>
        .page-item.active .page-link {
            background-color: #6c757d !important;
            border-color: #7f878e !important;
            color :#f5f5f5 !important;
        }
        .page-link:hover{
            background-color: #f2f2f2c2 !important;
            border-color: #7f878e !important;
            color: #242424 !important;
        }
        .page-link {
            color: #242424 !important;
            background-color: #e3e3e3 !important;
            border: 1px solid #7f878e !important;
        }
        table thead th {
            vertical-align: middle !important;
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
        <h1>Liste des games</h1>
    </div>

    <div class="row">
        <table class="table center table-striped" id="tab_game">
            <thead class="bg-light">
                <tr class="text-center bg-dark text-white">
                    <th>Id</th>
                    <th>Nom Player</th>
                    <th>Nom Parents</th>
                    <th>Difficulté</th>
                    <th>Numéro de la partie</th>
                    <th>Num du niveau</th>
                    <th>Score de la partie</th>
                    <th>Durée de la partie</th>
                    <th>Score du level</th>
                    <th>Durée du level</th>
                    <th>Date de réalisation</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($games))
                    @foreach($games as $game)
                        <tr class="text-center">
                            <td>{{ $game->id }}</td>
                            @php
                                $player = App\Models\Player::find($game->player_id);
                                $user = App\Models\User::find($player->user_id);
                            @endphp
                            <td>{{ $player->name }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $game->difficulty }}</td>
                            <td>{{ $game->numGame}}</td>
                            <td>{{ $game->level_id }}</td>
                            <td>{{ $game->score_game }}</td>
                            <td>{{ $game->duree_game }}</td>
                            <td>{{ $game->score_level }}</td>
                            <td>{{ $game->duree_level }}</td>
                            <td>{{ $game->created_at->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('games.destroy', $game->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_id" id="_id" value="{{$game->id}}">
                                    <button type="submit" class="btn btn-sm" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger border-0 bg-body"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ $games->links() }}
    </div>
</div>
@endsection
