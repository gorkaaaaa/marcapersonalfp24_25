@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir proyecto
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/proyectos/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="first_name">Nombre</label>
	               <input type="text" name="first_name" id="first_name" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="last_name">Apellidos</label>
	               <input type="text" name="last_name" id="last_name">
	            </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email">
                 </div>

                 <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                 </div>

                 <div class="form-group">
                    <label for="passwordR">Repite contraseña</label>
                    <input type="password" name="passwordR" id="password">
                 </div>

	            <div class="form-group">
	               <label for="linkedin">Linkedin</label><br />
                   https://www.linkedin.com/in/
	               <input type="url" name="linkedin" id="linkedin" class="form-control">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Crear usuario
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
