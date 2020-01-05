@extends('layouts.plantilla')

    @section('h1', 'Formulario de Modificacion de una Region')

    @section('main')

        <div class="alert bg-light">
            <form action="/modificarDestino" method="post" style="color: black">
                @csrf
                Nombre:
                <br>
                <input name="destNombre" type="text" class="form-control" required value="{{$destino->destNombre}}">
                <input type="hidden" value="{{ $destino->destID }}" name="destID">
                <br>
                <select name="regID" class="form-control" required>
                    <option value="{{ $destino->regID }}" selected> {{ $destino->relRegion->regNombre }} </option>
                    @foreach($regiones as $region)
                    <option value="{{ $region->regID }}">{{ $region->regNombre }}</option>
                    @endforeach
                </select>
                <br>
                <input name="destPrecio" type="text" class="form-control" required value="{{$destino->destPrecio}}">
                <br>
                <input name="destAsientos" type="text" class="form-control" required value="{{$destino->destAsientos}}">
                <br>
                <input name="destDisponibles" type="text" class="form-control" required value="{{$destino->destDisponibles}}">
                <br>
                @if ($destino->destActivo == 1)
                <input type="radio" name="destActivo" value="1" checked>Si
                <input type="radio" name="destActivo" value="0">No
                @else
                <input type="radio" name="destActivo" value="1">Si
                <input type="radio" name="destActivo" value="0"checked>No
                @endif
                <br>
                <button class="btn btn-success">Modificar Destino</button>
                <a href="/adminDestinos" class="btn btn-danger">Volver a Admin Destinos</a>
            </form>
        </div>

    @endsection
