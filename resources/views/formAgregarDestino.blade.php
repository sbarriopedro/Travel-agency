@extends('layouts.plantilla')

    @section('h1', 'Formulario de Alta de un Destino')

    @section('main')

        <div class="alert bg-light">
            <form action="/agregarDestino" method="post" class="text-dark">
                @csrf
                Nombre:
                <br>
                <input name="destNombre" type="text" class="form-control" required>
                <br>
                Region:
                <br>
                <select name="regID" type="" class="form-control" required>
                    <option value="">Seleccione una Region</option>
                    @foreach($regiones as $region)
                    <option value="{{ $region->regID }}">{{ $region->regNombre }}</option>
                    @endforeach
                </select>
                <br>
                Precio:
                <br>
                <input name="destPrecio" type="text" class="form-control" required>
                <br>
                Asientos Totales
                <br>
                <input name="destAsientos" type="text" class="form-control" required>
                <br>
                Asientos Disponibles
                <br>
                <input name="destDisponibles" type="text" class="form-control" required>
                <br>
                Activo:
                <br>
                <input type="radio" name="destActivo" value="1">Si
                <input type="radio" name="destActivo" value="0">No
                <br>
                <button class="btn btn-success">Agregar Destino</button>
                <a href="/adminDestinos" class="btn btn-danger">Volver a Admin Destinos</a>
            </form>
        </div>

    @endsection
