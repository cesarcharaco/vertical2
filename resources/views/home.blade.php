@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-home"></i> Inicio</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            ¡Estás dentro del sistema!<br>
                            <img src="{{ asset('images/images2.jpg') }}" width="100%">
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
