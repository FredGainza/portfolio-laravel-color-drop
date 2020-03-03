@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="card-body">
                    <a class="b" href="https://project-color.fgainza.fr/pindex">Continuer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.b{
    border: 1px DodgerBlue solid;
    background-color: DodgerBlue;
    border-radius: 3px;
    text-decoration: none;
    color: black;
}
</style>
