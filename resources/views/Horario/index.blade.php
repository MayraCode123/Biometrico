@extends('layouts.admin')

@section('main-content')
<?php
$n = 1;
?>
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Horarios</button></h6>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Horario Continuo</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    08:00 am - 16:00 pm
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-sun fa-2x text-yellow-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Turno Mañana</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    08:00 am - 12:00 pm
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cloud-sun fa-2x text-yellow-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Turno Tarde</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                14:30 pm - 18:30 pm
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cloud-moon fa-2x text-yellow-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Horario Nocturno</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                16:00 pm - 20:00 pm
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-moon fa-2x text-yellow-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('horario') }}" method="GET">
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha de inicio:</label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{ $fechaInicio ?? '' }}">
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="fecha_fin">Fecha de fin:</label>
                                <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ $fechaFin ?? '' }}">
                            </div>
                    </div>
                    <div class="col-md-4">
                            <button type="submit" class="btn btn-success form-control">Filtrar</button>
                        </form>
                    </div>
                </div>
            </br>


                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre completo</th>
                            <th>Hora Mañana Entrada</th>
                            <th>Hora Manana Salida</th>
                            <th>Hora Tarde Salida</th>
                            <th>Hora tarde Salida</th>
                            <th>Observacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registros as $datos)
                        <tr>
                            <td>{{$datos->fecha}}</td>
                            <td>{{$datos->nombre_usuario}}</td>
                            <td>
                                @php
                                $en_rango = false;
                                $horas = []; // Array para almacenar las horas dentro del rango
                                @endphp
                                @foreach(explode(',', $datos->estados) as $estado)
                                    @php
                                    list($hora, $estado_text) = explode(' - ', $estado);
                                    @endphp
                                    @if (strtotime($hora) >= strtotime('07:00:00') && strtotime($hora) <= strtotime('09:00:00'))
                                        @php
                                        $horas[] = $hora; // Almacenar la hora dentro del rango
                                        $en_rango = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($en_rango)
                                    {{ implode(', ', $horas) }} {{-- Mostrar las horas dentro del rango --}}
                                @else
                                    No hay registro
                                @endif
                            </td>
                            <td>
                                @php
                                $en_rango = false;
                                $horas = []; // Array para almacenar las horas dentro del rango
                                $hora_fuera_de_rango = null; // Variable para almacenar la primera hora fuera del rango
                                $hora_salida = null; // Variable para almacenar la hora de salida si está fuera del rango
                            @endphp
                            @foreach(explode(',', $datos->estados) as $estado)
                                @php
                                    list($hora, $estado_text) = explode(' - ', $estado);
                                    if (strtotime($hora) >= strtotime('12:00:00') && strtotime($hora) <= strtotime('14:00:00')) {
                                        $horas[] = $hora; // Almacenar la hora dentro del rango
                                        $en_rango = true;
                                    } elseif (strtotime($hora) >= strtotime('09:00:00') && strtotime($hora) <= strtotime('11:59:59')) {
                                        $hora_salida = $hora; // Almacenar la hora de salida si está fuera del rango
                                    } elseif (!$hora_fuera_de_rango) {
                                        $hora_fuera_de_rango = $hora; // Almacenar la primera hora fuera del rango
                                    }
                                @endphp
                            @endforeach

                            @if ($en_rango)
                                {{ implode(', ', $horas) }} {{-- Mostrar las horas dentro del rango --}}
                            @elseif ($hora_salida)
                            <span class="badge badge-danger">{{ $hora_salida }}</span>  {{-- Mostrar la hora de salida en rojo --}}

                            @else
                                No hay registro
                            @endif

                            </td>
                            <td>
                                @php
                                $en_rango = false;
                                $horas = []; // Array para almacenar las horas dentro del rango
                                @endphp
                                @foreach(explode(',', $datos->estados) as $estado)
                                    @php
                                    list($hora, $estado_text) = explode(' - ', $estado);
                                    @endphp
                                    @if (strtotime($hora) >= strtotime('14:00:00') && strtotime($hora) <= strtotime('15:00:00'))
                                        @php
                                        $horas[] = $hora; // Almacenar la hora dentro del rango
                                        $en_rango = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($en_rango)
                                    {{ implode(', ', $horas) }} {{-- Mostrar las horas dentro del rango --}}
                                @else
                                    No hay registro
                                @endif
                            </td>
                            <td>
                                @php
                                $en_rango = false;
                                $horas = []; // Array para almacenar las horas dentro del rango
                                @endphp
                                @foreach(explode(',', $datos->estados) as $estado)
                                    @php
                                    list($hora, $estado_text) = explode(' - ', $estado);
                                    @endphp
                                    @if (strtotime($hora) >= strtotime('18:30:00') && strtotime($hora) <= strtotime('20:00:00'))
                                        @php
                                        $horas[] = $hora; // Almacenar la hora dentro del rango
                                        $en_rango = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($en_rango)
                                    {{ implode(', ', $horas) }} {{-- Mostrar las horas dentro del rango --}}
                                @else
                                    No hay registro
                                @endif
                            </td>
                            <td>En proceso ..</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
