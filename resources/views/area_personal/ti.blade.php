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
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registros)
                                        <tr>
                                            <td>{{$registros->fecha}}</td>
                                            <td>
                                                @php
                                                    $numero_dia_semana = date('w', strtotime($registros->fecha));
                                                    $dias_semana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                                                    $nombre_dia_semana = $dias_semana[$numero_dia_semana];
                                                    echo $nombre_dia_semana;
                                                @endphp
                                            </td>

                                            <td>
                                                @php
                                                $en_rango = false;
                                                $horas = [];
                                            @endphp

                                            @foreach(explode(',', $registros->estados) as $estado)
                                                @php
                                                    list($hora, $estado_text) = explode(' - ', $estado);
                                                @endphp
                                                @if (strtotime($hora) >= strtotime('07:00:00') && strtotime($hora) <= strtotime('09:00:00'))
                                                    @php
                                                        $horas[] = $hora;
                                                        $en_rango = true;
                                                    @endphp
                                                @endif
                                            @endforeach

                                            @if ($en_rango)
                                                {{ implode(', ', $horas) }}
                                            @else
                                                No hay registro
                                            @endif
                                            </td>
                                            <td>
                                                @php
                                                $en_rango = false;
                                                $horas = [];
                                                $hora_fuera_de_rango = null;
                                                $hora_salida = null;
                                                @endphp
                                                @foreach(explode(',', $registros->estados) as $estado)
                                                @php
                                                    list($hora, $estado_text) = explode(' - ', $estado);
                                                    if (strtotime($hora) >= strtotime('12:00:00') && strtotime($hora) <= strtotime('14:00:00')) {
                                                        $horas[] = $hora;
                                                        $en_rango = true;
                                                    } elseif (strtotime($hora) >= strtotime('09:00:00') && strtotime($hora) <= strtotime('11:59:59')) {
                                                        $hora_salida = $hora;
                                                    } elseif (!$hora_fuera_de_rango) {
                                                        $hora_fuera_de_rango = $hora;
                                                    }
                                                @endphp
                                                @endforeach

                                                @if ($en_rango)
                                                    {{ implode(', ', $horas) }}
                                                @elseif ($hora_salida)
                                                <span class="badge badge-danger">{{ $hora_salida }}</span>

                                                @else
                                                    No hay registro
                                                @endif
                                            </td>
                                            <td style="@if ($numero_dia_semana == 6) background-color: #F5EDC2; @endif">
                                                @php
                                                $en_rango = false;
                                                $horas = [];
                                                @endphp
                                                @foreach(explode(',', $registros->estados) as $estado)
                                                    @php
                                                    list($hora, $estado_text) = explode(' - ', $estado);
                                                    @endphp
                                                    @if (strtotime($hora) >= strtotime('14:00:00') && strtotime($hora) <= strtotime('15:00:00'))
                                                        @php
                                                        $horas[] = $hora;
                                                        $en_rango = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($en_rango)
                                                    {{ implode(', ', $horas) }}
                                                @else
                                                    No hay registro
                                                @endif
                                            </td>

                                            <td style="@if ($numero_dia_semana == 6) background-color: #F5EDC2; @endif">
                                                @php
                                                    $en_rango_18_22 = false;
                                                    $horas_18_22 = [];
                                                @endphp

                                                @foreach(explode(',', $registros->estados) as $estado)
                                                    @php
                                                        list($hora, $estado_text) = explode(' - ', $estado);
                                                    @endphp

                                                    @if (strtotime($hora) >= strtotime('16:00:00') && strtotime($hora) <= strtotime('22:00:00'))
                                                        @php
                                                            $horas_18_22[] = $hora;
                                                            $en_rango_18_22 = true;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @if ($en_rango_18_22)
                                                    {{ implode(', ', $horas_18_22) }}
                                                @else
                                                    No hay registro
                                                @endif
                                            </td>
                                            <td>
                                                12
                                            </td>
                                        </tr>
                                        @endforeach

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
