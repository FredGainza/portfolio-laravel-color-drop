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
    .cadre-form{
        padding: 1.5vw 1vw;
        border: 2px solid #696969f2;
        border-radius: .4vw;
        -webkit-box-shadow: 5px 5px 14px 0px rgba(50, 50, 50, 0.39);
        -moz-box-shadow:    5px 5px 14px 0px rgba(50, 50, 50, 0.39);
        box-shadow:         5px 5px 14px 0px rgba(50, 50, 50, 0.39);
    }
    .titre-form{
        padding: .5rem .75rem;
        background-color: #383333;
        border-radius: 5px;
        color: #c9c9c9
    }
    </style>
    <link rel="stylesheet" href="../../css/hamburger.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto my-3">
            <h3 class="text-center titre-form mb-3">EDITER UN JOUEUR</h3>
                <div class="cadre-form">
                    <form action="{{ route('gamemaj', $player->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nom Joueur</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', ucfirst($player->name)) }}" placeholder="Saisir le nom">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Nom Parents</label>
                            <div class="select">
                                <select name="user_id" value="{{ old($player->user_id, $player->user_id) }}" class="custom-select" selected>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" <?= $player->user_id == $user->id ? "selected" : ""; ?>>{{ ucfirst($user->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="">Difficulté</label>

                            <select name="difficulty" value="{{ old('difficulty', $player->difficulty) }}" class="custom-select" selected>
                                <option value="facile" <?= $player->difficulty == "facile" ? "selected" : ""; ?>>Facile</option>
                                <option value="moyen" <?= $player->difficulty == "moyen" ? "selected" : ""; ?>>Moyen</option>
                                <option value="difficile" <?= $player->difficulty == "difficile" ? "selected" : ""; ?>>Difficile</option>
                            </select>
                            @error('difficulty')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Nombre de parties</label>
                            <input type="number" min="0" step="1" name="nbGames" id="nbGames" class="form-control @error('nbGames') is-invalid @enderror" value="{{ old('nbGames', $player->nbGames) }}" placeholder="Saisir le nombre de parties">
                            @error('nbGames')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Score cumulé</label>
                            <input type="number" min="0" step="1" name="score" id="score" class="form-control @error('score') is-invalid @enderror" value="{{ old('score', $player->score) }}" placeholder="Saisir le score cumulé">
                            @error('score')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark w-100 mt-3">Editer le joueur</button>

                    </form>
                </div>
        </div>
    </div>
</div>

@endsection
@section('scripts-footer')
<script type="text/javascript" src="../../js/hamburger.js"></script>
@endsection
