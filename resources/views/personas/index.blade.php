@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de personal&nbsp;&nbsp;<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalusuario">+ Nuevo</button>
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
                                    <th>ID</th>
                                    <th>Nombre completo</th>
                                    <th>Nombre de usuario</th>
                                    <th>Area</th>
                                    <th>Unidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personal as $datos)
                                <tr>
                                    <td>{{$datos->id}}</td>
                                    <td>{{$datos->name}}</td>
                                    <td>{{$datos->data}}</td>
                                    <td>{{$datos->area_name}}</td>
                                    <td>{{$datos->unidad_name}}</td>
                                    <td>
                                        <a href="{{route('personal.lista',$datos->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
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

