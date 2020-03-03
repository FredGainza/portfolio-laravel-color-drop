@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">ADMINISTRATION</h2>
        </div>
    </div>

    <div class="row justify-content-center my-5"></div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-3 text-center">
            <button type="button" class="btn btn-secondary"><a style="color:white" href="{{ route('users.index') }}">USERS</a></button>
        </div>
        <div class="col-md-3 text-center">
            <button type="button" class="btn btn-secondary"><a style="color:white" href="{{ route('players.index') }}">PLAYERS</a></button>
        </div>
        <div class="col-md-3 text-center">
            <button type="button" class="btn btn-secondary"><a style="color:white" href="{{ route('levels.index') }}">LEVELS</a></button>
        </div>
        <div class="col-md-3 text-center">
            <button type="button" class="btn btn-secondary"><a style="color:white" href="{{ route('games.index1') }}">GAMES</a></button>
        </div>
    </div>
</div>
@endsection
