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
                                            $check_amarillo = false;
                                            $check_rojo = false;
                                            @endphp

                                            @foreach(explode(',', $registros->estados) as $estado)
                                            @php
                                                list($hora, $estado_text) = explode(' - ', $estado);
                                            @endphp
                                            @if (strtotime($hora) >= strtotime('07:00:00') && strtotime($hora) <= strtotime('09:00:00'))
                                            @php
                                                $horas[] = $hora;
                                                $en_rango = true;
                                                if (strtotime($hora) >= strtotime('08:12:00') && strtotime($hora) <= strtotime('08:15:00')) {
                                                    $check_amarillo = true;
                                                }
                                                if (strtotime($hora) >= strtotime('08:15:00') && strtotime($hora) <= strtotime('08:30:00')) {
                                                    $check_rojo = true;
                                                }
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
                                                $en_rango_salida = false;
                                                $horas = [];
                                                $hora_fuera_de_rango = null;
                                            @endphp

                                            @foreach(explode(',', $registros->estados) as $estado)
                                                @php
                                                    list($hora, $estado_text) = explode(' - ', $estado);

                                                    if (strtotime($hora) >= strtotime('12:00:00') && strtotime($hora) <= strtotime('13:59:59')) {
                                                        $horas[] = $hora;
                                                        $en_rango_salida = true;
                                                    } elseif (!$hora_fuera_de_rango) {
                                                        $hora_fuera_de_rango = $hora;
                                                    }
                                                @endphp
                                            @endforeach

                                            @if ($en_rango_salida)
                                                {{ implode(', ', $horas) }}
                                            @else
                                                No hay registro
                                            @endif
                                        </td>
                                        <td style="@if ($numero_dia_semana == 6) background-color: #F5EDC2; @endif">
                                            @php
                                            $en_rango_entrada_tarde = false;
                                            $horas = [];
                                            $check_amarillo_entrada_tarde = false;
                                            @endphp
                                            @foreach(explode(',', $registros->estados) as $estado)
                                                @php
                                                list($hora, $estado_text) = explode(' - ', $estado);
                                                @endphp
                                                @if (strtotime($hora) >= strtotime('14:00:00') && strtotime($hora) <= strtotime('15:00:00'))
                                                    @php
                                                    $horas[] = $hora;
                                                    $en_rango_entrada_tarde = true;
                                                    if (strtotime($hora) >= strtotime('14:40:00') && strtotime($hora) <= strtotime('18:45:00')) {
                                                    $check_amarillo_entrada_tarde = true;
                                                }
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($en_rango_entrada_tarde)
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
                                            @php
                                                // Inicializamos las variables de los checks
                                                $en_rango = false;
                                                $check_verde = false;
                                                $check_amarillo = false;
                                                $check_rojo = false;
                                                $times_rojo = false;
                                                $en_rango_salida = false;
                                                $check_amarillo_entrada_tarde = false;
                                                $check_verde_entrada_tarde = false;
                                                $check_rojo_entrada_tarde = false;
                                                $times_rojo_entrada_tarde = false;
                                                $en_rango_18_22 = false;
                                                $alert_icon = false;

                                                $entrada_manana = false;
                                                $salida_manana = false;
                                                $entrada_tarde = false;
                                                $salida_tarde = false;

                                                $es_sabado = (date('N', strtotime($registros->fecha)) == 6);
                                                @endphp

                                                @foreach(explode(',', $registros->estados) as $estado)
                                                    @php
                                                        list($hora, $estado_text) = explode(' - ', $estado);
                                                    @endphp

                                                    @if (strtotime($hora) >= strtotime('07:00:00') && strtotime($hora) <= strtotime('09:00:00'))
                                                        @php
                                                            $horas[] = $hora;
                                                            $en_rango = true;
                                                            $entrada_manana = true;

                                                            if (strtotime($hora) <= strtotime('08:10:00')) {
                                                                $check_verde = true;
                                                            } elseif (strtotime($hora) <= strtotime('08:15:00')) {
                                                                $check_amarillo = true;
                                                            } elseif (strtotime($hora) <= strtotime('08:30:00')) {
                                                                $check_rojo = true;
                                                            } else {
                                                                $times_rojo = true;
                                                            }
                                                        @endphp
                                                    @endif

                                                    @if (strtotime($hora) >= strtotime('12:00:00') && strtotime($hora) <= strtotime('13:00:00'))
                                                        @php
                                                            $en_rango_salida = true;
                                                            $salida_manana = true;
                                                        @endphp
                                                    @endif

                                                    @if (!$es_sabado)
                                                        @if (strtotime($hora) >= strtotime('14:00:00') && strtotime($hora) <= strtotime('15:00:00'))
                                                            @php
                                                                $horas[] = $hora;
                                                                $en_rango_entrada_tarde = true;
                                                                $entrada_tarde = true;

                                                                if (strtotime($hora) <= strtotime('14:40:00')) {
                                                                    $check_verde_entrada_tarde = true;
                                                                } elseif (strtotime($hora) <= strtotime('14:45:00')) {
                                                                    $check_amarillo_entrada_tarde = true;
                                                                } elseif (strtotime($hora) <= strtotime('15:00:00')) {
                                                                    $check_rojo_entrada_tarde = true;
                                                                } else {
                                                                    $times_rojo_entrada_tarde = true;
                                                                }
                                                            @endphp
                                                        @endif

                                                        @if (strtotime($hora) >= strtotime('16:00:00') && strtotime($hora) <= strtotime('22:00:00'))
                                                            @php
                                                                $en_rango_18_22 = true;
                                                                $salida_tarde = true;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                @endforeach

                                                {{-- Mostrar todos los checks para otros días --}}
                                                {{-- Entrada de la mañana --}}
                                                @if ($check_verde)
                                                    <i class="fas fa-fw fa-check" style="color: green"></i> <!-- Check Verde -->
                                                @elseif ($check_amarillo)
                                                    <i class="fas fa-fw fa-check" style="color: orange"></i> <!-- Check Amarillo -->
                                                @elseif ($check_rojo)
                                                    <i class="fas fa-fw fa-check" style="color: red"></i> <!-- Check Rojo -->
                                                @elseif ($times_rojo)
                                                    <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                @else
                                                    <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                @endif

                                                {{-- Salida de la mañana --}}
                                                @if ($en_rango_salida)
                                                    <i class="fas fa-fw fa-check" style="color: green"></i> <!-- Check Verde -->
                                                @else
                                                    <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                @endif

                                                @if (!$es_sabado)
                                                    {{-- Entrada en la tarde --}}
                                                    @if ($check_verde_entrada_tarde)
                                                        <i class="fas fa-fw fa-check" style="color: green"></i> <!-- Check Verde -->
                                                    @elseif ($check_amarillo_entrada_tarde)
                                                        <i class="fas fa-fw fa-check" style="color: orange"></i> <!-- Check Amarillo -->
                                                    @elseif ($check_rojo_entrada_tarde)
                                                        <i class="fas fa-fw fa-check" style="color: red"></i> <!-- Check Rojo -->
                                                    @elseif ($times_rojo_entrada_tarde)
                                                        <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                    @else
                                                        <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                    @endif

                                                    {{-- Salida de la tarde --}}
                                                    @if ($en_rango_18_22)
                                                        <i class="fas fa-fw fa-check" style="color: green"></i> <!-- Check Verde -->
                                                    @else
                                                        <i class="fas fa-fw fa-times" style="color: red"></i> <!-- Times Rojo -->
                                                    @endif
                                                @endif

                                                {{-- Check de alerta horario continuo --}}
                                                @if ($entrada_manana && !$salida_manana && !$entrada_tarde && $salida_tarde)
                                                    <i class="fas fa-fw fa-exclamation-triangle" style="color: orange"></i> <!-- Alert Icon -->
                                                @endif
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
