@extends('layouts.parents')
@section('title', 'Ajout d\'un joueur')
@section('scripts-header')
<style>
/* body {
    overflow-x: hidden;
    overflow-y: hidden;
} */
.textEnfant {
    color: #5f0707;
    font-weight: 800;
    /* margin-left:40%;
    margin-right:40%; */
    border-top: 1px solid #0d0d0dfa;
    border-bottom: 1px solid #0d0d0dfa;
}
</style>
@endsection

@section('content')

<main class="pt-3p">
    <div class="container">
        <div class="containerPerso bg-encart py-3">

            <div class="row pt-0 px-5">
                <h3 class="mx-auto textEnfant">Ajouter un enfant</h3>
            </div>

            <hr>

            <form action="" method="post">
                @csrf
                <!-- Prénom -->
                <div class="row mt-3">
                    <div class="col-12 flex-init mx-resp">
                        <i class="fas fa-user mx-2"></i>
                        <label for="name">Prénom de l'enfant</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Prénom" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Difficulté -->
                <div class="row mt-4">
                    <div class="col-12 flex-init mx-resp">
                        <span><i class="fas fa-tachometer-alt mx-2"></i> Niveau de difficulté</span>
                        <select name="difficulty" id="dif-select" class="browser-default custom-select mt-2">
                            <option value="facile">Facile</option>
                            <option value="moyen">Moyen</option>
                            <option value="difficile">Difficile</option>
                        </select>
                    </div>
                </div>

                <!-- BTN Submit -->
                <div class="row mt-3">
                    <div class="col-12 flex-init mx-resp">
                        <button class="btn btn-info btn-block mt-3">Ajouter</button>
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

