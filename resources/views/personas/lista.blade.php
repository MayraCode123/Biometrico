@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-secondary">Reporte Individual</h5>
            <h6 class="m-0 font-weight-bold text-primary">Nombre: {{$persona->name_personal}}</br>
            Cargo:{{$persona->name_cargo}}
            </h6>
        </div>
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
                                    <td>{{$registros->fecha}}</td>
                                    <td>
                                        @php
                                        $en_rango = false;
                                        $horas = []; // Array para almacenar las horas dentro del rango
                                        @endphp
                                        @foreach(explode(',', $registros->estados) as $estado)
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
                                    <td>    @php
                                        $en_rango = false;
                                        $horas = []; // Array para almacenar las horas dentro del rango
                                        $hora_fuera_de_rango = null; // Variable para almacenar la primera hora fuera del rango
                                        $hora_salida = null; // Variable para almacenar la hora de salida si está fuera del rango
                                    @endphp
                                    @foreach(explode(',', $registros->estados) as $estado)
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
                                        @foreach(explode(',', $registros->estados) as $estado)
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
                                        @foreach(explode(',', $registros->estados) as $estado)
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
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/data-table.js') }}"></script>
@endsection

