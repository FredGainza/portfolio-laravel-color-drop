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

            <div class="row pt-0 px-5">
                <h3 class="mx-auto textEnfant">Compte de : {{$users->name}}</h3>
            </div>
            <hr>

            <form action="" method="post">
                @csrf
                <!-- Nom utilisateur -->
                <div class="row mt-3">
                    <div class="col-12 flex-init mx-resp">
                        <i class="fas fa-user prefix mx-2"></i>
                        <label for="name">Nom de l'utilisateur</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom" value="{{ $users->name }}"><br>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Mail utilisateur -->
                <div class="row">
                    <div class="col-12 flex-init mx-resp">
                        <i class="far fa-envelope mx-2"></i>
                        <label for="email">Mail de l'utilisateur</label>
                        <input type="mail" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adresse email" value="{{ $users->email }}">
                        <div class="text-right my-1">
                            <a href="{{ route('password.update') }}" target="_blank">Changer le mot de passe</a>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <br>
                    </div>

                </div>

                <!-- Recevoir mail -->
                <div class="row">
                    <div class="col-12 flex-init mx-resp">
                        <i class="far fa-paper-plane mx-2"></i>
                        <label for="newsletter">Recevoir les emails</label>
                        <select name="newsletter" value="{{ old('newsletter', $users->newsletter) }}" class="custom-select" selected>
                            <option value="1" <?= $users->newsletter == "1" ? "selected" : ""; ?>>Oui</option>
                            <option value="0" <?= $users->newsletter == "0" ? "selected" : ""; ?>>Non</option>
                        </select>
                        @error('newsletter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- BTN Submit -->
                <div class="row mt-3">
                    <div class="col-12 flex-init mx-resp">
                        <button class="btn btn-info btn-block mt-3">Modifier</button>
                    </div>
                </div>
            </form>

            <!-- Link Page précédente -->
            <div class="row mt-3 mb-4">
                <div class="col-sm-6 offset-sm-3 text-center">
                    <a href="{{ route('pindex') }}">Page précédente</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
