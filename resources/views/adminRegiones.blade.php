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
                    <th>ID</th>
                    <th>Region</th>
                    <th colspan="2"><a href="/formAgregarRegion" class="btn btn-info">Agregar Region</a></th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($regiones as $region)
                <tr>
                    <td>{{$region->regID}}</td>
                    <td>{{$region->regNombre}}</td>
                    <td><a href="/formModificarRegion/{{$region->regID}}" class="btn btn-warning">modificar region</a></td>
                    <td><a href="/formEliminarRegion/{{$region->regID}}" class="btn btn-danger">eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @endsection
