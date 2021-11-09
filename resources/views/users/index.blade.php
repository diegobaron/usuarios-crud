@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <x-alert/>
            <div class="card">

                <div class="card-header">
                    <div class="row align-item-center">
                        <div class="col">
                            Usuários
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <a href="{{route('users.create')}}" class="btn btn-primary">Novo</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a 
                                                href="{{route('users.edit', ['user' => $user->id])}}" 
                                                class="btn btn-primary btn-sm" 
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form class="d-inline" action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Tem certeza que deseja excluir este usuário?')" 
                                                >
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-md-6" >
                            {{'Mostrando de  '.$users->firstItem().' até '.$users->lastItem().' de '.$users->total().' registros'}}
                        </div>
                        <div class="col-12 col-md-6" >
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
