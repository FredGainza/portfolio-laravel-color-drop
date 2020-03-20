@extends('layouts.admin')
@section('scripts-header')
    <style>
        .table th, .table td {
            vertical-align: middle;
            padding: .5rem .75rem;
        }
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
    <div class="row my-3">
        <div class="col-lg-4 text-left">
            <h1>Liste des parties</h1>
        </div>
        <div class="offset-lg-2 col-lg-6 text-right">
            <div class="select">
                <select onchange="window.location.href = this.value" class="custom-select">
                    <option class="w-100" value="{{ route('games.index1') }}" @unless($name) selected @endunless>-- Toutes les parties --</option>
                    @foreach($players as $player)
                        @php
                            $playerActivite = $player->nbGames;
                        @endphp
                        <option value="{{ route('games.player', $player->name) }}"
                            @if ($playerActivite == 0)
                             class="text-danger"
                            @endif
                            {{ $name == $player->name ? ' selected' : '' }}>{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <table class="table center table-striped" id="tab_game">
            <thead class="bg-light">
                <tr class="text-center bg-dark text-white">
                    <th>N° de partie</th>
                    <th>Nom Player</th>
                    <th>Nom Parents</th>
                    <th>Difficulté</th>
                    <th>Score Partie</th>
                    <th>Durée Partie</th>
                    <th>Date de réalisation</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($games))
                    @php
                        $nbParties = count($games)/10;
                    @endphp
                    @for($i=0; $i<$nbParties; $i++)
                        <tr class="text-center">
                            <td id="numPartie"><span>{{$i+1}}</span></td>
                            @php
                                $d=(10*($i+1)-5);
                                $game = $games[$d];

                                $playerId = $game->player_id;
                                $player = App\Models\Player::find($playerId);
                                $userId = $player->user_id;
                                $user = App\Models\User::find($userId);
                            @endphp
                            <td id="player"><span>{{$player->name}}</span></td>
                            <td id="user"><span>{{$user->name}}</span></td>
                            <td id="difficulty"><span>{{$games[10*($i+1)-1]->difficulty}}</span></td>
                            <td id="score_game"><span>{{$games[10*($i+1)-1]->score_game}}</span></td>
                            <td id="duree_game"><span>{{$games[10*($i+1)-1]->duree_game}}</span></td>
                            <td id="date"><span>{{ $games[10*($i+1)-1]->created_at->format('d/m/Y') }}</span></td>
                            <td>
                                <form action="{{ route('games.destroy', $i) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_id" id="_id" value="{{$i}}">
                                    <input type="hidden" name="_playerId" id="_playerId" value="{{$player->id}}">
                                    <button type="submit" class="btn" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
        {{-- {{ $games->links() }} --}}
    </div>
</div>
@endsection
