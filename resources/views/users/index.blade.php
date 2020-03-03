@extends('layouts.admin')

@section('scripts-header')
<style>
    tr td img {
        width: 75px;
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
        <div class="col-md-6">
            <h1>Liste des utilisateurs</h1>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('users.create') }}"><button class="btn btn-dark mr-0">Ajouter un utilisateur</button></a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="table-responsive">
        <table class="table center text-center table-striped" id="tab_user">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th>Id</th>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Notification</th>
                    <th>Envoi de mail</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($users))
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><?= $user->message2players == 1 ? "oui" : "non"; ?></td>
                    <td><?= $user->newsletter == 1 ? "oui" : "non"; ?></td>
                    <td class="text-nowrap">
                        <a href="{{ route('users.show', $user->id) }}"><i class="far fa-eye text-info mx-3"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}"><i class="fas fa-pen text-success mx-3"></i></a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="_id" id="_id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-sm" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger mx-3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
        {{-- {{ $users->links() }} --}}
    </div>
</div>
@if(session()->has('info'))
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast"
        style="position: absolute; bottom: 0; right: 50px;" data-autohide="false">
        <div class="toast-header">
            <i class="far fa-comment mr-2 info"></i>
            <strong class="mr-auto">Information :</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body bg-pers">
            {{ session('info') }}
        </div>
    </div>
</div>
@endif
@endsection
