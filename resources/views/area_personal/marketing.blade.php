@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <dv class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm ml-auto"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
            </div>
            <h5 class="m-0 font-weight-bold text-secondary" style="text-align: center">Reporte Individual</h5>
            <h6 class="m-0 font-weight-bold text-primary">Nombre: {{$persona->name_personal}}</br>
            Cargo:{{$persona->name_cargo}}
            </h6></br>

        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="table-responsive">

                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Dia</th>
                                        <th>Hora Entrada Mañana</th>
                                        <th>Hora Salida Mañana</th>
                                        <th>Hora Entrada Tarde</th>
                                        <th>Hora Salida Tarde</th>
                                        <th>Hora Entrada Tarde-noche</th>
                                        <th>Hora Salida Tarde-noche</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        </dv>
    </div>
</div>
@endsection
