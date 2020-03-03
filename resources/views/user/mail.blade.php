@extends('layouts.parents')
@section('title', 'Edition de l\'utilisateur')
@section('scripts-header')

<style>
    .textEnfant {
        color: #5f0707;
        font-weight: 800;

        border-top: 1px solid #0d0d0dfa;
        border-bottom: 1px solid #0d0d0dfa;
    }
</style>

@endsection

@section('content')

<main class="pt-20p">
    <div class="container">
        <div class="containerPerso bg-encart py-3">

            <div class="row pt-0">
                <h3 class="mx-auto textEnfant">Compte de : {{$users->name}}</h3>
            </div>
            <hr>

            <form action="" method="post">
                @csrf
                <!-- Prénom -->
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <span><i class="fas fa-user prefix mx-2"></i>Nom de l'utilisateur</span>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom" value="{{ $users->name }}"><br>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Difficulté -->
                <div class="row mt-3">
                    <div class="col-sm-10 offset-sm-1">
                        <span><i class="far fa-envelope mx-2"></i>Mail de l'utilisateur</span>
                        <input type="mail" id="email" name="email" class="form-control mt-2 @error('email') is-invalid @enderror" placeholder="Adresse email" value="{{ $users->email }}"><br>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-info btn-block mt-3">Modifier</button>
                    </div>
                </div>
            </form>

            <div class="row mt-3 mb-4">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <a href="{{ route('pindex') }}">Page précédente</a>
                </div>
            </div>
        </div>
    </div>
    <div id="option" class="row option">
        <div class="width-button" id="audioTool">
            <a href="https://project-color.fgainza.fr/pindex"><img src="img/config.png" id="config" title="Administration Parents" class="width-button disp-but audio3"></a>
            <a href="https://project-color.fgainza.fr/help"><img src="img/info.png" id="info" title="Informations et Aide" class="width-button disp-but audio4"></a>
        </div>
    </div>
</main>
@endsection
