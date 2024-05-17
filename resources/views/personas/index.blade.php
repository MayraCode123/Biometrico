@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de personal&nbsp;&nbsp;<button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalusuario">+ Nuevo</button>
            </h6>
        </div>

        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
            </div>
            <form method="POST" id="search-form" class="form-inline" role="form">
                <div class="form-group">
                    <label for="category">Area</label>
                    <select name="category" id="category" class="custom-select">

                        <option value="reset">-Categoría-</option>
                        @foreach($area as $datos)
                            <option value="{{ $datos->id }}">{{ $datos->name }}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Busqueda</button>
            </form>
                </br>

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="table-responsive">
                            <table id="data_personal" class="table table-striped table-bordered lista_personal">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Data</th>
                                        <th>Área</th>
                                        <th>Unidad</th>
                                        <th>opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí se mostrarán los datos de forma dinámica -->
                                </tbody>
                            </table>
                        </div>
                    </div>

        </div>
    </div>
</div>
{{-- modal --}}
<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Usuarios</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('personal.store')}}" method="POST" id="crearUsuario" >
                @csrf
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Nombre Completo<span class="small text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Nombre .. " >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Nombre de usuario<span class="small text-danger">*</span></label>
                                <select name="data_personal_id" id="data" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                @foreach ($data as $dato)
                                    <option value="{{ $dato->id_biometrico }}">{{ $dato->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Area<span class="small text-danger">*</span></label>
                                <select name="area_id" id="area" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($area as $area)
                                        <option value="{{$area->id}}">{{$area->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Unidad<span class="small text-danger">*</span></label>
                                <select name="unidad_id" id="unidad" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($unidad as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="last_name">Cargo<span class="small text-danger">*</span></label>
                                <select name="cargo_id" id="cargo" class="form-control">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($cargo as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
@endsection

