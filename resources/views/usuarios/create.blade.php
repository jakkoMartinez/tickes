@extends('layouts.app')


@section('content')
<div class="row h-100 justify-content-center align-items-center">
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
                                <h3 class="mb-0">{{ __('Crear Usuario') }}</h3>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
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
                        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nombre:</strong>
                                    {!! Form::text('name', null, array('placeholder' => 'Nombres','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Apellidos:</strong>
                                    {!! Form::text('lastname', null, array('placeholder' => 'Apellidos','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Cedula:</strong>
                                    {!! Form::text('idcard', null, array('placeholder' => 'Cedula','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contraseña:</strong>
                                    {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Confirme Contraseña:</strong>
                                    {!! Form::password('confirm-password', array('placeholder' => 'Confirme Contraseña','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Rol:</strong>
                                    {!! Form::select('rol[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
    			    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection