@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-alert/>
            <div class="card">

                <div class="card-header">
                    <div class="row align-item-center">
                        <div class="col">
                            {{ __('Cadastro de Usuário') }}
                        </div>
                        <div class="col">
                            <div class="float-right">
                                <a href="{{url()->previous()}}" class="btn btn-primary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('users.form', [
                        'method' => 'POST',
                        'action' => route('users.store'),
                        'user' => null
                    ])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
