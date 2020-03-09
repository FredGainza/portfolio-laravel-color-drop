@extends('layouts.app')
@section('scripts-header')
<link rel="stylesheet" href="css/btn.css">
<style>
    .pointer-cursor{
        cursor: pointer;
    }
    .lh-1{line-height: 1.2rem !important;}
    .text-darky{color: #6d777e !important;}
    .fz-80p{font-size: 80% !important;}
</style>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">* {{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">* {{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <label for="password" class="col-md-4 col-form-label text-md-right">* {{ __('Password') }}</label>

                            <div class="col-md-8 lh-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p class="col-md-8 offset-md-4 mr-1 text-darky fz-80p text-center">Le mot de passe doit comporter 8 caractères minimum</p>
                        </div>

                        <div class="form-group row align-items-center">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">* {{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="radio text-center lh-1" >
                            <label class="checkbox-inline"><input type="checkbox" value="1" required name='cgu'>  <a href="rules" target="new">&nbsp;En cochant cette case, j'accepte et je reconnais avoir pris connaissance des conditions générales</a></label>
                        </div>

                        <div class="form-group row mx-auto mb-0 pt-3">
                            <div class="col-12 mx-auto">
                                <button type="submit" class="buttun btn-3 action-button green btn-block mx-auto mb-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <a href="login">Déjà inscrit ?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
