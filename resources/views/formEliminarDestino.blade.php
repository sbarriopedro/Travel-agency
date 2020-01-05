@extends('layouts.plantilla')

    @section('h1', 'Baja de un Destino')

    @section('main')

        <div class="card border-danger text-danger col-md-8 mx-auto">
            <div class="card-header">
                Confirmacion de Baja de un Destino
            </div>
            <div class="card-body">
                Nombre: {{ $destino->destNombre }}
                <br>
                Precio: {{ $destino->destPrecio }}
                <br>
                Region: {{ $destino->relRegion->regNombre }}
                <br>
                Asientos Totales: {{ $destino->destAsientos }}
                <br>
                Asientos Disponibles: {{ $destino->destDisponibles }}
                <br>
                Status:
                @if( $destino->destActivo )
                    <img src="{{ asset('images/activo.png') }}" alt="activo" style="width: 20px;height: 20px">
                @else
                    <img src="{{ asset('images/inactivo.png') }}" alt="inactivo" style="width: 20px;height: 20px">
                @endif
                <br>
                <br>
                <a href="/eliminarDestino/{{ $destino->destID }}" class="btn btn-danger">Eliminar Destino</a>
                <a href="/adminDestinos" class="btn btn-primary">Volver a Panel de destinos</a>
            </div>
        </div>

        <script>
            Swal.fire({
                title: 'Esta seguro?',
                text: "No podrá revertir estos cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#666',
                confirmButtonText: 'Confirmar Baja',
                cancelButtonText: 'Volver a Admin'
            }).then((result) => {
                if (!result.value) {
                    Swal.fire(
                        window.location = '/adminDestinos'
                    )
                }
            })
        </script>

    @endsection
