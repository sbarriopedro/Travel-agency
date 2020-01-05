@extends('layouts.plantilla')

    @section('h1', 'Baja de una Region')

    @section('main')

        <div class="card border-danger text-danger col-md-8 mx-auto">
            <div class="card-header">
                Confirmacion de Baja de una Region
            </div>
            <div class="card-body">
                Nombre: {{ $region->regNombre }}
                <br>
                    <a href="/eliminarRegion/{{ $region->regID }}" class="btn btn-danger">Eliminar Región</a>
                    <a href="/adminRegiones" class="btn btn-secondary">Volver a Panel de regiones</a>
                </form>
            </div>
        </div>

        <script>
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#666',
                confirmButtonText: 'Confirmar Baja',
                cancelButtonText: 'Volver a Admin'
            }).then((result) => {
                if (!result.value) {
                    Swal.fire(
                        window.location = '/adminRegiones'
                    )
                }
            })
        </script>

    @endsection
