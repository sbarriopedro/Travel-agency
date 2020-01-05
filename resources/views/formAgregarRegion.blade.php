@extends('layouts.plantilla')

    @section('h1', 'Formulario de Alta de una Region')

    @section('main')

        <div class="alert bg-light">
            <form action="/agregarRegion" method="post">
                @csrf
                Nombre:
                <br>
                <input name="regNombre" type="text" class="form-control" required>
                <br>
                <button class="btn btn-success">Agregar Region</button>
                <a href="/adminRegiones" class="btn btn-danger">Volver a Admin Regiones</a>
            </form>
        </div>

    @endsection
