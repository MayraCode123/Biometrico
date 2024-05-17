@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de General</h6></br>

            <form>
                <div class="form-group">
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Subir archivo</label>
                        <input type="file" class="custom-file-input" id="customFile">
                    </div>
                </div>
            </form>


        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Id Biometrico</th>
                        <th>Nombre usuario</th>
                        <th>Tiempo</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Tipo de registro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->id_biometrico}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->time}}</td>
                            <td>{{$data->state}}</td>
                            <td>{{$data->type}}</td>
                            <td>{{$data->type_register}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')


@endsection

