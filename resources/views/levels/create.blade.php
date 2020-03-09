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
            <h3 class="text-center titre-form mb-3">AJOUTER UN NIVEAU</h3>
            <div class="cadre-form">
                <form action="{{ route('levels.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label for="levelcreate">Nom du niveau</label>
                            <input type="text" name="levelcreate" id="levelcreate" class="form-control @error('levelcreate') is-invalid @enderror" placeholder="Saisir le nom du niveau">
                            @error('level_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Palier pour 3 étoiles (en secondes)</label>
                            <input type="number" min=0 max=600 step=1 name="two_stars" id="two_stars" class="form-control @error('two_stars') is-invalid @enderror"  placeholder="Saisir le temps en secondes">
                            @error('two_stars')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Palier pour 2 étoiles (en secondes)</label>
                            <input type="number" min=0 max=600 step=1 name="three_stars" id="three_stars" class="form-control @error('three_stars') is-invalid @enderror" placeholder="Saisir le temps en secondes">
                            @error('level_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    <button type="submit" class="btn btn-dark w-100 mt-3">Ajouter le niveau</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
