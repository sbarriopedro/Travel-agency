@extends('layouts.plantilla')

    @section('h1', 'Panel de Administracion de Regiones')

    @section('main')
            @if (session('agregarConfirmado'))
                <div class="alert alert-success">
                    {{ session('agregarConfirmado') }}
                </div>
            @endif
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Destino</th>
                    <th>Region</th>
                    <th>Precio</th>
                    <th>Asientos</th>
                    <th>Disponible</th>
                    <th>Activo</th>

                    <th colspan="2"><a href="/formAgregarDestino" class="btn btn-info">Agregar Destino</a></th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($destinos as $destino)
                <tr>
                    <td>{{$destino->destNombre}}</td>
                    <td>{{$destino->relRegion->regNombre}}</td>
                    <td>{{$destino->destPrecio}}</td>
                    <td>{{$destino->destAsientos}}</td>
                    <td>{{$destino->destDisponibles}}</td>
                    <td>
                        @if( $destino->destActivo )
                            <img src="{{ asset('images/activo.png') }}" alt="activo" style="width: 20px;height: 20px">
                        @else
                            <img src="{{ asset('images/inactivo.png') }}" alt="activo" style="width: 20px;height: 20px">
                        @endif
                    </td>
                    <td><a href="/formModificarDestino/{{$destino->destID}}" class="btn btn-warning">modificar destino</a></td>
                    <td><a href="/formEliminarDestino/{{$destino->destID}}" class="btn btn-danger">eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
