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
    table tbody {
        line-height: 1.2 !important;
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
            <h1>Liste des utilisateurs</h1>
        </div>
        <div class="col-md-4 text-right">
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
                    <td>{{ ucfirst($user->name) }}</td>
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
                            <button type="submit" class="btn btn" onclick="return confirm('Confirmez la suppression de cet élément')"><i class="fas fa-times text-danger"></i></button>
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

@endsection
