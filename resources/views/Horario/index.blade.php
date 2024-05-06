@extends('layouts.admin')

@section('main-content')
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
</div>

@endsection
