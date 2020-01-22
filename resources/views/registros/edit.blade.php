@extends('layouts.app')


@section('content')

    <div class="content">   
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('password_status'))
        <div class="alert alert-success" role="alert">
            {{ session('password_status') }}
        </div>
        @endif
        <div class="container-fluid mt--7">
            
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif        
            <div class="col-md-6">
                <div class="card shadow">                   
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Confirmacion Entrga de Ticket') }}</h3>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Atras</a>
                                </div>
                            </div>
                        </div>
                    </div>             
                    <div class="card-body">                                    
                        <div class="col-25">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div> 
                            {!! Form::model($registro, ['method' => 'PATCH','route' => ['tickets.update', $registro->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        {!! Form::text('nombre', null, array('placeholder' => 'Nombre','class' => 'form-control', 'readonly'=>"readonly")) !!}
                                        <strong>Apellido:</strong>
                                        {!! Form::text('apellido', null, array('placeholder' => 'Nombre','class' => 'form-control','readonly'=>"readonly")) !!}
                                        <strong>Cedula:</strong>
                                        {!! Form::text('cedula', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                                        <strong>Provincia:</strong>
                                        {!! Form::text('provincia', null, array('placeholder' => 'Nombre','class' => 'form-control','readonly'=>"readonly")) !!}
                                        <strong>Direccion:</strong>
                                        {!! Form::text('direccion', null, array('placeholder' => 'Nombre','class' => 'form-control','readonly'=>"readonly")) !!}
                                    
                                    </div>
                                </div>
                               
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>                
            </div>
        </div>


@endsection