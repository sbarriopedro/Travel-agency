@extends('layouts.plantilla')

    @section('h1', 'Formulario de Modificacion de una Region')

    @section('main')

        <div class="alert bg-light">
            <form action="/modificarRegion" method="post">
                @csrf
                Nombre:
                <br>
                <input name="regNombre" type="text" class="form-control" required value="{{$region->regNombre}}">
                <input type="hidden" value="{{$region->regID}}" name="regID">
                <br>
                <button class="btn btn-success">Modificar Region</button>
                <a href="/adminRegiones" class="btn btn-danger">Volver a Admin Regiones</a>
            </form>
        </div>

    @endsection
