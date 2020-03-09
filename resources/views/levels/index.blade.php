@extends('layouts.admin')

@section('scripts-header')
<style>
    tr td img {
        width: 75px;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: .5rem .75rem;
    }

    img.col-perso {
        width: 60px;
    }

    img.col-view {
        width: 400px;
        height: auto;
    }
    .bg-body {
        background-color: #f8fafc;
    }
    table thead th {
        vertical-align: middle !important;
    }

    @media screen and (max-width: 767px){
        .table th, .table td {
            padding: 0.6rem !important;
        }
        thead tr {
            font-size: .8rem !important;
        }
    }

</style>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <h1>Liste des niveaux</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('levels.create') }}"><button class="btn btn-dark mr-0">Ajouter un niveau</button></a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="table-responsive">
            <table class="table center text-center table-striped" id="tab_level">
                <thead>
                    <tr class="text-center bg-dark text-white">
                        <th>Nom</th>
                        <th>Temps max 3 étoiles</th>
                        <th>Temps max 2 étoiles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($levels))
                        @foreach($levels as $level)
                            <tr id="{{ $level->id }}">
                                <td>{{ $level->level_name }}</td>
                                <td>{{ $level->two_stars }} s</td>
                                <td>{{ $level->three_stars }} s</td>
                                <td>
                                    <a href="{{ route('levels.edit', $level->id) }}"><i class="fas fa-pen text-success mx-2"></i></a>
                                    <form action="{{ route('levels.destroy', $level->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="_id" id="_id" value="{{$level->id}}">
                                        <button type="submit" class="btn" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts-footer')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        })

        $('form').submit(function(e){
            // console.log($('form'));
            e.preventDefault();
            // console.log('tete');
            // console.log( $(this) );debugger;
            let token = $('meta[name="crsf_token"]');

            let $id = $('#_id', $(this)).val();
            console.log($id);

            $.ajax({
                url: "levels/"+$id,
                type: "POST",
                dataType: "json",
                // contentType: "application/json",
                data: {
                    id:$id,
                    _method:'DELETE',
                },
                success: function(code, statut){
                    console.log($id);
                    var row = document.getElementById($id);
                    row.parentNode.removeChild(row);
                    // $('#toastDelete').removeClass('invisible').addClass('visible');
                },

                error: function(resultat, statut, erreur){
                    console.log(erreur);
                }
            });

        });
    });

    </script>

@endsection
