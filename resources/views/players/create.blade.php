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
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mx-3 mt-3">
            <h3 class="text-center titre-form mb-3">AJOUTER UN JOUEUR</h3>
            <div class="cadre-form">
                <form class="mt-3" action="{{ route('players.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Prénom</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Saisir le prénom">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Parent</label>
                        <div class="select">
                            <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option selected>Choisir son parent</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="difficulty">Niveau de difficulté</label>
                        <select name="difficulty" id="difficult" class="custom-select">
                            <option value="">Choisir le niveau de difficulté</option>
                            <option value="facile">Facile</option>
                            <option value="moyen">Moyen</option>
                            <option value="difficile">Difficile</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-3">Ajouter le joueur</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
