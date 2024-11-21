@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $user['first_name'] }}</h3>
            <h3><strong>Apellidos: </strong>{{ $user['last_name'] }}</h3>
            <h3><strong>E-mail: </strong>{{ $user['email'] }}</h3>
            <h4><strong>Linkedin: </strong>
                <a href="{{ $user['linkedin'] }}">
                    {{ $user['linkedin'] }}
                </a>
            </h4>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar usuario
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection

