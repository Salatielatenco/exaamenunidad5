@extends('layouts.app')

@section('template_title')
    Create Nventa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear nueva venta</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('nventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('nventa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
