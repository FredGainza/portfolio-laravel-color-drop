@extends('layouts.parents')
@section('title', 'Edition du joueur')
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
                <h3 class="mx-auto textEnfant">Informations de {{ $players[0]->name }}</h3>
            </div>
            <hr>


            <form action="" method="post">
                @csrf
                <!-- Prénom -->
                <div class="row mt-3">
                    <div class="col-12 flex-init mx-resp">
                        <i class="fas fa-user prefix mx-2"></i>
                        <label for="name">Prénom de l'enfant</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Prénom" value="{{ $players[0]->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Difficulté -->
                <div class="row mt-4">
                    <div class="col-12 flex-init mx-resp">
                        <span><i class="fas fa-sort mx-2"></i> Niveau de difficulté</span>
                        <select name="difficulty" id="dif-select" class="browser-default custom-select mt-2">
                            <?php if($players[0]->difficulty == 'facile') : ?>
                            <option value="facile" selected>Facile</option>
                            <?php else : ?>
                            <option value="facile">Facile</option>
                            <?php endif; ?>

                            <?php if($players[0]->difficulty == 'moyen') : ?>
                            <option value="moyen" selected>Moyen</option>
                            <?php else : ?>
                            <option value="moyen">Moyen</option>
                            <?php endif; ?>

                            <?php if($players[0]->difficulty == 'difficile') : ?>
                            <option value="difficile" selected>Difficile</option>
                            <?php else : ?>
                            <option value="difficile">Difficile</option>
                            <?php endif; ?>
                        </select>
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
