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
        <div class="col-lg-6 mx-auto my-3">
            <h3 class="text-center titre-form mb-3">AJOUTER UN UTILISATEUR</h3>
                <div class="cadre-form">
                <form action={{ route('users.store') }} method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Saisir le nom">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Saisir l'email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="message2players">Notifications activées<br></label>
                        <select name="message2players" id="message2players" class="form-control custom-select @error('message2players') is-invalid @enderror" value="{{ old('message2players') }}">
                            <option value="" selected>---- Choisir la réponse ----</option>
                            <option value="1">oui</option>
                            <option value="0">non</option>
                        </select>
                        @error('message2players')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="newsletter">Envoi de mails<br></label>
                        <select name="newsletter" id="newsletter" class="form-control custom-select @error('newsletter') is-invalid @enderror" value="{{ old('newsletter') }}">
                            <option value="" selected>---- Choisir la réponse ----</option>
                            <option value="1">oui</option>
                            <option value="0">non</option>
                        </select>
                        @error('newsletter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-3">Ajouter l'utilisateur</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
