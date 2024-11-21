@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar usuario
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}"
                        method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-group">
                            <label for="first_name">Nombre</label>
                            <input type="text" name="first_name" id="first_name" class="form-control"
                                value=" {{ $user['first_name'] }}">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"
                                value=" {{ $user['last_name'] }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value=" {{ $user['email'] }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Email</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value=" {{ $user['password'] }}">
                        </div>

                        <div class="form-group">
                            <label for="linkedin">Dominio</label><br />
                            <input type="url" name="linkedin" id="linkedin" class="form-control"
                                value=" {{ $user['linkedin'] }}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

